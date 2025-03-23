<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Models\{City,UserAdress};
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\City\EditRequest;
use App\Http\Requests\Admin\City\StoreRequest;

class CityController extends Controller
{
    public function index(){
        $this->lang();
        $cities = City::whereNull('parent_id')->get(['id','parent_id','name_ar','name_en']);
        // dd($cities->);
        return view('admin.city.index',compact('cities'));
    }


    public function get_city(Request $request)
    {

        // Log::info($request);
        $areas = City::where('parent_id', $request->region_id)->get();
        // Log::info($areas);
        // $sub_categories = Category::where('status', 1)->whereIn('parent_id', $subcategory_ids)->orderBy('id', 'desc')->select('id', 'name_' . $this->lang() . ' as name')->get();
        return response()->json($areas);
    }



    public function create(){
        $this->lang();
        $cities=City::whereNull('parent_id')->get(['id',$this->name]);
        return view('admin.city.add',compact('cities'));  
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
