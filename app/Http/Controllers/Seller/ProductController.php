<?php

namespace App\Http\Controllers\Seller;

use App\Models\{Product, Category, ProductImage, ProductVariation, ProductVariationAttribute};
use App\Traits\{FileUploadTrait, ResponsesTrait};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Seller\Product\EditRequest;
use App\Http\Requests\Seller\Product\StoreRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use FileUploadTrait, ResponsesTrait;

    /**
     * List products with status filter + search
     * GET /seller/products?status=approved&search=keyword
     */
    public function index(Request $request)
    {
        $this->lang();
        $seller = $request->user();

        $query = Product::where('seller_id', $seller->id)
            ->with('images:id,product_id,name', "category:id,$this->name", 'variations.attributes');

        // Filter by status (approved, under_review, rejected)
        if ($request->status) {
            $query->where('is_available', $this->mapStatus($request->status));
        }

        // Search by name
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name_en', 'like', '%' . $request->search . '%')
                  ->orWhere('name_ar', 'like', '%' . $request->search . '%');
            });
        }

        $products = $query->select(
            'id', $this->name, $this->description, $this->title,
            'category_id', 'price', 'old_price', 'quantity', 'main_image', 'is_available'
        )->get();

        return $this->success($products, 'Products list');
    }

    /**
     * Map UI status to DB value
     */
    private function mapStatus($status)
    {
        return match ($status) {
            'approved' => 1,
            'under_review' => 0,
            'rejected' => -1,
            default => null,
        };
    }

    /**
     * Get categories for product creation form
     * GET /seller/categories
     */
    public function categories(Request $request)
    {
        $this->lang();
        $seller = $request->user();

        $sellerCategories = $seller->categories;
        $sellerCategoriesIds = $sellerCategories->pluck('pivot.category_id');

        $categories = Category::whereIn('id', $sellerCategoriesIds)
            ->get(['id', 'parent_id', $this->name, 'end_point']);

        return $this->success($categories, 'Categories list');
    }

    /**
     * Store product - Step 1
     * POST /seller/products
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['seller_id'] = $request->user()->id;
        $data['main_image'] = $this->uploadFile($request->main_image, 'products');
        $data['is_available'] = 0; // under review

        $product = Product::create($data);

        if ($request->images) {
            foreach ($request->images as $img) {
                $product->images()->create([
                    'name' => $this->uploadFile($img, 'products'),
                ]);
            }
        }

        return $this->success([
            'product_id' => $product->id,
            'product' => $product->load('images'),
        ], 'Product created successfully. Under review.');
    }

    /**
     * Store product variations - Step 2
     * POST /seller/products/{id}/variations
     */
    public function storeVariations(Request $request, $id)
    {
        $product = Product::where('id', $id)
            ->where('seller_id', $request->user()->id)
            ->firstOrFail();

        $request->validate([
            'variations' => 'required|array',
            'variations.*.price' => 'nullable|numeric|min:0',
            'variations.*.quantity' => 'nullable|integer|min:0',
            'variations.*.sku' => 'nullable|string',
            'variations.*.options' => 'required|array',
            'variations.*.options.*.attribute_id' => 'nullable|integer',
            'variations.*.options.*.value' => 'required|string',
        ]);

        // Delete old variations if updating
        $product->variations()->each(function ($variation) {
            $variation->attributes()->delete();
            $variation->delete();
        });

        foreach ($request->variations as $variationData) {
            $variation = $product->variations()->create([
                'price' => $variationData['price'] ?? 0,
                'quantity' => $variationData['quantity'] ?? 0,
                'sku' => $variationData['sku'] ?? null,
            ]);

            foreach ($variationData['options'] as $option) {
                $variation->attributes()->create([
                    'attribute_id' => $option['attribute_id'] ?? 0,
                    'value' => $option['value'],
                ]);
            }
        }

        return $this->success(
            $product->load('variations.attributes'),
            'Variations saved successfully'
        );
    }

    /**
     * Show single product
     * GET /seller/products/{id}
     */
    public function show(Request $request, $id)
    {
        $this->lang();
        $product = Product::where('id', $id)
            ->where('seller_id', $request->user()->id)
            ->select('id', $this->name, $this->description, $this->title,
                'category_id', 'price', 'old_price', 'quantity', 'main_image', 'is_available',
                'name_en', 'name_ar', 'description_en', 'description_ar', 'seller_id')
            ->with('images:id,product_id,name', "category:id,$this->name", 'variations.attributes')
            ->firstOrFail();

        return $this->success($product, 'Product details');
    }

    /**
     * Update product
     * PUT /seller/products/{id}
     */
    public function update(EditRequest $request, $id)
    {
        $product = Product::where('id', $id)
            ->where('seller_id', $request->user()->id)
            ->firstOrFail();

        $data = $request->validated();

        // Handle new images
        if ($request->images) {
            foreach ($request->images as $img) {
                $product->images()->create([
                    'name' => $this->uploadFile($img, 'products'),
                ]);
            }
        }

        // Handle main image update
        if ($request->file('main_image')) {
            if ($product->main_image && File::exists(public_path($product->main_image))) {
                File::delete(public_path($product->main_image));
            }
            $data['main_image'] = $this->uploadFile($request->file('main_image'), 'products');
        }

        // Handle deleted images
        if ($request->deleted_images) {
            $images = ProductImage::find($request->deleted_images);
            foreach ($images as $image) {
                if (File::exists(public_path($image->name))) {
                    File::delete(public_path($image->name));
                    $image->delete();
                }
            }
        }

        $product->update($data);

        return $this->success(
            $product->load('images', 'variations.attributes'),
            'Product updated successfully'
        );
    }

    /**
     * Delete product
     * DELETE /seller/products/{id}
     */
    public function destroy(Request $request, $id)
    {
        $product = Product::where('id', $id)
            ->where('seller_id', $request->user()->id)
            ->firstOrFail();

        // Delete images
        foreach ($product->images as $image) {
            if (File::exists(public_path($image->name))) {
                File::delete(public_path($image->name));
            }
            $image->delete();
        }

        // Delete main image
        if ($product->main_image && File::exists(public_path($product->main_image))) {
            File::delete(public_path($product->main_image));
        }

        // Delete variations
        $product->variations()->each(function ($variation) {
            $variation->attributes()->delete();
            $variation->delete();
        });

        $product->delete();

        return $this->success(null, 'Product deleted successfully');
    }
}
