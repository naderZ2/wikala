<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditSettingRequest;

class AboutUsController extends Controller
{
    public function edit(){
        $settings=AboutUs::find(1);
        // Log::info($settings);
        return view('admin.settings.edit',compact('settings'));
    }

    public function update(EditSettingRequest $request){
        Log::info($request->all());
        $data=$request->validated();
        Log::info($data);
        AboutUs::whereId(1)->update($data);
        return back()->with('success',trans('lang.updated'));
    }
}
