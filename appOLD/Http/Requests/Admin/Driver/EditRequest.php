<?php

namespace App\Http\Requests\Admin\Driver;

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

    public function rules(){
        return [
            'name' => 'required|max:255',
           // 'email' => 'required|unique:drivers,email, '.$this->id,
            'phone' => 'required|unique:drivers,phone, '.$this->id,
            'password' => 'sometimes|nullable',
            'cities' => "required"
        ];
    }

    public function messages(): array {
        return [
            'email.unique'  => 'The email Is found.',
            'phone.unique'  => 'The Phone Is found.',
        ];
    }
}
