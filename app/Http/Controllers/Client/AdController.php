<?php

namespace App\Http\Controllers\Client;

use App\Models\Ad;
use App\Models\AdsType;
use App\Models\HiddenAd;
use App\Services\AdService;
use Illuminate\Http\Request;
use App\Models\RecentlyViewAd;
use App\Traits\ResponsesTrait;
use App\Traits\FileUploadTrait;
// use App\Http\Requests\Client\Ad\AdUpdateRequest;
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
                $query->where('category_id', $request->category_id);
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

            ->with(["city:id,$this->name", "region:id,$this->name", "adsType:id,$this->name as type", "category:id,$this->name"])
            ->where('status', 'accepted') 
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
        $data = $request->validated();
        $ad = $this->adService->storeAdWithImages($data);
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

        return $this->success(['ad'=>$ad,'related_ads'=>$related_ads]);
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
        $ad = AdsType::where('enable', 1)->select('id',$this->name)->get();
        return $this->success($ad);
    }
    public function myAds()
    {
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
    



}
