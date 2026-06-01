<?php

namespace App\Http\Requests\Client\events;
use App\Traits\ResponsesTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditEventRequest extends FormRequest
{
    use ResponsesTrait;
   /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    protected $stopOnFirstFailure = true;


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:daliy_events,id',
            'event_category_id' => 'sometimes|nullable',
            'city_id' => 'sometimes|nullable',
            'type' => 'required|in:male,female,both',  
            'date' => 'required',
            'time' => 'required',
            'family_name' => "sometimes|nullable",
            'image' => 'sometimes|nullable|max:1024',
            'description_ar' => 'required',
            'description_en' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'longitude' => 'required_if:type,male,both|nullable',
            'latitude' => 'required_if:type,male,both|nullable',
            'address' => 'required_if:type,male,both|nullable',
            'phone' => 'required_if:type,male,both|nullable',
            'whatsApp_number' => 'required_if:type,male,both|nullable',
            "f_longitude" => 'required_if:type,female,both|nullable',
            "f_latitude" => 'required_if:type,female,both|nullable',
            "f_address" => 'required_if:type,female,both|nullable',
            "f_whatsApp_number" => 'required_if:type,female,both|nullable',
            "f_phone" => 'required_if:type,female,both|nullable',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null,$validator->errors()->first()));    
    }

   public function messages(): array {
    return [
        // General field messages
        'event_category_id.required' => __('lang.event_category_required'),
        'city_id.required' => __('lang.city_required'),
        'type.required' => __('lang.event_type_required'),
        'type.in' => __('lang.event_type_invalid'),
        'date.required' => __('lang.event_date_required'),
        'time.required' => __('lang.event_time_required'),
        'image.required' => __('lang.event_image_required'),
        'image.max' => __('lang.image_max_1mb'),
        'family_name.required' => __('lang.event_family_name_required'),
        'description_ar.required' => __('lang.description_ar_required'),
        'description_en.required' => __('lang.description_en_required'),
        'name_ar.required' => __('lang.name_ar_required'),
        'name_en.required' => __('lang.name_en_required'),

        // Male or both type validations
        'longitude.required_if' => __('lang.longitude_required_male_both'),
        'latitude.required_if' => __('lang.latitude_required_male_both'),
        'address.required_if' => __('lang.address_required_male_both'),
        'phone.required_if' => __('lang.phone_required_male_both'),
        'whatsApp_number.required_if' => __('lang.whatsapp_required_male_both'),

        // Female or both type validations
        'f_longitude.required_if' => __('lang.female_longitude_required'),
        'f_latitude.required_if' => __('lang.female_latitude_required'),
        'f_address.required_if' => __('lang.female_address_required'),
        'f_phone.required_if' => __('lang.female_phone_required'),
        'f_whatsApp_number.required_if' => __('lang.female_whatsapp_required'),
    ];
}

}
