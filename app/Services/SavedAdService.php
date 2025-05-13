<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Repositories\SavedAdRepository;

class SavedAdService
{
    protected $savedAdRepository;

    public function __construct(SavedAdRepository $savedAdRepository)
    {
        $this->savedAdRepository = $savedAdRepository;
    }

    public function saveAd($adId)
    {
        $userId = Auth::id();


        if ($this->savedAdRepository->exists($userId, $adId)) {
            return null;
        }

        return $this->savedAdRepository->create([
            'user_id' => $userId,
            'ad_id' => $adId,
        ]);
    }

    public function deleteAd($id)
    {
        // Log::info($id);
        $savedAd = $this->savedAdRepository->findById($id);
        // Log::info($savedAd);
        if ($savedAd && $savedAd->user_id == Auth::id()) {
            $this->savedAdRepository->delete($id);
            return true;
        }

        return false;
    }
}
