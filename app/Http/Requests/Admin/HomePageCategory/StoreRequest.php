<?php

namespace App\Http\Requests\Admin\HomePageCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'sort_order' => 'required|integer',
        ];
    }

    public function messages(): array {
        return [
            'category_id.required' => __('lang.category_id_required'),
            'category_id.exists' => __('lang.category_id_exists'),
            'name_ar.required' => __('lang.name_ar_required'),
            'name_ar.string' => __('lang.name_ar_string'),
            'name_en.required' => __('lang.name_en_required'),
            'name_en.string' => __('lang.name_en_string'),
            'sort_order.required' => __('lang.sort_order_required'),
            'sort_order.integer' => __('lang.sort_order_integer'),
        ];
    }
}
