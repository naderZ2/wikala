<?php

namespace App\Http\Requests\Client\Basket;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\ResponsesTrait;
class StoreRequest extends FormRequest
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
            'product_id' => "required",
            'quantity' => "required|integer|min:1",
            'product_variation_id' => "sometimes|nullable|exists:product_variations,id",
            'variation_attribute_ids' => "sometimes|nullable|array",
            'variation_attribute_ids.*' => "integer|exists:product_variation_attributes,id",
            'extraService' => "sometimes|nullable",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null,$validator->errors()->first()));
    }

    public function messages(): array {
        return [
            // 'code.exists'  => 'The code Is Not found.',
            'products.required'  => 'The Products are required',
            'address_id.required'  => 'The address are required',
        ];
    }
}
