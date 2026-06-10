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
         $validated = $request->validated();
         $productId = $validated['ad_id'] ?? $request->input('product_id'); // Handle both

         // Check if already favorite/saved
         $savedAd = \App\Models\FavouriteProduct::where(['user_id'=> auth()->id(), 'product_id'=> $productId])->first();
     
         if ($savedAd) {
             return $this->failed(null, trans('lang.already_saved'));
         }

         $savedAd = \App\Models\FavouriteProduct::create(['user_id'=> auth()->id(), 'product_id'=> $productId]);
        
        $data['savedAd']=$savedAd;
        $data['ad']= \App\Models\Product::where('id',$productId)->first(); // Return product instead of ad
        
         return $this->success($data, trans('lang.created'));
     }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy($id)
    {
        $deleted = \App\Models\FavouriteProduct::where(['user_id'=> auth()->id(), 'product_id'=> $id])->delete();

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
        $products = \App\Models\Product::join('favourite_products','product_id','products.id')
        ->select('favourite_products.id as favourite_id','products.id' ,$this->name ,$this->description,$this->title,'price','old_price','serving','main_image')
        ->where('favourite_products.user_id',auth()->id())
        ->get();
        return $this->success($products);
    }
}
