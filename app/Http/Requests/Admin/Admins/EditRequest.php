<?php

namespace App\Http\Requests\Admin\Admins;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name' => "required",
            'email' => "required|unique:admins,email, ".$this->id,
            'password' => "sometimes",
            'role_id' => "required",
            'active' => "required",
        ];
    }

    public function messages(): array {
        return [
            'email.unique'  => 'The email Is found.',
        ];
    }
}
