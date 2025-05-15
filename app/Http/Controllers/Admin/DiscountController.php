<?php

namespace App\Http\Controllers\Admin;

use App\Models\Discount;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Discount\StoreRequest;
use App\Models\Seller;

class DiscountController extends Controller
{
    public  function index(){
        
        $discounts=Discount::orderByDESC('id')->with('sellers')->get();
        return view('admin.discount.index',compact('discounts'));
    }

    public function create(){
        $sellers=Seller::select('name','id')->where('active','=',1)->get();
        // dd($discounts);
        return view('admin.discount.add',compact('sellers'));
    }

    public function store(StoreRequest $request){
        $data=$request->validated();
        $descount=Discount::create($data);
        $descount->sellers()->sync($request->sellers);
        return  to_route('discounts.index')->with('success',trans('lang.created'));
    }

    public function changeActive($id){
        $discount=Discount::find($id);
        $active=!$discount->active;
        $discount->update(['active' => $active]);
        return back()->with('success',trans('lang.updated'));
    }
}
