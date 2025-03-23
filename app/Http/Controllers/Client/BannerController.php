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
        if($request->category_id){
            $result['banners']= Banner::whereCategoryId($request->category_id)->get();
        }
        else{
            $result['slider']= Slider::get();
            $result['banners']= Banner::whereNull('category_id')->get();
        }
        return $this->success($result);
    }
}
