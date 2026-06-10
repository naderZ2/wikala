<?php

namespace App\Http\Requests\Client\City;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\ResponsesTrait;

class EditRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "id" => "required",
            "region_id" => "required",
            "street" => "sometimes|nullable",
            "block_no" => "sometimes|nullable",
            "building_no" => "sometimes|nullable",
            "flat_no" => "sometimes|nullable",
            "floor_no" => "sometimes|nullable",
            "notes" => "sometimes|nullable",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null,$validator->errors()->first()));
    }

    public function messages(): array {
        return [
            'id.required'  => 'The Id  is required',
            'address_id.required'  => 'The address id  is required',
        ];
    }
}
