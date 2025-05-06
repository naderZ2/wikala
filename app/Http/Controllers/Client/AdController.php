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



    // public function index()
    // {
    //     $ads = $this->adService->getAllAds();
    //     return $this->success($ads);
    // }




    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 3); 
        $ads = $this->adService->getAllAdsWithPagination($perPage);
        return $this->success([
            'items' => $ads->items(),
            'pagination' => [
                'total' => $ads->total(),
                'per_page' => $ads->perPage(),
                'current_page' => $ads->currentPage(),
                'last_page' => $ads->lastPage(),
            ]
        ]);
        
    }






    public function store(StoreRequest $request)
    {
        $data = $request->validated(); 
        // if ($request->hasFile('main_image')) {
        //     $data['main_image'] = $this->uploadFile($request->file('main_image'), 'ads');  // Upload the main image
        // }
        $ad = $this->adService->storeAdWithImages($data );
        Log::info('Ad created successfully', ['ad' => $request]);
        return $this->success($ad, trans('lang.created'));
    }



    public function show($id)
    {
        $ad = $this->adService->getAdById($id);
        return $this->success($ad);
    }



}
