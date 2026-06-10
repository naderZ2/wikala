<?php

namespace App\Http\Controllers\Client;

use App\Models\Ad;
use App\Models\AdsType;
use App\Models\Category;
use App\Models\HiddenAd;
use App\Services\AdService;
use Illuminate\Http\Request;
use App\Models\RecentlyViewAd;
use App\Traits\ResponsesTrait;
// use App\Http\Requests\Client\Ad\AdUpdateRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Client\Ad\StoreRequest;
use App\Http\Requests\Client\Ad\AdUpdateRequest;

class AdController extends Controller
{
    use ResponsesTrait, FileUploadTrait;

    protected $adService;

    public function __construct(AdService $adService)
    {
        $this->adService = $adService;

        $this->middleware('auth:api')->except(['index', 'show', 'typesIndex', 'userAds']);
    }

    public function index(Request $request)
    {
        $this->lang();

        $perPage = $request->get('per_page', 10);
        $userId = auth()->id();

        $ads = Ad::whereDoesntHave('hiddenAds', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->when($request->has('category_id'), function ($query) use ($request) {
                // Get all subcategory IDs for the given category_id
                $categoryIds = Category::where('parent_id', $request->category_id)
                    ->orWhere('id', $request->category_id)
                    ->pluck('id');
                $query->whereIn('category_id', $categoryIds);
            })
            ->when($request->has('type_id'), function ($query) use ($request) {
                $query->where('type_id', $request->type_id);
            })
            ->when($request->has('min_price'), function ($query) use ($request) {
                $query->where('price', '>=', $request->min_price);
            })
            ->when($request->has('max_price'), function ($query) use ($request) {
                $query->where('price', '<=', $request->max_price);
            })
            ->when($request->has('city_id'), function ($query) use ($request) {
                $query->where('city_id', $request->city_id);
            })
            ->when($request->has('region_id'), function ($query) use ($request) {
                $query->where('region_id', $request->region_id);
            })
            ->when($request->has('type_id'), function ($query) use ($request) {
                $query->where('type_id', $request->type_id);
            })
            ->when($request->has('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')->orWhere('description', 'like', '%' . $request->search . '%');
            })

            ->with(["city:id,$this->name", "region:id,$this->name", "adsType:id,$this->name as type", "category:id,$this->name"])
            ->where('status', 'accepted')
            ->orderBy('is_sponsored', 'desc')
            ->orderBy('sponsored_price', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return $this->success([
            'items' => $ads->items(),
            'pagination' => [
                'total' => $ads->total(),
                'per_page' => $ads->perPage(),
                'current_page' => $ads->currentPage(),
                'last_page' => $ads->lastPage(),
            ],
        ]);
    }

    public function store(StoreRequest $request)
    {
        $user = auth()->user();
        $categoryId = $request->category_id;

        // Check global limit
        if ($user->limit_ad <= 0) {
            return $this->failed(null, trans('lang.limit_reached'));
        }

        // Check category-specific limit
        if (!$user->canCreateFreeAdInCategory($categoryId)) {
            return $this->failed(null, trans('lang.category_limit_reached'));
        }

        $data = $request->validated();
        $ad = $this->adService->storeAdWithImages($data);

        // Decrement global limit
        $user->update(['limit_ad' => $user->limit_ad - 1]);

        // Increment category-specific used count
        $userLimit = $user->getCategoryLimit($categoryId);
        if ($userLimit) {
            $userLimit->increment('used_ads_count');
        }

        Log::info('Ad created successfully', ['ad' => $request]);

        return $this->success($ad, trans('lang.created'));
    }

    public function show($id)
    {
        $this->lang();
        $name = $this->name;

        // Record the view if user is authenticated

        $ad = $this->adService->getAdById($id, $name);

        if (auth()->check() && $ad) {
            $userId = auth()->id();
            // Create or update recent view
            RecentlyViewAd::updateOrCreate(
                ['user_id' => $userId, 'ad_id' => $id],
                ['created_at' => now()]
            );
        }
        $related_ads = $this->adService->getTopAdsByCategory($ad->category_id, $name);

        return $this->success(['ad' => $ad, 'related_ads' => $related_ads]);
    }

    public function update(AdUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $ad = $this->adService->updateAd($id, $data);

        return $this->success($ad, 'Ad updated successfully.');
    }

    public function hideAd(Request $request)
    {
        $userId = auth()->id();
        $adId = $request->ad_id;
        HiddenAd::create([
            'user_id' => $userId,
            'ad_id' => $adId,
        ]);
        return $this->success(null, 'Ad hidden successfully.');
    }


    public function typesIndex()
    {
        $this->lang();
        Log::info('Fetching types index');
        $ad = AdsType::where('enable', 1)->select('id', $this->name)->get();
        return $this->success($ad);
    }
    public function myAds()
    {
        $this->lang();
        $userId = auth()->id();
        $ads = Ad::where('user_id', $userId)
            ->whereDoesntHave('hiddenAds', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->with(["city:id,$this->name", "region:id,$this->name", "adsType:id,$this->name as type", "category:id,$this->name"])
            ->where('status', 'accepted')
            ->get();

        return $this->success($ads);
    }

    public function userAds($id)
    {
        $this->lang();

        $myId = Auth::id();

        $ads = Ad::where('user_id', $id)
            ->whereDoesntHave('hiddenAds', function ($query) use ($myId) {
                $query->where('user_id', $myId);
            })
            ->with(["city:id,$this->name", "region:id,$this->name", "adsType:id,$this->name as type", "category:id,$this->name"])

            ->where('status', 'accepted')
            ->get();

        return $this->success($ads);
    }

    /**
     * Get user's ad limits for all categories.
     */
    public function myLimits()
    {
        $this->lang();
        $user = auth()->user();

        // Get all end-point categories
        $categories = Category::where('end_point', 1)
            ->with('parent')
            ->select('id', 'name_ar', 'name_en', 'free_ads_limit', 'parent_id', 'is_free')
            ->get()
            ->map(function ($category) use ($user) {
                $userLimit = $user->getCategoryLimit($category->id);
                $usedAds = $user->ads()->where('category_id', $category->id)->count();

                // Get effective limit (custom or default)
                $effectiveLimit = $userLimit ? $userLimit->free_ads_limit : $category->free_ads_limit;
                $usedCount = $userLimit ? $userLimit->used_ads_count : $usedAds;
                $remaining = max(0, $effectiveLimit - $usedCount);

                // Build category path
                $categoryName = request()->header('Lang') == 'en' ? $category->name_en : $category->name_ar;
                if ($category->parent) {
                    $parentName = request()->header('Lang') == 'en' ? $category->parent->name_en : $category->parent->name_ar;
                    $categoryName = $parentName . ' - ' . $categoryName;
                }

                return [
                    'category_id' => $category->id,
                    'category_name' => $categoryName,
                    'is_free' => (bool) $category->is_free,
                    'limit' => $effectiveLimit,
                    'used' => $usedCount,
                    'remaining' => $remaining,
                    'can_create' => $remaining > 0,
                ];
            });

        // Also return global limit
        $globalLimit = [
            'global_limit' => $user->limit_ad,
        ];

        return $this->success([
            'global' => $globalLimit,
            'categories' => $categories,
        ]);
    }
}
