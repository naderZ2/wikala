<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Traits\FileUploadTrait;
use App\Http\Requests\Admin\Banner\{StoreRequest,EditRequest};

class SliderController extends Controller
{
    use FileUploadTrait;

    public function index(){
        $sliders  =Slider::get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function store(StoreRequest $request){
        $data = $request->validated();
        $file = $request->file('name');

        if ($file) {
            $mime = $file->getMimeType();
            $ext  = strtolower($file->getClientOriginalExtension());

            if (str_starts_with($mime, 'video/')) {
                $data['type']  = 'video';
                $data['video'] = $this->uploadFile($file, 'sliders');
                $data['name']  = '';
            } elseif ($ext === 'gif' || $mime === 'image/gif') {
                $data['type'] = 'gif';
                $data['name'] = $this->uploadFile($file, 'sliders');
            } else {
                $data['type'] = 'image';
                $data['name'] = $this->uploadFile($file, 'sliders');
            }
        }

        Slider::create($data);
        return  to_route('slider.index')->with('success',trans('lang.created')); 
    }
    
    public function update(EditRequest $request){
        $slider = Slider::find($request->id);
        $data   = $request->validated();
        $file   = $request->file('name');

        if ($file) {
            $mime = $file->getMimeType();
            $ext  = strtolower($file->getClientOriginalExtension());

            if (str_starts_with($mime, 'video/')) {
                // Delete old files
                if ($slider->name) File::delete(public_path($slider->name));
                if ($slider->video) File::delete(public_path($slider->video));

                $data['type']  = 'video';
                $data['video'] = $this->uploadFile($file, 'sliders');
                $data['name']  = '';
            } elseif ($ext === 'gif' || $mime === 'image/gif') {
                if ($slider->name) File::delete(public_path($slider->name));
                if ($slider->video) File::delete(public_path($slider->video));

                $data['type']  = 'gif';
                $data['name']  = $this->uploadFile($file, 'sliders');
                $data['video'] = null;
            } else {
                if ($slider->name) File::delete(public_path($slider->name));
                if ($slider->video) File::delete(public_path($slider->video));

                $data['type']  = 'image';
                $data['name']  = $this->uploadFile($file, 'sliders');
                $data['video'] = null;
            }
        }

        $slider->update($data);
        return  to_route('slider.index')->with('success',trans('lang.updated')); 
    }

    public function destroy(Request $request){
        $slider=Slider::find($request->id);
        if ($slider->name) {
            File::delete(public_path($slider->name));
        }
        if ($slider->video) {
            File::delete(public_path($slider->video));
        }
        $slider->delete();
        return  to_route('slider.index')->with('success',trans('lang.deleted')); 
    }
}
