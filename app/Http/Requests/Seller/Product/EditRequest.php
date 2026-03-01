<?php

namespace App\Http\Requests\Seller\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_ar' => "required",
            'name_en' => "required",
            'title_ar' => "sometimes|nullable",
            'title_en' => "sometimes|nullable",
            'description_ar' => "required",
            'description_en' => "required",
            'serving' => "sometimes|nullable|numeric",
            'price' => "required|numeric",
            'old_price' => "sometimes|nullable|numeric",
            'quantity' => "sometimes|nullable|numeric",
            'category_id' => "sometimes|nullable|exists:categories,id",
            'images' => "sometimes|nullable|array",
            'images.*' => "image|max:2048",
            'main_image' => "sometimes|nullable|image|max:2048",
            'deleted_images' => "sometimes|nullable|array",
        ];
    }

    public function messages(): array
    {
        return [
            'name_ar.required' => 'The Arabic name is required',
            'name_en.required' => 'The English name is required',
            'description_ar.required' => 'The Arabic description is required',
            'description_en.required' => 'The English description is required',
            'main_image.max' => 'The main image must not exceed 2MB.',
            'images.*.max' => 'Each image must not exceed 2MB.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'result' => $validator->errors(),
            'msg' => 'Validation failed'
        ], 422));
    }
}
