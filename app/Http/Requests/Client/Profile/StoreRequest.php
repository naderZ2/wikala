<?php

namespace App\Http\Requests\Client\Profile;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'password' => 'required|string|min:6|confirmed',
        ];
    }
    


    public function messages(): array
    {
        return [
            'password.required' => trans('validation.password_required'),
            'password.string' => trans('validation.password_string'),
            'password.min' => trans('validation.password_min'),
            'password.confirmed' => trans('validation.password_confirmed'),
        ];
    }
}
