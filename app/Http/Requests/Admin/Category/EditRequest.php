<?php

namespace App\Http\Requests\Admin\Category;

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
            'id' => 'required',
            'name_ar' => 'sometimes|nullable',
            'name_en' => 'sometimes|nullable',
            'image' => 'sometimes|nullable|max:1024',
            'order' => 'sometimes|nullable'
        ];
    }


    public function messages(): array {
        return [
            'image.max'  => 'The image size must not exceed 1MB.',
        ];
    }
}
