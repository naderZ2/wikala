<?php

namespace App\Http\Controllers\Client;

use App\Models\SavedAd;
use App\Models\Ad;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Services\SavedAdService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Client\SavedAd\StoreRequest;

class SavedAdController extends Controller
{
    use ResponsesTrait;

    protected $savedAdService;


    public function __construct(SavedAdService $savedAdService)
    {
        $this->savedAdService = $savedAdService;
    }

    /**
     * Store a newly created resource in storage.
     */



     
     public function store(StoreRequest $request)
     {
         $validated = $request->validated();  // بيانات الطلب بعد التحقق
     
         $savedAd = $this->savedAdService->saveAd($validated['ad_id']);
     
         if (!$savedAd) {
             return $this->failed(null, trans('lang.already_saved'));
         }
        
        $data['savedAd']=$savedAd;
        $data['ad']=Ad::where('id',$validated)->first();
        
         return $this->success($data, trans('lang.created'));
     }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy($id)
    {
        $deleted = $this->savedAdService->deleteAd($id);

        if (!$deleted) {
            return $this->failed(null, trans('lang.not_found'));
        }

        return $this->success(null, trans('lang.deleted'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();
        $savedAds = $this->savedAdService->getUserSavedAds($userId);
        return $this->success($savedAds);
    }
}
