<?php

namespace App\Http\Requests\Admin\Product;

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
        return True;
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
            'images' => "required|array",
            'images.*' => "mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt|max:20000",
            'main_image' => "required|max:1024",
            'seller_id' => "required",
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'title_ar' => $this->name_ar,
            'title_en' => $this->name_en,
        ]);
    }

    public function messages(): array {
        return [
            'name_ar.required'  => __('lang.name_ar_required'),
            'name_en.required'  => __('lang.name_en_required'),
            'description_ar.required'  => __('lang.description_required'),
            'products.required'  => __('lang.products_required'),
            'description_en.required'  => __('lang.description_required'),
            'main_image.max'  => __('lang.The_image_size_must_not_exceed_1024_kilobytes'),
            'images.*.max'  => __('lang.images_max_20mb'),
            'images.*.mimes' => __('lang.images_mimes_format'),
        ];
    }
}
