<?php

namespace App\Http\Requests\Seller\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $existingSeller = null;

        if ($this->phone) {
            $existingSeller = \App\Models\Seller::where('phone', $this->phone)->first();
        }

        if (!$existingSeller && $this->email) {
            $existingSeller = \App\Models\Seller::where('email', $this->email)->first();
        }

        if ($existingSeller && $existingSeller->payment_status !== 'paid') {
            $existingSeller->categories()->detach();
            $existingSeller->cities()->detach();
            $existingSeller->delete();
        }
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:sellers,phone',
            'password' => 'required|string|min:6',
            'shop_name_en' => 'required|string|max:255',
            'shop_name_ar' => 'required|string|max:255',
            'plan_id' => 'nullable|exists:plans,id',
            'category_id' => 'nullable|exists:categories,id',  // single category (backward compatible)
            'categories' => 'nullable|array|max:3',
            'categories.*' => 'exists:categories,id',
            'logo' => 'nullable|image|max:2048',
            'banner' => 'nullable|image|max:2048',
            'civil_id_image' => 'required|image|max:2048',
            'commercial_license_image' => 'required|image|max:2048',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'result' => $validator->errors(),
            'msg' => 'Validation failed'
        ], 422));
    }
}
