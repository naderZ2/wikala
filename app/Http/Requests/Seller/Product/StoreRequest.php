<?php

namespace App\Http\Requests\Seller\Product;

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
            'name_ar' => "required",
            'name_en' => "required",
            'title_ar' => "required",
            'title_en' => "required",
            'description_ar' => "required",
            'description_en' => "required",
            'serving' => "sometimes|nullable|numeric",
            'price' => "required|numeric",
            'old_price' => "required|numeric",
            'category_id' => "required",
            'images' => "required|max:1024",
            'main_image' => "required|max:1024",
            // 'picture' => "required",
        ];
    }
    
        public function messages(): array {
        return [
            // 'code.exists'  => 'The code Is Not found.',
            'name_ar.required'  => 'The name_ar are required',
            'name_en.required'  => 'The name_en are required',
            'description_ar.required'  => 'The description_ar are required',
            'products.required'  => 'The Products are required',
            'description_en.required'  => 'The description_en are required',
            'images.max' => 'The image size must not exceed 1MB.',
            'main_image.max' => 'The image size must not exceed 1MB.',
        ];
    }
}
