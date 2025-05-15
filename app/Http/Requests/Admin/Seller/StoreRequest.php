<?php

namespace App\Http\Requests\Admin\Seller;

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
            'email' => 'required|unique:sellers,email',
            'password' => 'required',
            'categories' => 'required',
            'cities' => 'required',
            'img_path' => 'required|max:1024',
        ];
    }

    public function messages(): array {
        return [
            'email.unique'  => 'The email Is found.',
            'img_path.max'  => 'The image size must not exceed 1MB.',
        ];
    }
}
