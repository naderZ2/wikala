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
            'main_image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images'         => 'nullable|array',
            'images.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288',

            'attributes'             => 'nullable|array',
            'attributes.*.id'        => 'required|exists:attributes,id',
            'attributes.*.value'     => 'required|string',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
     public function messages(): array
    {
        return [
            'category_id.required' => __('lang.category_id.required'),
            'category_id.exists'   => __('lang.category_id.exists'),
            'user_id.required'     => __('lang.user_id.required'),
            'user_id.exists'       => __('lang.user_id.exists'),
            'type_id.required'     => __('lang.type_id.required'),
            'type_id.exists'       => __('lang.type_id.exists'),
            'title.required'       => __('lang.title.required'),
            'title.max'            => __('lang.title.max'),
            'description.required' => __('lang.description.required'),

            // contact_method
            'contact_method.required' => __('lang.contact_method.required'),
            'contact_method.in'       => __('lang.contact_method.in'),

            'negotiable.boolean'    => __('lang.negotiable.boolean'),
            'status.in'             => __('lang.status.in'),

            'start_date.required'   => __('lang.start_date.required'),
            'start_date.date'       => __('lang.start_date.date'),
            'end_date.required'     => __('lang.end_date.required'),
            'end_date.date'         => __('lang.end_date.date'),
            'end_date.after'        => __('lang.end_date.after_start'),

            'city_id.required'      => __('lang.city_id.required'),
            'city_id.exists'        => __('lang.city_id.exists'),
            'region_id.required'    => __('lang.region_id.required'),
            'region_id.exists'      => __('lang.region_id.exists'),

            'price.numeric'         => __('lang.price.numeric'),
            'price.min'             => __('lang.price.min'),

            'main_image.image'      => __('lang.main_image.image'),
            'main_image.mimes'      => __('lang.main_image.mimes'),
            'main_image.max'        => __('lang.main_image.max'),

            'images.array'          => __('lang.images.array'),
            'images.*.image'        => __('lang.images.image'),
            'images.*.mimes'        => __('lang.images.mimes'),
            'images.*.max'          => __('lang.images.max'),

            'attributes.array'              => __('lang.attributes.array'),
            'attributes.*.id.required'      => __('lang.attribute_id.required'),
            'attributes.*.id.exists'        => __('lang.attribute_id.exists'),
            'attributes.*.value.required'   => __('lang.attribute_value.required'),

            'rejected_id.required_if' => __('lang.rejected_id.required_if'),
            'rejected_id.exists'      => __('lang.rejected_id.exists'),
        ];
    }
}
