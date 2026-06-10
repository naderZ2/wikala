<?php

namespace App\Http\Requests\Admin\HomePageCategory;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:home_page_category,id',
            'category_id' => 'sometimes|exists:categories,id',
            'name_ar' => 'sometimes|string',
            'name_en' => 'sometimes|string',
            'sort_order' => 'sometimes|integer',
        ];
    }

    public function messages(): array {
        return [
            'id.required' => __('lang.id_required'),
            'id.exists' => __('lang.id_exists'),
            'category_id.exists' => __('lang.category_id_exists'),
            'name_ar.string' => __('lang.name_ar_string'),
            'name_en.string' => __('lang.name_en_string'),
            'sort_order.integer' => __('lang.sort_order_integer'),
        ];
    }
}
