<?php

namespace App\Http\Controllers\Client;

use App\Models\{City,UserAdress,Country};
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\City\{CheckRequest,StoreRequest,EditRequest};
use Illuminate\Http\Request;

class CityController extends Controller
{
    use ResponsesTrait;

    public function countries() {
        $this->lang();
        $nameField = (app()->getLocale() == "en" || request()->header('Lang') == "en") ? "name_en as name" : "name as name";
        $currencyField = (app()->getLocale() == "en" || request()->header('Lang') == "en") ? "currency_en as currency" : "currency as currency";
        
        $countries = Country::where('active', '1')
            ->select('id', $nameField, $currencyField, 'country_code', 'flag')
            ->get();
        return $this->success($countries);
    }

    public function cities(Request $request){
        $this->lang();
        $query = City::whereNull('parent_id');
        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }
        $cities = $query->select('id',$this->name)->get();
        return $this->success($cities);
    }

    public function regions(CheckRequest $request){
        $this->lang();
        $cities = City::where('parent_id',$request->id)->select('id',$this->name)->get();
        return $this->success($cities);
    }

    public function addClientRegion(StoreRequest $request){
        if(count( auth()->user()->address)==0){
            auth()->user()->update([
                'region_id' => $request->id,
                'country_id' => $request->country_id
            ]);
        }
        
        $data=$request->validated();
        $data['region_id'] = $request->id;
        // unset($data['id']);
        $address = auth()->user()->address()->create($data);
        return $this->success($address,trans('lang.created'));
    }

    public function editClientRegion(EditRequest $request){
        $data=$request->validated();
        $address = auth()->user()->address()->whereId( $request->id)->update($data);
        return $this->success($address,trans('lang.updated'));
    }

    public function deleteClientRegion(CheckRequest $request){
        UserAdress::destroy($request->id);
        return $this->success(null,trans('lang.deleted'));
    }

    public function updateMainAddress(CheckRequest $request){
        $region_id = UserAdress::find($request->id);
        $address = auth()->user()->update(['region_id' => $region_id]);
        return $this->success($address,trans('lang.updated'));
    }
}
