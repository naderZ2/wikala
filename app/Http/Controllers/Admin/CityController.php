<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Models\{City,UserAdress,Country};
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\City\EditRequest;
use App\Http\Requests\Admin\City\StoreRequest;

class CityController extends Controller
{
    public function index(){
        $this->lang();
        $cities = City::whereNull('parent_id')->with('country')->get(['id','parent_id','name_ar','name_en','country_id']);
        $countries = Country::all();
        return view('admin.city.index',compact('cities','countries'));
    }


    public function get_city(Request $request)
    {
        if ($request->filled('country_id')) {
            $cities = City::whereNull('parent_id')->where('country_id', $request->country_id)->get();
            return response()->json($cities);
        }

        $areas = City::where('parent_id', $request->region_id)->get();
        return response()->json($areas);
    }



    public function create(){
        $this->lang();
        $cities=City::whereNull('parent_id')->get(['id',$this->name]);
        $countries = Country::all();
        return view('admin.city.add',compact('cities','countries'));
    }

    public function store(StoreRequest $request){
        City::create($request->validated());
        return  to_route('city.index')->with('success',trans('lang.created'));
    }

    // public function edit(Request $request){

    //     $city=City::find($request->city);
    //     // $city->update($request->validated());
    //     return  view('admin.city.edit',compact('city'));
    // }
    public function update(EditRequest $request){
        $city=City::find($request->id);
        $city->update($request->validated());
        // return  to_route('city.index')->with('success',trans('lang.updated'));
        return  to_route('city.index')->with('success',trans('lang.updated'));
    }

    public function destroy(Request $request){

        $city=UserAdress::where('region_id',$request->id)->first();
        if($city ||DB::table('city_driver')->where('city_id',$request->id)->first() ||DB::table('city_seller')->where('city_id',$request->id)->first()){
            return back()->withErrors(['city' => "لا يمكنك حذف المنطقة لان هناك بيانات  متعلقة بها"]);
        }
        else if(City::where('parent_id',$request->id)->first()){
            return back()->withErrors(['city' => "لا يمكنك حذف المنطقة لان هناك بيانات  متعلقة بها"]);
        }
        City::destroy($request->id);
        return  to_route('city.index')->with('success',trans('lang.deleted'));
    }

}
