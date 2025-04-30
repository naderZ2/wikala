<?php

namespace App\Http\Requests\Admin\ReportOption;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title_ar' => 'required|max:255',
            'title_en' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title_ar.required' => __('lang.The_title_ar_is_required'),
            'title_en.required' => __('lang.The_title_en_is_required'),
            'title_ar.max' => __('lang.The_title_ar_must_be_less_than_255_characters'),
            'title_en.max' => __('lang.The_title_en_must_be_less_than_255_characters'),
        ];
    }
}
