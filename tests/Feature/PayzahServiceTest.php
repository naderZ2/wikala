<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\PayzahService;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class PayzahServiceTest extends TestCase
{
    protected PayzahService $service;

    protected function setUp(): void
    {
        parent::setUp();

        config(['services.payzah.api_url' => 'https://development.payzah.net/ws/paymentgateway/index']);
        config(['services.payzah.private_key' => 'test-private-key']);

        $this->service = new PayzahService();
    }

    /** @test */
    public function it_initiates_payment_successfully()
    {
        Http::fake([
            'https://development.payzah.net/ws/paymentgateway/index' => Http::response([
                'status' => 'success',
                'paymentUrl' => 'https://payzah.net/pay/12345'
            ], 200)
        ]);

        $response = $this->service->initiatePayment([
            'trackid' => '123456',
            'amount' => 10.0,
            'currency' => 'KWD',
            'payment_type' => '1'
        ]);

        $this->assertEquals('success', $response['status']);
        $this->assertEquals('https://payzah.net/pay/12345', $response['paymentUrl']);
    }

    /** @test */
    public function it_verifies_payment_successfully()
    {
        Http::fake([
            'https://development.payzah.net/ws/paymentgateway/get-payment-details' => Http::response([
                'status' => 'Captured',
                'amount' => 10.0
            ], 200)
        ]);

        $response = $this->service->verifyPayment([
            'trackid' => '123456'
        ]);

        $this->assertEquals('Captured', $response['status']);
        $this->assertEquals(10.0, $response['amount']);
    }

    /** @test */
    public function it_fails_validation_for_payment_initiation_without_parameters()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')->postJson('/api/pay/payzah', []);

        $response->assertStatus(400);
        $response->assertJson([
            'success' => false
        ]);
    }

    /** @test */
    public function it_processes_payment_via_api_successfully()
    {
        Http::fake([
            'https://development.payzah.net/ws/paymentgateway/index' => Http::response([
                'status' => 'success',
                'paymentUrl' => 'https://payzah.net/pay/12345'
            ], 200)
        ]);

        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')->postJson('/api/pay/payzah', [
            'trackid' => '123456',
            'amount' => 10.0,
            'currency' => 'KWD',
            'payment_type' => '1'
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'paymentUrl' => 'https://payzah.net/pay/12345'
        ]);
    }
}
