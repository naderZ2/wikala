<?php

namespace App\Http\Requests\Admin\Ad;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'user_id' => 'required|exists:users,id',
        ];
    }
}