<?php

namespace App\Repositories;

use App\Models\FavoriteAd;

class FavoriteAdRepository
{
    public function create($data)
    {
        return FavoriteAd::create($data);
    }

    public function findById($id)
    {
        return FavoriteAd::find($id);
    }

    public function delete($id)
    {
        return FavoriteAd::destroy($id);
    }

    public function exists($userId, $adId)
    {
        return FavoriteAd::where('user_id', $userId)->where('ad_id', $adId)->exists();
    }
}
