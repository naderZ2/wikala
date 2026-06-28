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
            'password' => 'password123',
            'plan_id' => $this->plan->id,
            'payment_status' => 'pending',
            'active' => false,
        ]);

        $response = $this->postJson('/api/seller/login', [
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
            'password' => 'password123',
            'plan_id' => $this->plan->id,
            'payment_status' => 'paid',
            'active' => true,
        ]);

        $response = $this->postJson('/api/seller/login', [
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
            'password' => 'password123',
            'plan_id' => $this->plan->id,
            'payment_status' => 'pending',
            'active' => true,
        ]);

        $response = $this->actingAs($seller, 'seller-api')
            ->getJson('/api/seller/profile');

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
            'password' => 'password123',
            'plan_id' => $this->plan->id,
            'payment_status' => 'paid',
            'active' => true,
        ]);

        $response = $this->actingAs($seller, 'seller-api')
            ->getJson('/api/seller/profile');

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
        $response = $this->postJson('/api/seller/register', [
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
}
