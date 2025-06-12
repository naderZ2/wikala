<?php

namespace App\Http\Requests\Client\Ad;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\ResponsesTrait;

class StoreRequest extends FormRequest
{
    use ResponsesTrait;
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
     * @return array
     *
     */

    public function rules()
    {
        return [
            'category_id'    => 'required|exists:categories,id',

            'type_id'        => 'required|exists:ads_type,id',

            'title'          => 'required|string|max:255',
            'description'    => 'required|string',
            'contact_method' => 'required|string',
            'negotiable'     => 'required|boolean',

            'start_date'     => 'required|date',
            'end_date'       => 'required|date|after:start_date',
            'city_id'        => 'required|exists:cities,id',
            'region_id'      => 'required|exists:cities,id',
            'main_image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',

            'images'         => 'nullable|array',
            'images.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',

            'attributes' => 'nullable|array',
            'attributes.*.id' => 'required|exists:attributes,id',
            'attributes.*.value' => 'required|string',

            'price' => 'nullable|numeric|min:0',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     */

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null, $validator->errors()->first()));
    }


    /**
    * Custom validation messages.
    *
    * @return array
    */
    public function messages(): array
    {
        return [
            'category_id.required'   => __('lang.category_required'),
            'category_id.exists'     => __('lang.category_not_found'),
            'type_id.required'       => __('lang.type_required'),
            'type_id.exists'         => __('lang.type_not_found'),

            'city_id.required'       => __('lang.city_required'),
            'city_id.exists'         => __('lang.city_not_found'),

            'region_id.required'     => __('lang.region_required'),
            'region_id.exists'       => __('lang.region_not_found'),

            'title.required'         => __('lang.title_required'),
            'description.required'   => __('lang.description_required'),
            'contact_method.required'=> __('lang.contact_method_required'),
            'negotiable.required'    => __('lang.negotiable_required'),
            'start_date.required'    => __('lang.start_date_required'),
            'end_date.required'      => __('lang.end_date_required'),
            'end_date.after'         => __('lang.end_date_after_start'),
            'main_image.image'       => __('lang.main_image_invalid'),
            'main_image.mimes'       => __('lang.main_image_mimes'),
            'main_image.max'         => __('lang.main_image_max'),

            'attributes.exists'         => __('lang.attribute_not_found'),
            'attributes.*.id.required'  => __('lang.attribute_id_required'),
            'attributes.*.id.exists'    => __('lang.attribute_not_found'),
            'attributes.*.value.required' => __('lang.attribute_value_required'),
            
            'price.numeric' => __('lang.price_must_be_number'),
            'price.min'     => __('lang.price_must_be_positive')
        ];
    }

}
