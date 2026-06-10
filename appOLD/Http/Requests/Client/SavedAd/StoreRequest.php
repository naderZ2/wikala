<?php

namespace App\Http\Requests\Client\SavedAd;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ad_id' => 'required|exists:ads,id', 
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
            'ad_id.required' =>  __('lang.not_found'),
            'ad_id.exists'   => __('lang.not_found'),
        ];
    }
}
