<?php

namespace App\Http\Controllers\Client;

use App\Models\{Slider,Banner};
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    use ResponsesTrait;
    public function index(Request $request){
        $result['slider']= [];
        $result['banners']= [];
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

        if($request->category_id){
            $result['banners']= Banner::whereCategoryId($request->category_id)->get();
        }
        else{
            $result['slider']= Slider::where($activeSliderCallback)->get();
            $result['banners']= Banner::whereNull('category_id')->get();
        }
        return $this->success($result);
    }
}
