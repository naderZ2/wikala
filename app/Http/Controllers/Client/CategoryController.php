<?php

namespace App\Http\Controllers\Client;

use DB;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Models\{Category,User};
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    use ResponsesTrait;
    public function mainCategories(){
        $this->lang();
        $categories = Category::whereNull('parent_id')
        ->select('id',$this->name,'image','end_point')
        ->get();
        return $this->success($categories);
    }

    public function categorySellers(Request $request){        
        $sellers = DB::table('sellers')
        ->join('category_seller','category_seller.seller_id','sellers.id')
        ->where('category_id',$request->category_id)
        ->get(['sellers.id','name']);
        return $this->success($sellers);
    }

    public function categoryUnderSeller(Request $request){     
        $parents=Category::whereId($request->category_id)->get();
        $id=$parents[0]['id'];
        $categories=[];
        $this->test($parents,$categories);
        return $this->success($categories[$id]);
    }
    
    public function favourite_sellers(Request $request){
        $sellers = DB::table('sellers')
        ->get(['id','name','longitude','latitude','details','img_path']);
        return $this->success($sellers);
    }


    public function index(Request $request)
    {
        // Check if 'govId' is sent in the request
        $govId = $request->input('govId');
        $categoryId = $request->input('category_id');

                $this->lang();
        // Fetch categories
        $categoriesQuery = Category::whereNull('parent_id')
        ->orderBy('order')
            ->with(['children.sellers:id,name,longitude,latitude,details,img_path']);
        
    if ($govId) {
    // Filter to include only sellers that are related to the city specified by govId
    $categoriesQuery->whereHas('children.sellers', function ($sellerQuery) use ($govId) {
        $sellerQuery->whereHas('cities', function ($cityQuery) use ($govId) {
            $cityQuery->where('cities.id', $govId); // Filter sellers based on the city relationship
        });
    })->with(['children.sellers' => function ($sellerQuery) use ($govId) {
        $sellerQuery->whereHas('cities', function ($cityQuery) use ($govId) {
            $cityQuery->where('cities.id', $govId); // Ensure only these sellers are included in the response
        });
    }]);
}

         if ($categoryId) {
        // Filter to get only children with id matching category_id
        $categoriesQuery->whereHas('children', function ($query) use ($categoryId) {
            $query->where('id', $categoryId); // Filter children by category_id
        })
        ->with(['children' => function ($query) use ($categoryId) {
            $query->where('id', $categoryId); // Fetch only children with this ID
        }]);
    }
        $parents = $categoriesQuery->select('id', $this->name, 'image', 'end_point')->get();
    
        // Fetch sliders
        $sliders = Slider::get();
    
        // Prepare response
        $result = [
            'categories' => $parents,
            'sliders' => $sliders
        ];
    
        return $this->success($result);
    }

    
    public function test($parents,&$temp){
        $this->lang();
        foreach($parents as $parent){
            if(is_null($parent->parent_id)){
                if($parent->end_point ==0){
                    $parent->subCategories = $parent->subCategories()->where('end_point',1)
                    ->select('id',$this->name,'image','end_point','parent_id')
                    ->get();
                    $temp[$parent->id] = $parent;
                    $this->test($parent->subCategories()->where('end_point',0)->select('id',$this->name,'image','end_point','parent_id')->get(),$temp);
                }else{
                    $parent->subCategories = [];
                    $temp[$parent->id] = $parent;
                }
            }
            else{
                if($parent->end_point == 0)
                {
                    if(array_key_exists($parent->parent_id, $temp)){
                        $temp[$parent->parent_id]['subCategories'][]=$parent;
                        $this->test($parent->subCategories,$temp);
                    }
                    else
                        $this->test($parent->subCategories,$temp);
                }
                else{
                    if(array_key_exists($parent->parent_id, $temp))
                        $temp[$parent->parent_id]['subCategories'][]=$parent;  
                }
            }
        }
    }
}
