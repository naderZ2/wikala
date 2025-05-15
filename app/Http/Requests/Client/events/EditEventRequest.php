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
        'event_category_id.required' => 'The event category is required.',
        'city_id.required' => 'The city is required.',
        'type.required' => 'The event type is required.',
        'type.in' => 'The type field must be either male, female, or both.',
        'date.required' => 'The event date is required.',
        'time.required' => 'The event time is required.',
        'image.required' => 'The event image is required.',
        'image.max' => 'The image size must not exceed 1MB.',
        'family_name.required' => 'The event family_name is required.',
        'description_ar.required' => 'The Arabic description is required.',
        'description_en.required' => 'The English description is required.',
        'name_ar.required' => 'The Arabic name is required.',
        'name_en.required' => 'The English name is required.',

        // Male or both type validations
        'longitude.required_if' => 'The longitude is required when the type is male or both.',
        'latitude.required_if' => 'The latitude is required when the type is male or both.',
        'address.required_if' => 'The address is required when the type is male or both.',
        'phone.required_if' => 'The phone number is required when the type is male or both.',
        'whatsApp_number.required_if' => 'The WhatsApp number is required when the type is male or both.',

        // Female or both type validations
        'f_longitude.required_if' => 'The female longitude is required when the type is female or both.',
        'f_latitude.required_if' => 'The female latitude is required when the type is female or both.',
        'f_address.required_if' => 'The female address is required when the type is female or both.',
        'f_phone.required_if' => 'The female phone number is required when the type is female or both.',
        'f_whatsApp_number.required_if' => 'The female WhatsApp number is required when the type is female or both.',
    ];
}

}
