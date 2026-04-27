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
     * Store product variations - Step 2
     * POST /seller/products/{id}/variations
     */
    public function storeVariations(Request $request, $id)
    {
        $product = Product::where('id', $id)
            ->where('seller_id', $request->user()->getMainSellerId())
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
     * Update a single variation (create if it doesn't exist)
     * PUT /seller/products/{productId}/variations/{variationId}
     */
    public function updateVariation(Request $request, $productId, $variationId)
    {
        $product = Product::where('id', $productId)
            ->where('seller_id', $request->user()->getMainSellerId())
            ->firstOrFail();

        $request->validate([
            'price'                 => 'nullable|numeric|min:0',
            'quantity'              => 'nullable|integer|min:0',
            'sku'                   => 'nullable|string',
            'options'               => 'sometimes|array',
            'options.*.attribute_id'=> 'nullable|integer',
            'options.*.value'       => 'required|string',
        ]);

        // Find existing or create new variation
        $variation = ProductVariation::firstOrNew(
            ['id' => $variationId, 'product_id' => $product->id]
        );

        $isNew = !$variation->exists;

        $variation->fill([
            'product_id' => $product->id,
            'price'      => $request->price    ?? $variation->price ?? 0,
            'quantity'   => $request->quantity  ?? $variation->quantity ?? 0,
            'sku'        => $request->sku       ?? $variation->sku,
        ]);
        $variation->save();

        // Replace attributes only if options are provided
        if ($request->has('options')) {
            $variation->attributes()->delete();

            foreach ($request->options as $option) {
                $variation->attributes()->create([
                    'attribute_id' => $option['attribute_id'] ?? 0,
                    'value'        => $option['value'],
                ]);
            }
        }

        return $this->success(
            $variation->load('attributes'),
            $isNew ? 'Variation created successfully' : 'Variation updated successfully'
        );
    }

    /**
     * Delete a single variation
     * DELETE /seller/products/{productId}/variations/{variationId}
     */
    public function deleteVariation(Request $request, $productId, $variationId)
    {
        $product = Product::where('id', $productId)
            ->where('seller_id', $request->user()->getMainSellerId())
            ->firstOrFail();

        $variation = ProductVariation::where('id', $variationId)
            ->where('product_id', $product->id)
            ->firstOrFail();

        $variation->attributes()->delete();
        $variation->delete();

        return $this->success(null, 'Variation deleted successfully');
    }

    /**
     * Store tree-structured variations
     * POST /seller/products/{id}/variation-tree
     *
     * Example body:
     * {
     *   "tree": [
     *     {
     *       "attribute_name": "Size",
     *       "value": "M",
     *       "children": [
     *         { "attribute_name": "Color", "value": "Red",   "quantity": 15, "price": 100 },
     *         { "attribute_name": "Color", "value": "Black", "quantity": 10, "price": 100 }
     *       ]
     *     },
     *     {
     *       "attribute_name": "Size",
     *       "value": "L",
     *       "children": [
     *         { "attribute_name": "Color", "value": "Red",   "quantity": 20, "price": 110 },
     *         { "attribute_name": "Color", "value": "Blue",  "quantity": 5,  "price": 110 }
     *       ]
     *     }
     *   ]
     * }
     */
    public function storeTreeVariations(Request $request, $id)
    {
        $product = Product::where('id', $id)
            ->where('seller_id', $request->user()->getMainSellerId())
            ->firstOrFail();

        $request->validate([
            'tree'                          => 'required|array|min:1',
            'tree.*.attribute_name'         => 'required|string',
            'tree.*.value'                  => 'required|string',
            'tree.*.price'                  => 'nullable|numeric|min:0',
            'tree.*.quantity'               => 'nullable|integer|min:0',
            'tree.*.sku'                    => 'nullable|string',
            'tree.*.children'               => 'nullable|array',
            'tree.*.children.*.attribute_name' => 'required_with:tree.*.children|string',
            'tree.*.children.*.value'          => 'required_with:tree.*.children|string',
            'tree.*.children.*.price'          => 'nullable|numeric|min:0',
            'tree.*.children.*.quantity'       => 'nullable|integer|min:0',
            'tree.*.children.*.sku'            => 'nullable|string',
            'tree.*.children.*.children'       => 'nullable|array',
        ]);

        // Delete existing variations for this product
        $product->variations()->each(function ($variation) {
            $variation->attributes()->delete();
            $variation->delete();
        });

        // Recursively create tree
        $this->createVariationNodes($product->id, $request->tree, null);

        // Return the full tree
        $tree = ProductVariation::where('product_id', $product->id)
            ->whereNull('parent_id')
            ->with('allChildren', 'attributes')
            ->get();

        return $this->success($tree, 'Variation tree saved successfully');
    }

    /**
     * Recursively create variation nodes
     */
    private function createVariationNodes($productId, array $nodes, $parentId)
    {
        foreach ($nodes as $node) {
            $variation = ProductVariation::create([
                'product_id' => $productId,
                'parent_id'  => $parentId,
                'price'      => $node['price'] ?? null,
                'quantity'   => $node['quantity'] ?? 0,
                'sku'        => $node['sku'] ?? null,
            ]);

            // Store the attribute for this node
            $variation->attributes()->create([
                'attribute_id' => 0,
                'value'        => ($node['attribute_name'] ?? '') . ':' . ($node['value'] ?? ''),
            ]);

            // Recurse into children
            if (!empty($node['children'])) {
                $this->createVariationNodes($productId, $node['children'], $variation->id);
            }
        }
    }

    /**
     * Get the variation tree for a product
     * GET /seller/products/{id}/variation-tree
     */
    public function getVariationTree(Request $request, $id)
    {
        $product = Product::where('id', $id)
            ->where('seller_id', $request->user()->getMainSellerId())
            ->firstOrFail();

        $tree = ProductVariation::where('product_id', $product->id)
            ->whereNull('parent_id')
            ->with('allChildren', 'attributes')
            ->get();

        return $this->success($tree, 'Variation tree');
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
