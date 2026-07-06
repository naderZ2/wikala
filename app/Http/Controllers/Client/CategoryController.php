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


    public function getSubCategoriesById(Request $request)
    {
        $this->lang();
        $categoryId = $request->input('category_id');

        // Fetch the category and its subcategories
        $category = Category::where('id', $categoryId)
            ->with('subCategories')
            ->select('id', $this->name, 'image', 'end_point')
            ->first();

        if (!$category) {
            return $this->failed(trans('category_not_found'));
        }

        return $this->success($category);
    }


    public function categorySellers(Request $request){
        $sellers = \App\Models\Seller::whereHas('products', function($q) use($request){
            $q->where('category_id', $request->category_id);
        })
        ->where('active', 1)
        ->withAvg('reviews', 'rating')
        ->select('id','name','about','img_path as image')
        ->get()
        ->map(function($seller){
             $seller->rate = round($seller->reviews_avg_rating ?? 0, 1);
            return $seller;
        });
        return $this->success($sellers);
    }

    public function categoryUnderSeller(Request $request)
{
    $this->lang();

    $request->validate([
        'category_id' => ['required', 'integer', 'exists:categories,id'],
    ]);

    // get single category (not a collection)
    $parent = Category::select('id', $this->name, 'image', 'end_point', 'parent_id')
        ->with('subCategories') // optional, but fine to keep if you use it elsewhere
        ->find($request->category_id);

    if (!$parent) {
        return $this->failed(trans('category_not_found'));
    }

    $categories = [];

    // test() expects an iterable, so wrap in array/collection
    $this->test(collect([$parent]), $categories);

    return $this->success($categories[$parent->id] ?? null);
}


    public function favourite_sellers(Request $request){
        $sellers = DB::table('sellers')
        ->get(['id','name','longitude','latitude','details','img_path']);
        return $this->success($sellers);
    }

    public function all_sellers(Request $request){
        $sellers = Seller::all();
        return $this->success($sellers);
    }
    

    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');

        $this->lang();
        // Fetch categories
        $categoriesQuery = Category::whereNull('parent_id')
            ->orderBy('order')
            ->with('subCategories');

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
        $now = now();
        $sliders = Slider::whereNull('seller_id')
            ->orWhere(function($q) use ($now) {
                $q->where('is_paid', 1)
                  ->whereNotNull('start_date')
                  ->whereNotNull('end_date')
                  ->where('start_date', '<=', $now)
                  ->where('end_date', '>=', $now);
            })
            ->get();

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
