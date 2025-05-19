<?php

namespace App\Http\Requests\Admin\EventCategory;

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
            'name_ar' => 'required',
            'name_en' => 'required',
            'image' => 'required|max:1024',
            'order' => 'required',
            // 'type' => 'required'
        ];
    }


    public function messages(): array {
        return [
            'image.max'  => 'The image size must not exceed 1MB.',
        ];
    }
}
