<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Slider;
use App\Models\Seller;
use App\Models\AboutUs;
use App\Services\PayzahService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class SellerSliderApiTest extends TestCase
{
    use DatabaseMigrations;

    protected $seller;

    protected function setUp(): void
    {
        parent::setUp();

        // Setup base settings
        AboutUs::create([
            'whatsapp_number' => '123456',
            'phone' => '123456',
            'email' => 'admin@test.com',
            'image_limit' => 5,
            'delivery_fee' => 1.50,
            'slider_price' => 30.00, // Admin sets slider price to 30 KWD
            'instance_id' => '1',
            'access_token' => 'token',
        ]);

        $this->seller = Seller::create([
            'name' => 'Paid Seller',
            'phone' => '87654321',
            'email' => 'seller@test.com',
            'password' => 'password123',
            'active' => true,
            'payment_status' => 'paid',
        ]);

        config(['services.payzah.api_url' => 'https://development.payzah.net/ws/paymentgateway/index']);
        config(['services.payzah.private_key' => 'test-private-key']);
    }

    /** @test */
    public function seller_can_upload_and_pay_for_homepage_slider_ad()
    {
        Storage::fake('public');

        // 1. Upload Slider Ad (initially unpaid)
        $image = UploadedFile::fake()->image('slider_ad.png', 1200, 600);

        $response = $this->actingAs($this->seller, 'seller-api')
            ->postJson('/seller/sliders', [
                'image' => $image,
                'link' => 'https://google.com'
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        $sliderId = $response->json('result.id');
        $this->assertNotNull($sliderId);

        // Assert the slider is not paid yet
        $slider = Slider::find($sliderId);
        $this->assertEquals(0, $slider->is_paid);
        $this->assertEquals($this->seller->id, $slider->seller_id);
        $this->assertEquals('image', $slider->type);

        // 2. Public homepage sliders API should NOT return the unpaid slider
        $publicResponse = $this->getJson('/api/banners'); // Homepage sliders and banners endpoint
        $publicResponse->assertStatus(200);
        $this->assertCount(0, $publicResponse->json('result.slider'));

        $homeResponse = $this->getJson('/api/home'); // Homepage sliders via HomeController
        $homeResponse->assertStatus(200);
        $this->assertCount(0, $homeResponse->json('result.sliders'));

        // 3. Initiate payment
        Http::fake([
            'https://development.payzah.net/ws/paymentgateway/index' => Http::response([
                'status' => 'success',
                'paymentUrl' => 'https://payzah.net/pay/slider123'
            ], 200)
        ]);

        $payResponse = $this->actingAs($this->seller, 'seller-api')
            ->postJson("/seller/sliders/{$sliderId}/pay");

        $payResponse->assertStatus(200);
        $payResponse->assertJson([
            'status' => 'success',
            'paymentUrl' => 'https://payzah.net/pay/slider123'
        ]);

        // Get track id
        $slider->refresh();
        $paymentDetails = json_decode($slider->payment_details, true);

        // 4. Simulate Payzah success callback
        Http::fake([
            'https://development.payzah.net/ws/paymentgateway/get-payment-details' => Http::response([
                'status' => 'Captured',
                'amount' => 30.00
            ], 200)
        ]);

        $trackid = 'SELLERMINISLIDER' . $slider->id . 'T' . time();

        $callbackResponse = $this->getJson(route('seller.slider_payment.success', ['trackid' => $trackid]));
        $callbackResponse->assertStatus(200);
        $callbackResponse->assertSee('Payment Successful');

        // Assert the slider is now paid and has a 7-day display window
        $slider->refresh();
        $this->assertEquals(1, $slider->is_paid);
        $this->assertNotNull($slider->start_date);
        $this->assertNotNull($slider->end_date);
        $this->assertTrue(now()->between($slider->start_date, $slider->end_date));

        // 5. Public homepage sliders API should now return the active paid slider!
        $publicResponsePaid = $this->getJson('/api/banners');
        $publicResponsePaid->assertStatus(200);
        $this->assertCount(1, $publicResponsePaid->json('result.slider'));
        $this->assertEquals($slider->id, $publicResponsePaid->json('result.slider.0.id'));

        $homeResponsePaid = $this->getJson('/api/home');
        $homeResponsePaid->assertStatus(200);
        $this->assertCount(1, $homeResponsePaid->json('result.sliders'));
        $this->assertEquals($slider->id, $homeResponsePaid->json('result.sliders.0.id'));
    }
}
