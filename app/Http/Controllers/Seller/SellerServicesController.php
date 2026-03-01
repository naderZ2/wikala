<?php

namespace App\Http\Controllers\Seller;

use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ResponsesTrait;
use App\Models\SellerServicesAvailability;

class SellerServicesController extends Controller
{
    use ResponsesTrait;

    /**
     * List seller services availability
     * GET /seller/services
     */
    public function index(Request $request)
    {
        $this->lang();
        $sellerServices = SellerServicesAvailability::where('seller_id', $request->user()->id)
            ->with('category', 'product')
            ->get();

        return $this->success($sellerServices, 'Seller services');
    }

    /**
     * Toggle service availability
     * PUT /seller/services/{id}/toggle
     */
    public function updateAvailability(Request $request, $id)
    {
        $sellerService = SellerServicesAvailability::where('id', $id)
            ->where('seller_id', $request->user()->id)
            ->firstOrFail();

        $sellerService->update([
            'availability' => $sellerService->availability == 0 ? 1 : 0
        ]);

        return $this->success([
            'id' => $sellerService->id,
            'availability' => $sellerService->availability,
        ], 'Availability updated');
    }

    /**
     * Store new service availability
     * POST /seller/services
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'product_id' => 'required|exists:products,id',
            'date' => 'required',
        ]);

        $availability = SellerServicesAvailability::create([
            'seller_id' => $request->user()->id,
            'category_id' => $request->category_id,
            'product_id' => $request->product_id,
            'date' => $request->date,
        ]);

        return $this->success($availability, 'Service availability created');
    }

    /**
     * Get products by category
     * GET /seller/services/products-by-category?category_id=1
     */
    public function getProductsByCategory(Request $request)
    {
        $categoryId = $request->category_id;

        if (!$categoryId) {
            return $this->success([], 'No category provided');
        }

        $products = Product::where('category_id', $categoryId)
            ->where('seller_id', $request->user()->id)
            ->get(['id', 'name_en', 'name_ar']);

        return $this->success($products, 'Products by category');
    }
}
