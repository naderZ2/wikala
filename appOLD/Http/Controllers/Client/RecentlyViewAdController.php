<?php

namespace App\Http\Controllers\Client;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Models\RecentlyViewAd;
use App\Traits\ResponsesTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RecentlyViewAdController extends Controller
{
    use ResponsesTrait;

    // List all recently viewed products for the authenticated user
    public function index()
    {
        $user = auth('api')->id();
        // Get all products created by the authenticated user (if applicable, or just viewed)
        // logic changed: assuming we want to see products the user VIEWED, not products the user OWNS that were viewed by others?
        // Original code: $myAds = Ad::where('user_id', $user)->pluck('id'); -> viewed by OTHERS?
        // "RecentlyViewAd" usually means "Ads I viewed".
        // Let's look at the original code: 
        // $myAds = Ad::where('user_id', $user)->pluck('id'); 
        // $recentViews = RecentlyViewAd::with('ad','user')->whereIn('ad_id', $myAds)...
        // PROBABLY: "Who viewed MY ads".
        
        // IF the user wants "Who viewed MY products":
        $myProducts = \App\Models\Product::where('seller_id', $user)->pluck('id'); // Assuming seller_id is user_id
        
        $recentViews = \App\Models\RecentlyViewedProduct::with('product','user')
            ->whereIn('product_id', $myProducts)
            ->orderByDesc('created_at')
            ->get();
            
        return $this->success($recentViews);
    }

    // Store a new recently viewed product
    public function store(Request $request)
    {
        $userId = auth('api')->id();

        $productId = $request->input('product_id');
        if (!$productId) {
            $productId = $request->input('ad_id'); // Fallback for backward compatibility
        }
        
        if (!$productId) {
            return $this->failed(null, __('lang.product_id_required')); // Update lang key if needed
        }
        $recentView = \App\Models\RecentlyViewedProduct::updateOrCreate(
            ['user_id' => $userId, 'product_id' => $productId],
            ['created_at' => now()]
        );
        return $this->success($recentView, __('lang.created'));
    }

    // Remove a recently viewed product record
    public function destroy($id)
    {
        $userId = auth('api')->id();
        $deleted = \App\Models\RecentlyViewedProduct::where('user_id', $userId)->where('id', $id)->delete();
        if (!$deleted) {
            return $this->failed(null, __('lang.not_found'));
        }
        return $this->success(null, __('lang.deleted'));
    }
}
