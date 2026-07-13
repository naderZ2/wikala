<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Seller;
use App\Models\Plan;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SellerPlanAccessTest extends TestCase
{
    use DatabaseTransactions;

    protected $plan;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a test plan
        $this->plan = Plan::create([
            'name_en' => 'Test Plan',
            'name_ar' => 'خطة تجريبية',
            'price' => 10.00,
            'is_active' => true,
        ]);
    }

    /** @test */
    public function unpaid_seller_cannot_login()
    {
        $seller = Seller::create([
            'name' => 'Unpaid Seller',
            'phone' => '12345678',
            'email' => 'unpaid@seller.com',
            'password' => 'password123',
            'plan_id' => $this->plan->id,
            'payment_status' => 'pending',
            'active' => false,
        ]);

        $response = $this->postJson('/seller/login', [
            'phone' => '12345678',
            'password' => 'password123',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => false,
            'result' => [
                'payment_pending' => true,
                'seller_id' => $seller->id,
            ],
        ]);
        $response->assertJsonMissing(['token']);
    }

    /** @test */
    public function paid_and_active_seller_can_login()
    {
        $seller = Seller::create([
            'name' => 'Paid Seller',
            'phone' => '87654321',
            'email' => 'paid@seller.com',
            'password' => 'password123',
            'plan_id' => $this->plan->id,
            'payment_status' => 'paid',
            'active' => true,
        ]);

        $response = $this->postJson('/seller/login', [
            'phone' => '87654321',
            'password' => 'password123',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonStructure([
            'result' => [
                'token',
                'seller',
            ]
        ]);
    }

    /** @test */
    public function unpaid_seller_blocked_by_middleware()
    {
        $seller = Seller::create([
            'name' => 'Unpaid Seller',
            'phone' => '11223344',
            'email' => 'blocked_unpaid@seller.com',
            'password' => 'password123',
            'plan_id' => $this->plan->id,
            'payment_status' => 'pending',
            'active' => true,
        ]);

        $response = $this->actingAs($seller, 'seller-api')
            ->getJson('/seller/profile');

        $response->assertStatus(200);
        $response->assertJson([
            'success' => false,
            'result' => [
                'payment_pending' => true,
                'seller_id' => $seller->id,
            ],
        ]);
    }

    /** @test */
    public function paid_seller_can_access_protected_routes()
    {
        $seller = Seller::create([
            'name' => 'Paid Seller',
            'phone' => '44332211',
            'email' => 'active_paid@seller.com',
            'password' => 'password123',
            'plan_id' => $this->plan->id,
            'payment_status' => 'paid',
            'active' => true,
        ]);

        $response = $this->actingAs($seller, 'seller-api')
            ->getJson('/seller/profile');

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
    }

    /** @test */
    public function re_registering_deletes_unpaid_seller()
    {
        // 1. Create a seller with pending payment
        $oldSeller = Seller::create([
            'name' => 'Old Unpaid Seller',
            'phone' => '99988877',
            'email' => 'old_unpaid@seller.com',
            'password' => 'password123',
            'plan_id' => $this->plan->id,
            'payment_status' => 'pending',
            'active' => false,
        ]);

        $this->assertDatabaseHas('sellers', ['phone' => '99988877']);

        // 2. Post registration request with the exact same phone number
        $response = $this->postJson('/seller/register', [
            'name' => 'New Seller',
            'phone' => '99988877',
            'email' => 'old_unpaid@seller.com',
            'password' => 'new_password_123',
            'shop_name_en' => 'Shop English',
            'shop_name_ar' => 'Shop Arabic',
            'plan_id' => $this->plan->id,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        // 3. Confirm old seller is deleted, and the new seller is registered
        $this->assertDatabaseMissing('sellers', ['id' => $oldSeller->id]);
        $this->assertDatabaseHas('sellers', [
            'phone' => '99988877',
            'name' => 'New Seller',
        ]);
    }

    /** @test */
    public function upgrade_plan_keeps_old_plan_active_before_payment()
    {
        // Mock Payzah API response
        \Illuminate\Support\Facades\Http::fake([
            'https://development.payzah.net/ws/paymentgateway/index' => \Illuminate\Support\Facades\Http::response([
                'status' => 'success',
                'paymentUrl' => 'https://payzah.net/pay/12345'
            ], 200)
        ]);

        // Create a seller who already has an active, paid plan
        $seller = Seller::create([
            'name' => 'Active Seller',
            'phone' => '12121212',
            'email' => 'upgrade_before@seller.com',
            'password' => 'password123',
            'plan_id' => $this->plan->id,
            'payment_status' => 'paid',
            'plan_starts_at' => now()->subDays(5),
            'plan_ends_at' => now()->addDays(25),
            'active' => true,
        ]);

        // Create a new upgrade plan
        $newPlan = Plan::create([
            'name_en' => 'Premium Plan',
            'name_ar' => 'خطة مميزة',
            'price' => 50.00,
            'is_active' => true,
        ]);

        // Seller attempts to upgrade to Premium Plan
        $response = $this->postJson('/seller/select-plan', [
            'seller_id' => $seller->id,
            'plan_id' => $newPlan->id,
        ]);

        $response->assertStatus(200);

        // Assert seller's plan is still the OLD plan, and payment_status is still 'paid'
        $seller->refresh();
        $this->assertEquals($this->plan->id, $seller->plan_id);
        $this->assertEquals('paid', $seller->payment_status);

        // Assert a pending SellerSubscriptionPayment record was created for the new plan
        $this->assertDatabaseHas('seller_subscription_payments', [
            'seller_id' => $seller->id,
            'plan_id' => $newPlan->id,
            'status' => 'pending',
            'amount' => 50.00,
        ]);
    }

    /** @test */
    public function upgrade_plan_success_updates_to_new_plan()
    {
        \Illuminate\Support\Facades\Http::fake([
            'https://development.payzah.net/ws/paymentgateway/get-payment-details' => \Illuminate\Support\Facades\Http::response([
                'status' => 'Captured',
                'amount' => 50.0
            ], 200)
        ]);

        // Create an active seller
        $seller = Seller::create([
            'name' => 'Active Seller',
            'phone' => '23232323',
            'email' => 'upgrade_success@seller.com',
            'password' => 'password123',
            'plan_id' => $this->plan->id,
            'payment_status' => 'paid',
            'plan_starts_at' => now()->subDays(5),
            'plan_ends_at' => now()->addDays(25),
            'active' => true,
        ]);

        $newPlan = Plan::create([
            'name_en' => 'Premium Plan',
            'name_ar' => 'خطة مميزة',
            'price' => 50.00,
            'is_active' => true,
        ]);

        $trackid = 'SELLERPLAN' . $seller->id . time();

        // Create the pending subscription record first
        $paymentRecord = \App\Models\SellerSubscriptionPayment::create([
            'seller_id' => $seller->id,
            'plan_id' => $newPlan->id,
            'amount' => 50.00,
            'status' => 'pending',
            'transaction_id' => $trackid,
            'payment_method' => 'Payzah',
        ]);

        // Call successful callback
        $response = $this->getJson(route('seller.payment.success', ['trackid' => $trackid]));

        $response->assertStatus(200);

        // Assert seller's plan updated to the new plan, and payment_status is 'paid'
        $seller->refresh();
        $this->assertEquals($newPlan->id, $seller->plan_id);
        $this->assertEquals('paid', $seller->payment_status);

        // Assert payment record is updated to paid
        $paymentRecord->refresh();
        $this->assertEquals('paid', $paymentRecord->status);
    }

    /** @test */
    public function upgrade_plan_failure_retains_old_plan()
    {
        // Create active seller
        $seller = Seller::create([
            'name' => 'Active Seller',
            'phone' => '34343434',
            'email' => 'upgrade_fail@seller.com',
            'password' => 'password123',
            'plan_id' => $this->plan->id,
            'payment_status' => 'paid',
            'plan_starts_at' => now()->subDays(5),
            'plan_ends_at' => now()->addDays(25),
            'active' => true,
        ]);

        $newPlan = Plan::create([
            'name_en' => 'Premium Plan',
            'name_ar' => 'خطة مميزة',
            'price' => 50.00,
            'is_active' => true,
        ]);

        $trackid = 'SELLERPLAN' . $seller->id . time();

        $paymentRecord = \App\Models\SellerSubscriptionPayment::create([
            'seller_id' => $seller->id,
            'plan_id' => $newPlan->id,
            'amount' => 50.00,
            'status' => 'pending',
            'transaction_id' => $trackid,
            'payment_method' => 'Payzah',
        ]);

        // Call failed callback
        $response = $this->getJson(route('seller.payment.fail', ['trackid' => $trackid]));

        $response->assertStatus(200);

        // Assert seller retains old plan and status remains 'paid'
        $seller->refresh();
        $this->assertEquals($this->plan->id, $seller->plan_id);
        $this->assertEquals('paid', $seller->payment_status);

        // Assert subscription payment history is marked as failed
        $paymentRecord->refresh();
        $this->assertEquals('failed', $paymentRecord->status);
    }
}
