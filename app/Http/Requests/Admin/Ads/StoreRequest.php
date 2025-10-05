<?php

namespace App\Http\Requests\Admin\Ads;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'type_id' => 'required|exists:ads_type,id',
            // 'ad_number' => 'required|string|unique:ads,ad_number',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'contact_method' => 'nullable|in:phone,chat,email',
            'negotiable' => 'boolean',
            'status' => 'in:under_review,accepted,rejected',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            // 'rejected_id' => 'nullable|exists:rejected_reason,id',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'category_id.required' => __('lang.category_id.required'),
            'category_id.exists' => __('lang.category_id.exists'),
            'user_id.required' => __('lang.user_id.required'),
            'user_id.exists' => __('lang.user_id.exists'),
            'type_id.required' => __('lang.type_id.required'),
            'type_id.exists' => __('lang.type_id.exists'),
            'ad_number.required' => __('lang.ad_number.required'),
            'ad_number.unique' => __('lang.ad_number.unique'),
            'title.required' => __('lang.title.required'),
            'title.max' => __('lang.title.max'),
            'description.required' => __('lang.description.required'),
            'contact_method.in' => __('lang.contact_method.in'),
            'negotiable.boolean' => __('lang.negotiable.boolean'),
            'status.in' => __('lang.status.in'),
            'start_date.date' => __('lang.start_date.date'),
            'end_date.date' => __('lang.end_date.date'),
            'end_date.after_or_equal' => __('lang.end_date.after_or_equal'),
            'rejected_id.exists' => __('lang.rejected_id.exists'),
        ];
    }
}
