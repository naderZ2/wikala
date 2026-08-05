<?php

namespace App\Http\Requests\Seller\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('phone') && $this->filled('country_code')) {
            $this->merge([
                'phone' => app(\App\Services\ArriveWhatsService::class)
                    ->normalizePhoneNumber($this->input('phone'), $this->input('country_code')),
            ]);
        }
    }

    public function rules()
    {
        return [
            'phone' => 'required|exists:sellers,phone',
            'country_code' => ['sometimes', 'nullable', 'string', 'regex:/^\+?[0-9]{1,6}$/'],
            'password' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'phone.exists' => __('lang.phone_not_registered'),
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'result' => $validator->errors(),
            'msg' => __('lang.validation_failed')
        ], 422));
    }
}
