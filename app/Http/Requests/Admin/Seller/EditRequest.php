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
            'categories' => 'required|array|max:3',
            'cities' => 'required',
            'img_path' => 'sometimes|nullable|max:1024',
            'commission_type' => 'sometimes|nullable|in:percentage,fixed',
            'commission_value' => 'sometimes|nullable|numeric|min:0',
        ];
    }

    public function messages(): array {
        return [
            'email.unique'  => __('lang.email_unique'),
            'img_path.max'  => __('lang.The_image_size_must_not_exceed_1024_kilobytes'),
        ];
    }
}
