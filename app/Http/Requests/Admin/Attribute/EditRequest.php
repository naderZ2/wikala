<?php

namespace App\Http\Requests\Admin\Attribute;

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
            'id' => 'required',
            'name_ar' => 'required|unique:attributes,name_ar,'.$this->id,
            'name_en' => 'required|unique:attributes,name_en,'.$this->id,
            'image' => 'sometimes|nullable|max:1024',
            'type' => 'required|in:string,number,select',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => __('lang.The_Arabic_name_is_required'),
            'name_ar.unique' => __('lang.The_Arabic_name_must_be_unique'),
            'name_en.required' => __('lang.The_English_name_is_required'),
            'name_en.unique' => __('lang.The_English_name_must_be_unique'),
            'image.max' => __('lang.The_image_size_must_not_exceed_1024_kilobytes'),
            'type.required' => __('lang.The_type_field_is_required'),
            'type.in' => __('lang.The_type_must_be_one_of_the_following_string_number_select'),
        ];
    }
}
