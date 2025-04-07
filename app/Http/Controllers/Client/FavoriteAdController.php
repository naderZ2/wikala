<?php

namespace App\Http\Controllers\Client;

use App\Models\FavoriteAd;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Services\FavoriteAdService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Client\FavoriteAd\StoreRequest;

class FavoriteAdController extends Controller
{
    use ResponsesTrait;

    
    protected $favoriteAdService;

    public function __construct(FavoriteAdService $favoriteAdService)
    {
        $this->favoriteAdService = $favoriteAdService;
    }

    public function store(StoreRequest $request)
{
    $validated = $request->validated();  // بيانات الطلب بعد التحقق

    $favoriteAd = $this->favoriteAdService->favoriteAd($validated['ad_id']);

    if (!$favoriteAd) {
        return $this->failed(null, trans('lang.already_favorited'));
    }

    return $this->success($favoriteAd, trans('lang.created'));
}


    public function destroy($id)
    {
        $deleted = $this->favoriteAdService->deleteFavoriteAd($id);

        if (!$deleted) {
            return $this->failed(null, trans('lang.not_found'));
        }

        return $this->success(null, trans('lang.deleted'));
    }
}
