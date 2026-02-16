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
        $result['sliders'] = [];
        if ($request->category_id) {
            $result['sliders'] = Slider::get();
            // $result['banners'] = Banner::whereCategoryId($request->category_id)->get();
        } else {
            $result['sliders'] = Slider::get();
            // $result['banners'] = Banner::whereNull('category_id')->get();
        }
        $result['categories'] = Category::select('id',  $this->name,'image' )->with('products')->get();

        $result['top_sellers'] = \App\Models\Seller::where('active', 1)
            ->withCount(['orders' => function ($query) {
                $query->where('status', 'delivered');
            }])
            ->orderByDesc('orders_count')
            ->take(10)
            ->get()
            ->map(function($seller){
                $seller->rate = 5; // Placeholder rating
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
            ->orderByDesc('order_details_sum_quantity')
            ->with('seller') // Eager load seller for display
            ->take(10)
            ->get()
             ->map(function($product){
                $product->rate = 5; // Placeholder rating
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
