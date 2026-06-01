<?php

namespace App\Http\Requests\Admin\Driver;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|unique:drivers,email',
            'phone' => 'required|unique:drivers,phone',
            'password' => 'required',
            'cities' => "required"
        ];
    }

    public function messages(): array {
        return [
            'email.unique'  => __('lang.email_unique'),
            'phone.unique'  => __('lang.phone_unique'),
        ];
    }
}
