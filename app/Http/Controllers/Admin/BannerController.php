<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\{StoreRequest,EditRequest};
use App\Models\{Banner,Category};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index(){
        $this->lang();
        $banners  =Banner::with("category:id,$this->name")->get();
        return view('admin.banner.index',compact('banners'));
    }
    
    public function create(){
        $this->lang();
        $categories = Category::where('end_point',0)
        ->select('id',$this->name)->get();
        return view('admin.banner.add',compact('categories'));
    }
    
    public function store(StoreRequest $request){
        Banner::create($request->validated());
        return  to_route('banner.index')->with('success',trans('lang.created')); 
    }

    public function update(EditRequest $request){
        $banner=Banner::find($request->id);
        $banner->update($request->validated());
        return  to_route('banner.index')->with('success',trans('lang.updated')); 
    }

    public function destroy(Request $request){
        $banner=Banner::find($request->id);
        $img =public_path($banner->name);
        File::delete($img);
        $banner->delete();
        return  to_route('banner.index')->with('success',trans('lang.deleted')); 
    }
}
