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
            // 'terms' => 'sometimes|nullable',
            // 'privacy' => 'sometimes|nullable',
            'instance_id' => 'required',
            'access_token' => 'required',
            'delivery_fee' => 'required|numeric|min:1',
        ];
    }
}
