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
     */
    public function rules()
    {
        return [
            'category_id'    => 'required|exists:categories,id',
            // 'user_id'        => 'required|exists:users,id',
            'type_id'        => 'required|exists:ads_type,id',
            // 'rejected_id'    => 'nullable|exists:rejected_reasons,id',
            // 'ad_number'      => 'required|unique:ads,ad_number',
            'title'          => 'required|string|max:255',
            'description'    => 'required|string',
            'contact_method' => 'required|string',
            'negotiable'     => 'required|boolean',
            // 'status'         => 'required|in:active,inactive',
            'start_date'     => 'required|date',
            'end_date'       => 'required|date|after:start_date',

            'main_image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  
            // 'images'         => 'nullable|array', 
            // 'images.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        
            // 'images'         => 'nullable|array', 
            // 'images.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        
    
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
        ];
    }

}
