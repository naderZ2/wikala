<?php

namespace App\Http\Controllers\Seller;

use App\Models\{Product, Category, ProductImage, ProductVariation, ProductVariationAttribute};
use App\Services\VariationService;
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
        $mainSellerId = $seller->getMainSellerId();

        $query = Product::where('seller_id', $mainSellerId)
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
        $mainSeller = $seller->parent_id ? $seller->parent : $seller;

        $sellerCategories = $mainSeller->categories;
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
        $data['is_available'] = 0; // under review
        $data['seller_id'] = $request->user()->getMainSellerId();

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $this->uploadFile($request->file('main_image'), 'products');
        }

        $product = Product::create($data);

        if ($request->images) {
            foreach ($request->images as $file) {
                $mime = $file->getMimeType();
                if (str_starts_with($mime, 'video/')) {
                    $product->images()->create([
                        'type' => 'video',
                        'video' => $this->uploadFile($file, 'products'),
                    ]);
                } else {
                    $product->images()->create([
                        'type' => 'image',
                        'name' => $this->uploadFile($file, 'products'),
                    ]);
                }
            }
        }

        return $this->success([
            'product_id' => $product->id,
            'product' => $product->load('images'),
        ], 'Product created successfully. Under review.');
    }

    /**
     * Replace ALL variations for a product (unified flat + tree).
     * POST /seller/products/{id}/variations
     *
     * Body:
     * {
     *   "attributes": ["Size", "Color"],          // optional - controls tree nesting order on read
     *   "variations": [
     *     { "sku": "TS-M-RED",   "price": 100, "quantity": 15, "options": {"Size": "M", "Color": "Red"} },
     *     { "sku": "TS-L-BLUE",  "price": 110, "quantity": 5,  "options": {"Size": "L", "Color": "Blue"} }
     *   ]
     * }
     */
    public function storeVariations(Request $request, $id, VariationService $service)
    {
        $product = $this->ownedProduct($request, $id);

        $data = $request->validate([
            'attributes'                 => 'sometimes|array',
            'attributes.*'               => 'string',
            'variations'                 => 'required|array|min:1',
            'variations.*.sku'           => 'nullable|string',
            'variations.*.price'         => 'nullable|numeric|min:0',
            'variations.*.quantity'      => 'nullable|integer|min:0',
            'variations.*.is_active'     => 'sometimes|boolean',
            'variations.*.options'       => 'required|array|min:1',
            'variations.*.options.*'     => 'required|string',
        ]);

        $result = $service->replace($product, $data);

        return $this->success($result, 'Variations saved successfully');
    }

    /**
     * Upsert one variation.
     * PUT /seller/products/{productId}/variations/{variationId}
     */
    public function updateVariation(Request $request, $productId, $variationId, VariationService $service)
    {
        $product = $this->ownedProduct($request, $productId);

        $data = $request->validate([
            'sku'        => 'nullable|string',
            'price'      => 'nullable|numeric|min:0',
            'quantity'   => 'nullable|integer|min:0',
            'is_active'  => 'sometimes|boolean',
            'options'    => 'sometimes|array',
            'options.*'  => 'string',
        ]);
        $data['id'] = (int) $variationId;

        $variation = $service->upsert($product, $data);

        return $this->success($variation, 'Variation saved');
    }

    /**
     * DELETE /seller/products/{productId}/variations/{variationId}
     */
    public function deleteVariation(Request $request, $productId, $variationId, VariationService $service)
    {
        $product = $this->ownedProduct($request, $productId);
        $service->delete($product, (int) $variationId);
        return $this->success(null, 'Variation deleted');
    }

    /**
     * GET /seller/products/{id}/variations?as=tree|flat   (default: both)
     */
    public function getVariations(Request $request, $id, VariationService $service)
    {
        $product = $this->ownedProduct($request, $id);

        $as = $request->query('as');
        if ($as === 'tree') {
            return $this->success(['tree' => $service->buildTree($product)], 'Variation tree');
        }
        if ($as === 'flat') {
            return $this->success(['flat' => $service->flatList($product)], 'Variations');
        }

        return $this->success([
            'flat' => $service->flatList($product),
            'tree' => $service->buildTree($product),
        ], 'Variations');
    }

    /** Back-compat aliases for the old endpoints. */
    public function storeTreeVariations(Request $request, $id, VariationService $service)
    {
        return $this->storeVariations($request, $id, $service);
    }
    public function getVariationTree(Request $request, $id, VariationService $service)
    {
        $request->merge(['as' => 'tree']);
        return $this->getVariations($request, $id, $service);
    }

    private function ownedProduct(Request $request, $id): Product
    {
        return Product::where('id', $id)
            ->where('seller_id', $request->user()->getMainSellerId())
            ->firstOrFail();
    }

    /**
     * Show single product
     * GET /seller/products/{id}
     */
    public function show(Request $request, $id)
    {
        $this->lang();
        $product = Product::where('id', $id)
            ->where('seller_id', $request->user()->getMainSellerId())
            ->select('id', $this->name, $this->description, $this->title,
                'category_id', 'price', 'old_price', 'quantity', 'main_image', 'is_available',
                'name_en', 'name_ar', 'description_en', 'description_ar', 'seller_id')
            ->with('images:id,product_id,name,type,video', "category:id,$this->name", 'variations.attributes')
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
            ->where('seller_id', $request->user()->getMainSellerId())
            ->firstOrFail();

        $data = $request->validated();

        // Handle new images/videos
        if ($request->images) {
            foreach ($request->images as $file) {
                $mime = $file->getMimeType();
                if (str_starts_with($mime, 'video/')) {
                    $product->images()->create([
                        'type' => 'video',
                        'video' => $this->uploadFile($file, 'products'),
                    ]);
                } else {
                    $product->images()->create([
                        'type' => 'image',
                        'name' => $this->uploadFile($file, 'products'),
                    ]);
                }
            }
        }

        // Handle main image update
        if ($request->file('main_image')) {
            if ($product->main_image && File::exists(public_path($product->main_image))) {
                File::delete(public_path($product->main_image));
            }
            $data['main_image'] = $this->uploadFile($request->file('main_image'), 'products');
        }

        // Handle deleted images/videos
        if ($request->deleted_images) {
            $images = ProductImage::find($request->deleted_images);
            foreach ($images as $image) {
                if ($image->name && File::exists(public_path($image->name))) {
                    File::delete(public_path($image->name));
                }
                if ($image->video && File::exists(public_path($image->video))) {
                    File::delete(public_path($image->video));
                }
                $image->delete();
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
            ->where('seller_id', $request->user()->getMainSellerId())
            ->firstOrFail();

        // Delete images
        foreach ($product->images as $image) {
            if ($image->name && File::exists(public_path($image->name))) {
                File::delete(public_path($image->name));
            }
            if ($image->video && File::exists(public_path($image->video))) {
                File::delete(public_path($image->video));
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
