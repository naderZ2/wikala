<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Attribute\EditRequest;
use App\Http\Requests\Admin\Attribute\StoreRequest;

class AttributeController extends Controller
{

    use FileUploadTrait;

    
    public function index(){
        $this->lang();
        $attributes = Attribute::
        select('id',$this->name,'image','enable','type')
        ->orderBy('created_at','desc')
        ->get();

        return view('admin.attributes.index',compact('attributes'));
    }


    public function create(){
        return view('admin.attributes.add');
    }

    public function Store(StoreRequest $request){
        $file = $request->file('image');
        $data = $request->validated();
        if($request->image){
            $data['image'] = $this->uploadFile($file, 'attributes');
        }
        $attribute = Attribute::create( $data );
        return  to_route('attributes.index')->with('success',trans('lang.created'));
    }

    public function edit($id){
        $attribute = Attribute::find($id);
        return view('admin.attributes.edit', compact('attribute'));
    }

    public function update(EditRequest $request){
        
        $attribute=Attribute::find($request->id);
        $data = $request->validated();
        if($request->image){
            $data['image'] = $this->uploadFile($request->image, 'attributes', $attribute->image);
        }
        $attribute->update($data);
        return  to_route('attributes.index')->with('success',trans('lang.updated'));
    }

    public function destroy(Request $request){
        $attribute = Attribute::find($request->id);
        $attribute->delete();
        return to_route('attributes.index')->with('success');
    }

    public function enable($id){
        $attribute = Attribute::find($id);
        Log::info($attribute->enable);
        $attribute->update(['enable' => $attribute->enable ? 0 : 1]);
        Log::info($attribute->enable);

        return to_route('attributes.index')->with('success');
    }

}
