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
            'category_id.required' => 'The category field is required.',
            'category_id.exists' => 'The selected category is invalid.',
            'family_name.required' => 'The family name field is required.',
            'family_name.string' => 'The family name must be a valid string.',
            'family_name.max' => 'The family name may not be greater than 255 characters.',
            'area_id.required' => 'The area field is required.',
            'area_id.exists' => 'The selected area is invalid.',
            'date.required' => 'The date field is required.',
            'date.date' => 'The date field must be a valid date.',
            'date.after_or_equal' => 'The date must be today or later.',
            'time.required' => 'The time field is required.',
            'time.date_format' => 'The time must be in the format HH:MM.',
            'description.string' => 'The description must be a valid string.',
            'type.required' => 'You must specify whether it is a file or text.',
            'type.in' => 'The file_or_text field must be either "file" or "text".',
            'content.string' => 'The content must be a valid string.',
            'content.max' => 'The content may not be greater than 255 characters.',
        ];
    }
}
