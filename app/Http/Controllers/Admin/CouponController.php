<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Coupon\StoreRequest;
use App\Http\Requests\Admin\Coupon\UpdateRequest;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::orderByDesc('id')->get();
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        $sellers = \App\Models\Seller::where('active', true)->orderBy('name')->get();
        $products = \App\Models\Product::where('is_available', true)->orderBy('name_en')->get();
        return view('admin.coupons.add', compact('sellers', 'products'));
    }

    public function store(StoreRequest $request)
    {
        $coupon = Coupon::create($request->validated());
        
        $coupon->sellers()->sync($request->seller_ids ?? []);
        $coupon->products()->sync($request->product_ids ?? []);

        return to_route('admin.coupons.index')->with('success', trans('lang.created'));
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        $sellers = \App\Models\Seller::where('active', true)->orderBy('name')->get();
        $products = \App\Models\Product::where('is_available', true)->orderBy('name_en')->get();
        return view('admin.coupons.edit', compact('coupon', 'sellers', 'products'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->update($request->validated());

        $coupon->sellers()->sync($request->seller_ids ?? []);
        $coupon->products()->sync($request->product_ids ?? []);

        return to_route('admin.coupons.index')->with('success', trans('lang.updated'));
    }

    public function destroy($id)
    {
        Coupon::findOrFail($id)->delete();
        return back()->with('success', trans('lang.deleted'));
    }

    public function toggleActive($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->update(['active' => !$coupon->active]);
        return back()->with('success', trans('lang.updated'));
    }
}
