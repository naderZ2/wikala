<?php

namespace App\Http\Requests\Client\SpecialRequest;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\ResponsesTrait;
use Illuminate\Foundation\Http\FormRequest;

class SpecialRequestsRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',       // category_id must exist in the categories table
            'family_name' => 'required|string|max:255',              // family_name must be a string and required
            'area_id' => 'required|exists:cities,id',                // area_id must exist in the cities table
            'budget' => 'nullable|numeric|min:0',                    // budget is optional, but must be a number greater than or equal to 0
            'date' => 'required|date|after_or_equal:today',           // date must be today or later
            'time' => 'required|date_format:H:i',                     // time must follow the H:i format
            'description' => 'nullable|string', 
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null,$validator->errors()->first()));
    }



    public function messages()
    {
        return [
            'category_id.required' => __('lang.category_required'),
            'category_id.exists' => __('lang.category_invalid'),
            'family_name.required' => __('lang.family_name_required'),
            'family_name.string' => __('lang.family_name_string'),
            'family_name.max' => __('lang.family_name_max'),
            'area_id.required' => __('lang.area_required'),
            'area_id.exists' => __('lang.area_invalid'),
            'date.required' => __('lang.date_required'),
            'date.date' => __('lang.date_date'),
            'date.after_or_equal' => __('lang.date_after_or_equal'),
            'time.required' => __('lang.time_required'),
            'time.date_format' => __('lang.time_date_format'),
            'description.string' => __('lang.description_string'),
            'type.required' => __('lang.file_or_text_required'),
            'type.in' => __('lang.file_or_text_in'),
            'content.string' => __('lang.content_string'),
            'content.max' => __('lang.content_max'),
        ];
    }
}
