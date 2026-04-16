<?php

namespace App\Http\Requests\Seller\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
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
            'category_id' => "required|exists:categories,id",
            'images' => "nullable|array",
            'images.*' => "mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt|max:20000",
            'main_image' => "required|image|max:2048",
        ];
    }

    public function messages(): array
    {
        return [
            'name_ar.required' => 'The Arabic name is required',
            'name_en.required' => 'The English name is required',
            'description_ar.required' => 'The Arabic description is required',
            'description_en.required' => 'The English description is required',
            'images.*.max' => 'Each image/video must not exceed 20MB.',
            'images.*.mimes' => 'Must be a valid image or video format.',
            'main_image.max' => 'The main image must not exceed 2MB.',
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
