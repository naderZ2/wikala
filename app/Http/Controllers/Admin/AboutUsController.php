<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditSettingRequest;
use Illuminate\Support\Arr;

class AboutUsController extends Controller
{
    public function edit(){
        $settings=AboutUs::find(1);
        // Log::info($settings);
        return view('admin.settings.edit',compact('settings'));
    }

    public function update(EditSettingRequest $request){
        $settings = AboutUs::findOrFail(1);
        $data = $request->validated();
        $removeToken = (bool) Arr::pull($data, 'remove_arrive_whats_token', false);
        $newToken = trim((string) Arr::pull($data, 'arrive_whats_token', ''));

        if ($removeToken) {
            $data['arrive_whats_token'] = null;
        } elseif ($newToken !== '') {
            $data['arrive_whats_token'] = $newToken;
        }

        // Saving through the model is required for the encrypted token cast.
        $settings->fill($data)->save();

        return back()->with('success',trans('lang.updated'));
    }
}
