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
        ->with([
            'category' => function($q) { $q->select('id', $this->name); },
            'attributes' => function($q) { $q->select('id', 'product_id', 'value'); },
            'seller'
        ])
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
        
        if ($request->has('min_price')) {
            $products->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $products->where('price', '<=', $request->max_price);
        }
        
        if ($request->has('city_id') || $request->has('region_id')) {
            $products->whereHas('seller.cities', function ($query) use ($request) {
                if ($request->has('city_id')) {
                    $query->where('cities.id', $request->city_id);
                }
                if ($request->has('region_id')) {
                    $query->where('cities.region_id', $request->region_id); // Assuming region_id is on cities or similar logic
                }
            });
        }
        
        if ($request->has('search')) {
             $products->where(function($q) use ($request){
                $q->where('name_ar', 'like', '%' . $request->search . '%')
                  ->orWhere('name_en', 'like', '%' . $request->search . '%')
                  ->orWhere('description_ar', 'like', '%' . $request->search . '%')
                  ->orWhere('description_en', 'like', '%' . $request->search . '%');
             });
        }

        $products = $products->select('id' ,$this->name ,$this->description,$this->title,'price','old_price','main_image','serving',"category_id")
        ->get();
        return $this->success($products);
    }

    public function details(CheckProductDetailsRequest $request){
        $this->lang();
        $product=Product::whereId($request->id)->with([
            'images' => function($q) { $q->select('id', 'product_id', 'name'); },
            'extraServices',
            'attributes' => function($q) { $q->select('id', 'product_id', 'value'); },
            'variations.attributes.attribute',
            'seller'
        ])
        ->select('id',$this->name ,$this->description ,$this->title,'price','main_image','picture','serving')
        ->first();
        return $this->success($product);
    }

}
