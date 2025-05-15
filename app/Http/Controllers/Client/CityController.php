<?php

namespace App\Http\Controllers\Client;

use App\Models\{City,UserAdress};
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\City\{CheckRequest,StoreRequest,EditRequest};

class CityController extends Controller
{
    use ResponsesTrait;
    public function cities(){
        $this->lang();
        $cities = City::whereNull('parent_id')->select('id',$this->name)->get();
        return $this->success($cities);
    }

    public function regions(CheckRequest $request){
        $this->lang();
        $cities = City::where('parent_id',$request->id)->select('id',$this->name)->get();
        return $this->success($cities);
    }

    public function addClientRegion(StoreRequest $request){
        if(count( auth()->user()->address)==0){
            auth()->user()->update(['region_id' => $request->id]);
        }
        
        $data=$request->validated();
        $data['region_id'] = $request->id;
        unset($data['id']);
        auth()->user()->address()->create($data);
        return $this->success(null,trans('lang.created'));
    }

    public function editClientRegion(EditRequest $request){
        $data=$request->validated();
        auth()->user()->address()->whereId( $request->id)->update($data);
        return $this->success(null,trans('lang.updated'));
    }

    public function deleteClientRegion(CheckRequest $request){
        UserAdress::destroy($request->id);
        return $this->success(null,trans('lang.deleted'));
    }

    public function updateMainAddress(CheckRequest $request){
        $region_id = UserAdress::find($request->id);
        auth()->user()->update(['region_id' => $region_id]);
        return $this->success(null,trans('lang.updated'));
    }
}
