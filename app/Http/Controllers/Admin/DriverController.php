<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\{Driver,City};
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Driver\EditRequest;
use App\Http\Requests\Admin\Driver\StoreRequest;

class DriverController extends Controller
{
    public function index(){
        $drivers=Driver::get();
        return view('admin.driver.index',compact('drivers'));
    }

    public function create(){
        $this->lang();
        $cities=City::whereNotNull('parent_id')->get(['id',$this->name]);
        return view('admin.driver.add' , compact('cities'));
    }

    public function store(StoreRequest $request){
        $driver=$request->validated();
        $driver['email']="driver_".$request->email;
        $driver = Driver::create($driver);
        $driver->cities()->sync($request->cities);
        return  to_route('driver.index')->with('success',trans('lang.created')); 
    }

    public function edit($id){
        $this->lang();
        $driver=Driver::find($id);
        $cities=City::whereNotNull('parent_id')->get(['id',$this->name]);
        $sellerCities=$driver->cities->pluck('pivot.city_id');
        return view('admin.driver.edit',compact('driver','sellerCities','cities'));
    }

    public function update(EditRequest $request,$id){
        $driver=Driver::find($id);
        $driver->update($request->validated());
        $driver->cities()->sync($request->cities);
        return  to_route('driver.index')->with('success',trans('lang.updated')); 
    }

    public function changeActivityStatus(Request $request){
        $driver=Driver::find($request->id);
        $driver->active=$driver->active == 0 ?1:0;
        $driver->save();
        return  to_route('driver.index')->with('success',trans('lang.updated')); 
    }
}
