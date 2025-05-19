<?php

namespace App\Services;

use App\Repositories\FavoriteAdRepository;
use Illuminate\Support\Facades\Auth;

class FavoriteAdService
{
    protected $favoriteAdRepository;

    public function __construct(FavoriteAdRepository $favoriteAdRepository)
    {
        $this->favoriteAdRepository = $favoriteAdRepository;
    }

    public function favoriteAd($adId)
    {
        $userId = Auth::id();

        
        if ($this->favoriteAdRepository->exists($userId, $adId)) {
            return null; 
        }

        return $this->favoriteAdRepository->create([
            'user_id' => $userId,
            'ad_id' => $adId,
        ]);
    }

    public function deleteFavoriteAd($id)
    {
        $favoriteAd = $this->favoriteAdRepository->findById($id);

        if ($favoriteAd && $favoriteAd->user_id == Auth::id()) {
            $this->favoriteAdRepository->delete($id);
            return true;
        }

        return false;
    }
}
