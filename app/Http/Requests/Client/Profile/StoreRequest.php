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
            'password.required' => __('lang.password_required'),
            'password.string' => __('lang.password_string'),
            'password.min' => __('lang.password_min_6'),
            'password.confirmed' => __('lang.password_confirmed'),
        ];
    }
}
