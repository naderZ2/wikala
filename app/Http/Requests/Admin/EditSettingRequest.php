<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'sometimes|nullable',
            'whatsapp_number' => 'sometimes|nullable',
            'facebook' => 'sometimes|nullable',
            'insta' => 'sometimes|nullable',
            'phone' => 'sometimes|nullable',
            'email' => 'sometimes|nullable',
            'image_limit' => 'required|numeric|min:1',
            
            'instance_id' => 'required',
            'access_token' => 'required',
            'delivery_fee' => 'required|numeric|min:0',
            'banner_price' => 'sometimes|nullable|numeric|min:0',
            'slider_price' => 'required|numeric|min:0',

            'ads_time_user' => 'sometimes|nullable',
            'ads_time_business' => 'sometimes|nullable',
            
            'free_ads_user' => 'sometimes|nullable',
            'free_ads_business' => 'sometimes|nullable',
        ];
    }
}
