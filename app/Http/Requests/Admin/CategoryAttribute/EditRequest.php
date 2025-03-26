<?php

namespace App\Http\Requests\Admin\CategoryAttribute;

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
            'mandatory' => 'required|boolean',
            'category_id' => 'unique:categories_attributes,category_id,' . $this->category_id . ',id,attribute_id,' . $this->attribute_id,
            'attribute_id' => 'unique:categories_attributes,attribute_id,' . $this->id . ',id,category_id,' . $this->category_id,
        ];
    }

    public function messages()
    {
        return [
            'mandatory.required' => __('lang.Mandatory_field_is_required'),
            'mandatory.boolean' => __('lang.Mandatory_field_must_be_boolean'),
            'category_id.unique' => __('lang.The_category_and_attribute_combination_must_be_unique'),
            'attribute_id.unique' => __('lang.The_attribute_and_category_combination_must_be_unique'),
        ];
    }
}
