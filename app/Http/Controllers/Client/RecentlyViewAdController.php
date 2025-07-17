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

    // List all recently viewed ads for the authenticated user
    public function index()
    {
        $user = auth('api')->id();
        // dd($user);
        // Log::info('User ' . $user . ' is viewing their recently viewed ads.');
        // Get all ads created by the authenticated user
        $myAds = Ad::where('user_id', $user)->pluck('id');
        Log::info($myAds);
        // Get recently viewed records for those ads
        $recentViews = RecentlyViewAd::with('ad','user')
            ->whereIn('ad_id', $myAds)
            ->orderByDesc('created_at')
            ->get();
        return $this->success($recentViews);
    }

    // Store a new recently viewed ad (optional, usually handled automatically)
    public function store(Request $request)
    {
        $userId = auth()->id();
        $adId = $request->input('ad_id');
        if (!$adId) {
            return $this->failed(null, __('lang.ad_id_required'));
        }
        $recentView = RecentlyViewAd::updateOrCreate(
            ['user_id' => $userId, 'ad_id' => $adId],
            ['created_at' => now()]
        );
        return $this->success($recentView, __('lang.created'));
    }

    // Remove a recently viewed ad
    public function destroy($id)
    {
        $userId = auth()->id();
        $deleted = RecentlyViewAd::where('user_id', $userId)->where('id', $id)->delete();
        if (!$deleted) {
            return $this->failed(null, __('lang.not_found'));
        }
        return $this->success(null, __('lang.deleted'));
    }
}
