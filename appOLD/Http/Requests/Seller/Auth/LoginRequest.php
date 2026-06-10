<?php

namespace App\Http\Requests\Seller\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|exists:sellers,email',
            'login.password' => 'required'
        ];
    }

    public function messages(): array {
        return [
            'email.exists'  => 'The email Is Not found.',
        ];
    }
}
