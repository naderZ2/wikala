<?php

namespace App\Http\Controllers\Client;

use App\Models\Banner;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Models\HomePageCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    use ResponsesTrait;


    public function index(Request $request)
    {
        $this->lang();
        $result['categories'] = [];
        // $result['banners'] = [];
        $now = now();
        $activeSliderCallback = function($query) use ($now) {
            $query->whereNull('seller_id')
                  ->orWhere(function($q) use ($now) {
                      $q->where('is_paid', 1)
                        ->whereNotNull('start_date')
                        ->whereNotNull('end_date')
                        ->where('start_date', '<=', $now)
                        ->where('end_date', '>=', $now);
                  });
        };

        $result['sliders'] = [];
        if ($request->category_id) {
            $result['sliders'] = Slider::where($activeSliderCallback)->get();
            // $result['banners'] = Banner::whereCategoryId($request->category_id)->get();
        } else {
            $result['sliders'] = Slider::where($activeSliderCallback)->get();
            // $result['banners'] = Banner::whereNull('category_id')->get();
        }
        $result['categories'] = Category::select('id',  $this->name,'image' )->with('products')->get();

        $result['top_sellers'] = \App\Models\Seller::where('active', 1)
            ->withCount(['orders' => function ($query) {
                $query->where('status', 'delivered');
            }])
            ->withAvg('reviews', 'rating')
            ->orderByDesc('orders_count')
            ->with(['products' => function($q){
                $q->where('is_available', 1)->latest()
                  ->with(["category:id,$this->name", "attributes.attribute"])
                  ->select('id','seller_id', $this->name, $this->description, $this->title, 'price', 'old_price', 'main_image', 'serving', 'category_id');
            }])
            ->take(10)
            ->get()
            ->map(function($seller){
                $seller->rate = round($seller->reviews_avg_rating ?? 0, 1); 
                $seller->image = $seller->img_path; 
                $seller->description = $seller->about ?? $seller->details;
                return $seller;
            });

        $result['best_sellers'] = \App\Models\Product::where('is_available', 1)
            ->withSum(['orderDetails' => function ($query) {
                $query->whereHas('order', function ($q) {
                    $q->where('status', 'delivered');
                });
            }], 'quantity')
            // ->orderByDesc('order_details_sum_quantity')
            ->with(['seller' => function($q) {
                $q->withAvg('reviews', 'rating');
            }]) 
            ->select('id','seller_id', $this->name, $this->description, $this->title, 'price', 'old_price', 'main_image', 'serving', 'category_id', 'seller_id')
            ->take(10)
            ->get()
             ->map(function($product){
                $product->rate = round($product->seller->reviews_avg_rating ?? 0, 1);
                return $product;
            });


        $result['HomePageCategories'] = HomePageCategory::orderBy('sort_order')
        ->with('category.products')
        ->select('id','category_id',  $this->name )->get()
        ->map(function($data){
            $data->setRelation('products', $data->category->products ?? []);
            $data->image = $data->category->image ?? null;
            $data->unsetRelation('category');
            return $data;
        });
        return $this->success($result);
    }
}
