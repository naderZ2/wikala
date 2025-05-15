<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CheckProductDetailsRequest;
use App\Models\Product;
use App\Models\SellerServicesAvailability;

class ProductController extends Controller
{
    use ResponsesTrait;
    public function index(Request $request){;
       
        #TODO complete
        $this->lang();
        $cond=[];
      
        
        if($request->category_id){
         $cond['category_id']=  $request->category_id; 
        }
        if($request->seller_id){
            
            $cond['seller_id']=$request->seller_id;
        }
         $products = Product::where($cond)
        ->where([['is_available',1]])
        ->with("category:id,$this->name")
        // ->where([['is_available',1],['quantity','>',0]])
      ;
      
      if($request->date){
            $sellerServicesAvailability=SellerServicesAvailability
           ::where('date',$request->date)->where('availability',1)->pluck('product_id');
           if(Count($sellerServicesAvailability)>0){
               $products=$products->whereNotIn('id', $sellerServicesAvailability);
               
           }
        }
        if($request->name){
            $products =$products->where('name_ar', 'LIKE', "%{$request->name}%")
            ->orWhere('name_en', 'LIKE', "%{$request->name}%") ;
        }

        $products = $products->select('id' ,$this->name ,$this->description,$this->title,'price','old_price','main_image','serving',"category_id")
        ->get();
        return $this->success($products);
    }

    public function details(CheckProductDetailsRequest $request){
        $this->lang();
        $product=Product::whereId($request->id)->with(['images:id,product_id,name','extraServices'])
        ->select('id',$this->name ,$this->description ,$this->title,'price','main_image','picture','serving')
        ->first();
        return $this->success($product);
    }

}
