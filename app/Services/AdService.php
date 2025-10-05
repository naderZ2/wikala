<?php

namespace App\Services;

use App\Models\User;
use App\Traits\ResponsesTrait;
use App\Traits\FileUploadTrait;
use App\Repositories\AdRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdService
{
    use ResponsesTrait ,FileUploadTrait;
    protected $adRepository;

    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function storeAd($data)
    {
        $data['user_id'] = Auth::id();
        $ad = $this->adRepository->create($data);

        if (isset($data['attributes']) && is_array($data['attributes'])) {
            foreach ($data['attributes'] as $attribute) {
                $ad->attributes()->create([
                    'attribute_id' => $attribute['id'],
                    'attribute_value' => $attribute['value'],
                ]);
            }
        }

        $ad->ad_number = 10000 + $ad->id;
        // Log::info('Ad number: ' . $ad->ad_number);
        $ad->save();
        return $ad;
    }



    // In AdService@storeAdWithImages
use App\Models\User;

public function storeAdWithImages($data)
{
    // If admin passed user_id, use it; otherwise Auth user
    $userId = $data['user_id'] ?? Auth::id();
    $user   = User::findOrFail($userId);

    $data['user_id']      = $user->id;
    $data['is_commercial']= ($user->type === 'business');

    if (isset($data['main_image']) && $data['main_image']) {
        $data['main_image'] = $this->uploadFile($data['main_image'], 'ads');
    }

    $ad = $this->adRepository->create($data);

    if (!empty($data['attributes']) && is_array($data['attributes'])) {
        foreach ($data['attributes'] as $attribute) {
            if (!empty($attribute['id']) && isset($attribute['value'])) {
                $ad->attributes()->create([
                    'attribute_id'   => $attribute['id'],
                    'attribute_value'=> $attribute['value'],
                ]);
            }
        }
    }

    if (!empty($data['images']) && is_array($data['images'])) {
        foreach ($data['images'] as $img) {
            if ($img) {
                $imagePath = $this->uploadFile($img, 'ads');
                $ad->images()->create(['image_path' => $imagePath]);
            }
        }
    }

    $ad->ad_number = 10000 + $ad->id;
    $ad->save();

    return $ad;
}


    public function updateAd($id, $data)
    {

        $ad = $this->adRepository->update($id, $data);

        if (isset($data['attributes']) && is_array($data['attributes'])) {
            $ad->attributes()->delete();
            foreach ($data['attributes'] as $attribute) {
                $ad->attributes()->create([
                    'attribute_id' => $attribute['id'],
                    'attribute_value' => $attribute['value'],
                ]);
            }
        }

        if (isset($data['images'])) {
                    foreach ($data['images'] as $img) {
                        if ($img) { // Ensure the image is not null
                            $imagePath = $this->uploadFile($img, 'ads');
                            $ad->images()->create([
                                'image_path' => $imagePath,
                            ]);
                        }
                    }
                }

        return $ad;
    }


    public function deleteAd($id)
    {
        return $this->adRepository->delete($id);
    }

    public function getAllAdsWithPagination($perPage)
    {
        return $this->adRepository->getAllAdsPagination($perPage);
    }


    public function getAllAds()
    {
        return $this->adRepository->getAll();
    }

    public function getAdById($id, $name='name_ar')
    {
        return $this->adRepository->getById($id, $name);
    }

    public function getTopAdsByCategory($categoryId, $name='name_ar')
    {
        return $this->adRepository->getTopAdsByCategory($categoryId,$name);
    }




}









