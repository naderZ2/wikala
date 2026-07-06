<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Seller;
use App\Models\AboutUs;
use App\Services\PayzahService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class SellerBannerApiTest extends TestCase
{
    use DatabaseMigrations;

    protected $seller;
    protected $category;

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
            'banner_price' => 25.00, // Admin sets banner price to 25 KWD
            'instance_id' => '1',
            'access_token' => 'token',
        ]);

        $this->category = Category::create([
            'name_en' => 'Test Category',
            'name_ar' => 'قسم تجريبي',
            'image' => 'category.png',
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
    public function seller_can_upload_and_pay_for_homepage_banner()
    {
        Storage::fake('public');

        // 1. Upload Banner (initially unpaid)
        $image = UploadedFile::fake()->image('banner.png', 800, 400);

        $response = $this->actingAs($this->seller, 'seller-api')
            ->postJson('/seller/banners', [
                'image' => $image,
                'category_id' => $this->category->id,
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        $bannerId = $response->json('result.id');
        $this->assertNotNull($bannerId);

        // Assert the banner is not paid yet
        $banner = Banner::find($bannerId);
        $this->assertEquals(0, $banner->is_paid);
        $this->assertEquals($this->seller->id, $banner->seller_id);

        // 2. Public banners API should NOT return the unpaid banner
        $publicResponse = $this->getJson('/api/banners?category_id=' . $this->category->id);
        $publicResponse->assertStatus(200);
        $this->assertCount(0, $publicResponse->json('result.banners'));

        // 3. Initiate payment
        Http::fake([
            'https://development.payzah.net/ws/paymentgateway/index' => Http::response([
                'status' => 'success',
                'paymentUrl' => 'https://payzah.net/pay/banner123'
            ], 200)
        ]);

        $payResponse = $this->actingAs($this->seller, 'seller-api')
            ->postJson("/seller/banners/{$bannerId}/pay");

        $payResponse->assertStatus(200);
        $payResponse->assertJson([
            'status' => 'success',
            'paymentUrl' => 'https://payzah.net/pay/banner123'
        ]);

        // Get track id
        $banner->refresh();
        $paymentDetails = json_decode($banner->payment_details, true);

        // 4. Simulate Payzah success callback
        Http::fake([
            'https://development.payzah.net/ws/paymentgateway/get-payment-details' => Http::response([
                'status' => 'Captured',
                'amount' => 25.00
            ], 200)
        ]);

        $trackid = 'SELLERBANNER' . $banner->id . 'T' . time(); // The format used in initiation

        $callbackResponse = $this->getJson(route('seller.banner_payment.success', ['trackid' => $trackid]));
        $callbackResponse->assertStatus(200);
        $callbackResponse->assertSee('Payment Successful');

        // Assert the banner is now paid and has a 7-day display window
        $banner->refresh();
        $this->assertEquals(1, $banner->is_paid);
        $this->assertNotNull($banner->start_date);
        $this->assertNotNull($banner->end_date);
        $this->assertTrue(now()->between($banner->start_date, $banner->end_date));

        // 5. Public banners API should now return the active paid banner!
        $publicResponsePaid = $this->getJson('/api/banners?category_id=' . $this->category->id);
        $publicResponsePaid->assertStatus(200);
        $this->assertCount(1, $publicResponsePaid->json('result.banners'));
        $this->assertEquals($banner->id, $publicResponsePaid->json('result.banners.0.id'));
    }

    /** @test */
    public function seller_can_upload_and_pay_for_slider_placement()
    {
        Storage::fake('public');

        // 1. Upload Slider Ad
        $image = UploadedFile::fake()->image('slider_ad.png', 1200, 600);

        $response = $this->actingAs($this->seller, 'seller-api')
            ->postJson('/seller/banners', [
                'image' => $image,
                'type' => 'slider', // Select slider type
            ]);

        $response->assertStatus(200);
        $bannerId = $response->json('result.id');
        $this->assertNotNull($bannerId);

        $banner = Banner::find($bannerId);
        $this->assertEquals('slider', $banner->type);
        $this->assertEquals(0, $banner->is_paid);

        // 2. Public index API should NOT return the unpaid slider
        $publicResponse = $this->getJson('/api/banners');
        $publicResponse->assertStatus(200);
        $this->assertCount(0, $publicResponse->json('result.slider'));

        // 3. Initiate payment
        Http::fake([
            'https://development.payzah.net/ws/paymentgateway/index' => Http::response([
                'status' => 'success',
                'paymentUrl' => 'https://payzah.net/pay/slider123'
            ], 200)
        ]);

        $payResponse = $this->actingAs($this->seller, 'seller-api')
            ->postJson("/seller/banners/{$bannerId}/pay");

        $payResponse->assertStatus(200);

        // 4. Simulate Payzah success callback
        Http::fake([
            'https://development.payzah.net/ws/paymentgateway/get-payment-details' => Http::response([
                'status' => 'Captured',
                'amount' => 25.00
            ], 200)
        ]);

        $trackid = 'SELLERBANNER' . $banner->id . 'T' . time();

        $callbackResponse = $this->getJson(route('seller.banner_payment.success', ['trackid' => $trackid]));
        $callbackResponse->assertStatus(200);

        // 5. Public index API should now return the active paid slider!
        $publicResponsePaid = $this->getJson('/api/banners');
        $publicResponsePaid->assertStatus(200);
        
        // It should be inside the slider array
        $sliders = $publicResponsePaid->json('result.slider');
        $this->assertCount(1, $sliders);
        $this->assertEquals($banner->name, $sliders[0]['name']);
    }
}
