<?php

namespace App\Http\Requests\Admin\Category;

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
            'parent_id' => 'sometimes|nullable',
            'name_ar' => 'required',
            'name_en' => 'required',
            'image' => 'required|max:1024',
            'end_point' => 'sometimes|nullable',
            'is_free' => 'sometimes|nullable|boolean',
            'free_ads_limit' => 'sometimes|nullable|integer|min:0',
            // 'order' => 'required'
        ];
    }


    public function messages(): array
    {
        return [
            'image.max'  => 'The image size must not exceed 1MB.',
        ];
    }
}
