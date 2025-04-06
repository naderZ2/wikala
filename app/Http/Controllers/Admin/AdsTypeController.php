<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdsType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdsType\StoreRequest;
use App\Http\Requests\Admin\AdsType\EditRequest;

class AdsTypeController extends Controller
{
    public function index()
    {
        $types = AdsType::all();
        return view('admin.ads_type.index', compact('types'));
    }

    public function store(StoreRequest $request)
    {
        AdsType::create($request->validated());
        return redirect()->route('ads_type.index')->with('success', trans('created'));
    }

    public function edit(AdsType $adsType)
    {
        return view('admin.ads_type.index', compact('adsType'));
    }

    public function update(EditRequest $request)
    {
        $adsType = AdsType::findOrFail($request->id);
        $adsType->update($request->validated());
        return redirect()->route('ads_type.index')->with('success', trans('updated'));
    }

    public function enable($id)
    {
        $adsType = AdsType::findOrFail($id);
        $adsType->enable = !$adsType->enable;
        $adsType->save();

        return redirect()->route('ads_type.index')->with('success', trans('updated'));
    }
}
