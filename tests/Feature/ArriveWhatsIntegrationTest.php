<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Requests\Admin\EditSettingRequest;
use App\Models\AboutUs;
use App\Models\ConfirmationCodes;
use App\Services\ArriveWhatsService;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ViewErrorBag;
use Mockery;
use Tests\TestCase;

class ArriveWhatsIntegrationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite' => [
                'driver' => 'sqlite',
                'database' => ':memory:',
                'prefix' => '',
                'foreign_key_constraints' => true,
            ],
            'services.arrive_whats.base_url' => 'https://env.example/api',
            'services.arrive_whats.token' => 'env-test-token',
            'services.arrive_whats.default_country_code' => '965',
            'services.arrive_whats.receipt_phone' => null,
            'services.arrive_whats.connect_timeout' => 1,
            'services.arrive_whats.timeout' => 2,
            'services.arrive_whats.otp_expiry_minutes' => 5,
        ]);

        DB::purge('sqlite');
        DB::reconnect('sqlite');

        Schema::create('about_us', function (Blueprint $table): void {
            $table->id();
            $table->string('whatsapp_number')->default('');
            $table->string('arrive_whats_base_url')->nullable();
            $table->text('arrive_whats_token')->nullable();
            $table->string('arrive_whats_default_country_code', 10)->nullable();
            $table->string('arrive_whats_receipt_phone', 30)->nullable();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table): void {
            $table->id();
            $table->string('phone')->unique();
            $table->string('country_code', 10)->nullable();
            $table->string('password')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('confirmation_codes', function (Blueprint $table): void {
            $table->id();
            $table->string('phone');
            $table->string('code');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    protected function tearDown(): void
    {
        DB::disconnect('sqlite');

        parent::tearDown();
    }

    public function test_local_phone_uses_the_received_country_calling_code(): void
    {
        $service = app(ArriveWhatsService::class);

        $this->assertSame(
            '201012345678',
            $service->normalizePhoneNumber('01012345678', '+20')
        );
        $this->assertSame(
            '201012345678',
            $service->normalizePhoneNumber('+20 10 1234 5678', '965')
        );
        $this->assertSame(
            '201012345678',
            $service->normalizePhoneNumber('00201012345678', '965')
        );
    }

    public function test_database_credentials_override_environment_fallbacks(): void
    {
        AboutUs::create([
            'arrive_whats_base_url' => 'https://database.example/api',
            'arrive_whats_token' => 'database-test-token',
            'arrive_whats_default_country_code' => '20',
        ]);
        Http::fake([
            'https://database.example/api/send' => Http::response([
                'status' => true,
                'code' => 200,
            ]),
        ]);

        app(ArriveWhatsService::class)->send('01012345678', 'test message');

        Http::assertSent(function ($request): bool {
            return $request->url() === 'https://database.example/api/send'
                && $request['token'] === 'database-test-token'
                && $request['receiver'] === '201012345678'
                && $request['msgtext'] === 'test message';
        });
    }

    public function test_successful_delivery_creates_an_otp_without_exposing_it(): void
    {
        $this->createSettings();
        Http::fake([
            '*' => Http::response(['status' => true, 'code' => 200]),
        ]);

        $response = $this->postJson('/api/send_otp_register', [
            'phone' => '01012345678',
            'country_code' => '20',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('success', true)
            ->assertJsonPath('result.channel', 'whatsapp')
            ->assertJsonMissingPath('result.otp_code')
            ->assertJsonMissingPath('result.otpCode');

        $this->assertDatabaseHas('confirmation_codes', [
            'phone' => '201012345678',
            'active' => 1,
        ]);
    }

    public function test_provider_failure_does_not_create_an_otp(): void
    {
        $this->createSettings();
        Http::fake([
            '*' => Http::response([
                'status' => false,
                'code' => 503,
                'message' => 'Unavailable',
            ], 503),
        ]);

        $response = $this->postJson('/api/send_otp_register', [
            'phone' => '01012345678',
            'country_code' => '20',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('success', false);
        $this->assertSame(0, ConfirmationCodes::count());
    }

    public function test_forgot_password_otp_resets_password_and_becomes_inactive(): void
    {
        $this->createSettings();
        Http::fake([
            '*' => Http::response(['status' => true, 'code' => 200]),
        ]);
        DB::table('users')->insert([
            'phone' => '201012345678',
            'country_code' => '20',
            'password' => Hash::make('OldPassword1!'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $sendResponse = $this->postJson('/api/send_otp_password', [
            'phone' => '01012345678',
            'country_code' => '20',
        ]);
        $sendResponse
            ->assertOk()
            ->assertJsonPath('success', true)
            ->assertJsonMissingPath('result.otp_code')
            ->assertJsonMissingPath('result.otpCode');

        $confirmationCode = ConfirmationCodes::where(
            'phone',
            '201012345678'
        )->firstOrFail();
        $newPassword = 'NewPassword1!';
        $resetResponse = $this->postJson('/api/reset_password', [
            'phone' => '01012345678',
            'country_code' => '20',
            'otpCode' => $confirmationCode->code,
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
        ]);

        $resetResponse
            ->assertOk()
            ->assertJsonPath('success', true);
        $this->assertFalse((bool) $confirmationCode->fresh()->active);
        $this->assertTrue(Hash::check(
            $newPassword,
            DB::table('users')->value('password')
        ));
    }

    public function test_token_is_encrypted_and_hidden_from_serialization(): void
    {
        $settings = $this->createSettings('saved-test-token');
        $rawToken = DB::table('about_us')
            ->where('id', $settings->id)
            ->value('arrive_whats_token');

        $this->assertNotSame('saved-test-token', $rawToken);
        $this->assertSame('saved-test-token', $settings->fresh()->arrive_whats_token);
        $this->assertArrayNotHasKey(
            'arrive_whats_token',
            $settings->fresh()->toArray()
        );
    }

    public function test_blank_admin_token_submission_preserves_saved_token(): void
    {
        $settings = $this->createSettings('saved-test-token');
        $request = Mockery::mock(EditSettingRequest::class);
        $request->shouldReceive('validated')->once()->andReturn([
            'arrive_whats_base_url' => 'https://database.example/api',
            'arrive_whats_token' => '',
            'arrive_whats_default_country_code' => '20',
            'arrive_whats_receipt_phone' => null,
            'remove_arrive_whats_token' => false,
        ]);

        app(AboutUsController::class)->update($request);

        $this->assertSame(
            'saved-test-token',
            $settings->fresh()->arrive_whats_token
        );
    }

    public function test_settings_html_never_contains_the_saved_token(): void
    {
        app()->setLocale('en');
        $settings = $this->createSettings('saved-test-token');
        $html = view('admin.settings._arrive_whats', [
            'settings' => $settings,
            'errors' => new ViewErrorBag(),
        ])->render();

        $this->assertStringNotContainsString('saved-test-token', $html);
        $this->assertStringContainsString('Configured', $html);
        $this->assertStringContainsString('autocomplete="new-password"', $html);
    }

    private function createSettings(string $token = 'database-test-token'): AboutUs
    {
        return AboutUs::create([
            'arrive_whats_base_url' => 'https://database.example/api',
            'arrive_whats_token' => $token,
            'arrive_whats_default_country_code' => '20',
        ]);
    }
}
