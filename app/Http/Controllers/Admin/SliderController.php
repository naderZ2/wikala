<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\Banner\{StoreRequest,EditRequest};

class SliderController extends Controller
{
    public function index(){
        $sliders  =Slider::get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function store(StoreRequest $request){
        Slider::create($request->validated());
        return  to_route('slider.index')->with('success',trans('lang.created')); 
    }
    
    public function update(EditRequest $request){
        $slider=Slider::find($request->id);
        $slider->update($request->validated());
        return  to_route('slider.index')->with('success',trans('lang.updated')); 
    }

    public function destroy(Request $request){
        $slider=Slider::find($request->id);
        // Delete image file
        if ($slider->name) {
            $img = public_path($slider->name);
            File::delete($img);
        }
        // Delete video file
        if ($slider->video) {
            $vid = public_path($slider->video);
            File::delete($vid);
        }
        $slider->delete();
        return  to_route('slider.index')->with('success',trans('lang.deleted')); 
    }
}
