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

        $activeBannerCallback = function($query) use ($now) {
            $query->whereNull('seller_id')
                  ->orWhere(function($q) use ($now) {
                      $q->where('is_paid', 1)
                        ->where('start_date', '<=', $now)
                        ->where('end_date', '>=', $now);
                  });
        };

        if($request->category_id){
            $result['banners']= Banner::whereCategoryId($request->category_id)
                ->where('type', 'banner')
                ->where($activeBannerCallback)
                ->get();
        }
        else{
            $sellerSliders = Banner::whereNull('category_id')
                ->where('type', 'slider')
                ->where($activeBannerCallback)
                ->get();

            $result['slider']= Slider::get()->concat($sellerSliders);

            $result['banners']= Banner::whereNull('category_id')
                ->where('type', 'banner')
                ->where($activeBannerCallback)
                ->get();
        }
        return $this->success($result);
    }
}
