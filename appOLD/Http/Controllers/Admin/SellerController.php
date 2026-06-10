<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Seller,Category,Product,City};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Seller\{StoreRequest,EditRequest};

class SellerController extends Controller
{
    public function index(){
        $this->lang();
        $sellers=Seller::with("categories:id,$this->name")->get();
        return view('admin.seller.index',compact('sellers'));
    }

    public function create(){
        $this->lang();
        // $categories=Category::whereNull('parent_id')->get(['id',$this->name]);
               $categories=Category::whereNotNull('parent_id')
        ->with("parent:id,$this->name")
        ->get(['id',$this->name,'parent_id']);
        $cities=City::whereNotNull('parent_id')->get(['id',$this->name]);
        return view('admin.seller.add',compact('categories','cities'));
    }

    public function store(StoreRequest $request){
        $seller = Seller::create($request->validated());
        $seller->categories()->sync($request->categories);
        $seller->cities()->sync($request->cities);
        return  to_route('seller.index')->with('success',trans('lang.created')); 
    }

    public function edit($id){
        $this->lang();
        $seller=Seller::find($id);
        $categories=Category::whereNotNull('parent_id')
        ->with("parent:id,$this->name")
        ->get(['id',$this->name,'parent_id']);
        $cities=City::whereNotNull('parent_id')->get(['id',$this->name]);
        $sellerCategories=$seller->categories->pluck('pivot.category_id');
        $sellerCities=$seller->cities->pluck('pivot.city_id');
        return view('admin.seller.edit',compact('categories','seller','sellerCategories','cities','sellerCities'));
    }
    
    public function update(EditRequest $request,$id){
        $seller=Seller::find($id);
        $seller->update($request->validated());
        $seller->categories()->sync($request->categories);
        $seller->cities()->sync($request->cities);
        return  to_route('seller.index')->with('success',trans('lang.updated')); 
    }

    public function changeActivityStatus(Request $request){
        $id=$request->id;
        $seller=Seller::find($id);
        $status = $seller->active == 0 ?1:0;
        $seller->active=$status;
        $seller->save();
        Product::whereSellerId($id)->update(['is_available' => $status]);
        return  to_route('seller.index')->with('success',trans('lang.updated')); 
    }
}
