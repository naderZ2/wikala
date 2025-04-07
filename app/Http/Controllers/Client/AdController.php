<?php

namespace App\Http\Controllers\Client;

use App\Services\AdService;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Ad\StoreRequest;



class AdController extends Controller
{
    use ResponsesTrait, FileUploadTrait;

    protected $adService;

    public function __construct(AdService $adService)
    {
        $this->adService = $adService;
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated(); 

        
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $this->uploadFile($request->file('main_image'), 'ads');  // Upload the main image
        }

        
        $ad = $this->adService->storeAd($data );
        // $ad = $this->adService->storeAdWithImages($validated);

        return $this->success($ad, trans('lang.created'));
    }
    


    public function index()
    {
        $ads = $this->adService->getAllAds();
        return $this->success($ads);
    }



    public function show($id)
    {
        $ad = $this->adService->getAdById($id);
        return $this->success($ad);
    }



}
