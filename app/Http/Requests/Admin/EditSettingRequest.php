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
            'tiktok' => 'sometimes|nullable|string',
            'phone' => 'sometimes|nullable',
            'email' => 'sometimes|nullable',
            'image_limit' => 'required|numeric|min:1',
            
            'arrive_whats_base_url' => 'required|url|max:255',
            'arrive_whats_token' => 'sometimes|nullable|string|max:4096',
            'arrive_whats_default_country_code' => ['required', 'string', 'regex:/^\+?[0-9]{1,6}$/'],
            'arrive_whats_receipt_phone' => ['sometimes', 'nullable', 'string', 'max:30', 'regex:/^\+?[0-9\s().-]{5,30}$/'],
            'remove_arrive_whats_token' => 'sometimes|boolean',
            'delivery_fee' => 'required|numeric|min:0',
            'banner_price' => 'sometimes|nullable|numeric|min:0',
            'slider_price' => 'required|numeric|min:0',
            'slider_days' => 'required|integer|min:1',
            
            'ads_time_user' => 'sometimes|nullable',
            'ads_time_business' => 'sometimes|nullable',
            
            'free_ads_user' => 'sometimes|nullable',
            'free_ads_business' => 'sometimes|nullable',
        ];
    }
}
