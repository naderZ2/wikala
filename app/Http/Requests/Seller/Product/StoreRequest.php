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
            'name_ar.required' => __('lang.name_ar_required'),
            'name_en.required' => __('lang.name_en_required'),
            'description_ar.required' => __('lang.description_ar_required'),
            'description_en.required' => __('lang.description_en_required'),
            'images.*.max' => __('lang.images_max_20mb'),
            'images.*.mimes' => __('lang.images_mimes_format'),
            'main_image.max' => __('lang.main_image_max_2mb'),
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'result' => $validator->errors(),
            'msg' => __('lang.validation_failed')
        ], 422));
    }
}
