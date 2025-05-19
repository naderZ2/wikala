<?php

namespace App\Http\Controllers\Client;

use App\Models\Banner;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    use ResponsesTrait;


    public function index(Request $request)
    {
        $this->lang();
        $result['categories'] = [];
        $result['banners'] = [];
        $result['sliders'] = [];
        if ($request->category_id) {
            $result['banners'] = Banner::whereCategoryId($request->category_id)->get();
        } else {
            $result['sliders'] = Slider::get();
            $result['banners'] = Banner::whereNull('category_id')->get();
        }
        $result['categories'] = Category::select('id',  $this->name )->get();
        return $this->success($result);
    }
}
