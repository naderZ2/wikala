<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use App\Models\FavouriteProduct;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\City\CheckRequest;
use App\Http\Requests\Client\favourite\DeleteProductRequest;

class FavouriteProductController extends Controller
{
    use ResponsesTrait;

    public function index(){
        $this->lang();
        $products = Product::join('favourite_products','product_id','products.id')
        ->select('favourite_products.id as favourite_id','products.id' ,$this->name ,$this->description,$this->title,'price','old_price','serving','main_image')
        ->where('favourite_products.user_id',auth()->id())
        ->get();
        // ->where([['is_available',1]])
        // 
        // ->get();
        return $this->success($products);
    }
    
    public function myIndex(){
        $products = FavouriteProduct::where('user_id',auth()->id())
        ->pluck('product_id');

        return $this->success($products);
    }

    public function store(CheckRequest $request){
         $favProduct=FavouriteProduct::where(['user_id'=> auth()->id(), 'product_id'=> $request->id])->first();
        if($favProduct &&$favProduct!=null ){
            return $this->failed(null,"تمت اضافته الي المفضلة من قبل");
        }
        FavouriteProduct::create(['user_id'=> auth()->id(), 'product_id'=> $request->id]);
        return $this->success(null,trans('lang.created'));
    }
    
    public function delete(DeleteProductRequest $request){
       
        FavouriteProduct::where(['user_id'=> auth()->id(), 'product_id'=> $request->favourite_id])->delete();
        // FavouriteProduct::where($request->favourite_id);
        return $this->success(null,trans('lang.deleted'));
    }
}
