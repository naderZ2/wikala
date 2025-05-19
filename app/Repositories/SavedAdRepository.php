<?php

namespace App\Repositories;

use App\Models\SavedAd;

class SavedAdRepository
{
    public function create($data)
    {
        return SavedAd::create($data);
    }

    public function findById($id)
    {
        return SavedAd::find($id);
    }

    public function delete($id)
    {
        return SavedAd::destroy($id);
    }

    public function exists($userId, $adId)
    {
        return SavedAd::where('user_id', $userId)->where('ad_id', $adId)->exists();
    }
}
