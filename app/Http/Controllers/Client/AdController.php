<?php

namespace App\Http\Controllers\Client;

use App\Services\AdService;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Ad\StoreRequest;
use App\Models\HiddenAd;
use App\Models\Ad;

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
        $perPage = $request->get('per_page', 10);
        $userId = auth()->id();

        $ads = Ad::whereDoesntHave('hiddenAds', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
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
        $ad = $this->adService->storeAdWithImages($data );
        Log::info('Ad created successfully', ['ad' => $request]);
        return $this->success($ad, trans('lang.created'));
    }

    public function show($id)
    {
        $ad = $this->adService->getAdById($id);
        return $this->success($ad);
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

}
