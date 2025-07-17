<?php

namespace App\Services;

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



    public function storeAdWithImages($data)
    {
        // Add the user_id to the data array using Auth::id()
        $user = Auth::user(); // Assuming you want to set the user type as well
        $data['user_id'] = $user->id;
        $data['is_commercial'] = $user->type === 'business';

        // $data['user'] = Auth::user()->type() ? 'user' : 'business'; // Assuming you want to set the user type as well
        // Log::info('Storing ad for user: ' . $data['is_commercial'] .'user id'. $data['user_id']);



        // Handle the main image upload if available
        if (isset($data['main_image'])) {
            $data['main_image'] = $this->uploadFile($data['main_image'], 'ads');
        }

        // Store the ad with the user_id and image path
        $ad = $this->adRepository->create($data);

        if (isset($data['attributes']) && is_array($data['attributes'])) {
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









