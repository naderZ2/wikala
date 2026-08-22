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
        if ($this->filled('phone')) {
            $this->merge([
                'phone' => app(\App\Services\ArriveWhatsService::class)
                    ->normalizePhoneNumber($this->input('phone'), $this->input('country_code')),
            ]);
        }

        $existingSeller = null;

        if ($this->phone) {
            $candidates = \App\Models\Seller::phoneCandidates($this->phone, $this->input('country_code'));
            $existingSeller = \App\Models\Seller::whereIn('phone', $candidates)->first();
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
            'phone' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $candidates = \App\Models\Seller::phoneCandidates($value, $this->input('country_code'));
                    if (\App\Models\Seller::whereIn('phone', $candidates)->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'phone']));
                    }
                },
            ],
            'password' => 'required|string|min:6',
            'country_code' => ['sometimes', 'nullable', 'string', 'regex:/^\+?[0-9]{1,6}$/'],
            'shop_name_en' => 'nullable|string|max:255',
            'shop_name_ar' => 'nullable|string|max:255',
            'plan_id' => 'nullable|exists:plans,id',
            'category_id' => 'nullable|exists:categories,id',  // single category (backward compatible)
            'categories' => 'nullable|array|max:3',
            'categories.*' => 'nullable|exists:categories,id',
            'logo' => 'nullable|image|max:2048',
            'banner' => 'nullable|image|max:2048',
            'civil_id_image' => 'nullable|image|max:2048',
            'commercial_license_image' => 'nullable|image|max:2048',
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
