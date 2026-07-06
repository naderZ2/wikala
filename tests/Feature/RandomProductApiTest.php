<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use App\Models\Seller;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RandomProductApiTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_can_fetch_random_products_from_endpoint()
    {
        // Create category and seller first to avoid foreign key issues
        $category = Category::create([
            'name_en' => 'Test Category',
            'name_ar' => 'قسم تجريبي',
            'image' => 'category.png',
        ]);

        $seller = Seller::create([
            'name' => 'Test Seller',
            'phone' => '12345678',
            'email' => 'seller@test.com',
            'password' => 'password123',
        ]);

        // Create 15 products, some available, some not
        for ($i = 1; $i <= 12; $i++) {
            Product::create([
                'name_en' => "Product $i",
                'name_ar' => "منتج $i",
                'description_en' => "Description $i",
                'description_ar' => "وصف $i",
                'title_en' => "Title $i",
                'title_ar' => "عنوان $i",
                'price' => 10.0 * $i,
                'is_available' => 1,
                'main_image' => 'product.png',
                'quantity' => 10,
                'category_id' => $category->id,
                'seller_id' => $seller->id,
            ]);
        }

        // 1 unavailable product
        Product::create([
            'name_en' => "Unavailable Product",
            'name_ar' => "منتج غير متوفر",
            'description_en' => "Description",
            'description_ar' => "وصف",
            'title_en' => "Title",
            'title_ar' => "عنوان",
            'price' => 100.0,
            'is_available' => 0,
            'main_image' => 'product.png',
            'quantity' => 10,
            'category_id' => $category->id,
            'seller_id' => $seller->id,
        ]);

        // Hit the random_products endpoint
        $response = $this->getJson('/api/random_products');

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        $result = $response->json('result');
        $this->assertCount(10, $result);

        // Assert all returned products are available
        foreach ($result as $product) {
            $this->assertNotEquals('Unavailable Product', $product['name'] ?? null);
        }

        // Hit the products/random endpoint
        $responseAlt = $this->getJson('/api/products/random');
        $responseAlt->assertStatus(200);
        $this->assertCount(10, $responseAlt->json('result'));
    }
}
