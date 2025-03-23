<?php
namespace App\Http\Controllers\Client;
use App\Models\Product;
use App\Models\FavouriteSeller;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\City\CheckRequest;
use App\Http\Requests\Client\favourite\DeleteSellerRequest;
use DB;
class FavouriteSellerController extends Controller
{
    use ResponsesTrait;
    
    //  $this->lang();
        // $products = Product::join('favourite_products','product_id','products.id')
        // ->select('favourite_products.id as favourite_id','products.id' ,$this->name ,$this->description,$this->title,'price','old_price','serving','main_image')
        // ->where('favourite_products.user_id',auth()->id())
        // ->get();
        
        public function myIndex(){
            // return auth()->id();
        $products = FavouriteSeller::where('user_id',auth()->id())
        ->pluck('seller_id');

        return $this->success($products);
    }

      public function favourite_sellers(Request $request){
        $sellers = DB::table('sellers')
        ->join('favourite_sellers','seller_id','sellers.id')
        ->where('favourite_sellers.user_id',auth()->id())
        ->get(['sellers.id','favourite_sellers.id as favourite_id','name','longitude','latitude','details','img_path']);
        return $this->success($sellers);
    }

    public function index(){
        $this->lang();
        $products = Product::join('favourite_products','product_id','products.id')
        ->where([['is_available',1]])
        ->select('favourite_products.id as favourite_id','products.id' ,$this->name ,$this->description,$this->title,'price','old_price','serving','main_image')
        ->get();
        return $this->success($products);
    }

    public function store(CheckRequest $request){

        $favProduct=FavouriteSeller::where(['user_id'=> auth()->id(), 'seller_id'=> $request->id])->first();
        if($favProduct &&$favProduct!=null ){
            return $this->failed(null,"تمت اضافته الي المفضلة من قبل");
        }
        FavouriteSeller::create(['user_id'=> auth()->id(), 'seller_id'=> $request->id]);
        return $this->success(null,trans('lang.created'));
    }
    
    public function delete(DeleteSellerRequest $request){
     
    //  return $request->favourite_id;
    //  return auth()->id();
    //  return $request->favourite_id;
        FavouriteSeller::where(['user_id'=> auth()->id(), 'seller_id'=> $request->favourite_id])->delete();
        // FavouriteProduct::where($request->favourite_id);
        return $this->success(null,trans('lang.deleted'));
    }
}
