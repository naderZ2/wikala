<?php

namespace App\Http\Requests\Admin\Seller;

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
            'name' => 'required|max:255',
            'email' => 'required|unique:sellers,email, '.$this->id,
            'password' => 'sometimes|nullable',
            'categories' => 'required',
            'cities' => 'required',
            'img_path' => 'sometimes|nullable|max:1024',
        ];
    }

    public function messages(): array {
        return [
            'email.unique'  => 'The email Is found.',
            'img_path.max'  => 'The image size must not exceed 1MB.',
        ];
    }
}
