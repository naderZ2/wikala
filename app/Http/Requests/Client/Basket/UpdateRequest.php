<?php

namespace App\Http\Requests\Client\Basket;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\ResponsesTrait;

class UpdateRequest extends FormRequest
{
    use ResponsesTrait;

    public function authorize()
    {
        return true;
    }

    protected $stopOnFirstFailure = true;

    public function rules()
    {
        return [
            'id' => "required|integer|exists:order_details,id",
            'quantity' => "sometimes|nullable|integer|min:1",
            'product_variation_id' => "sometimes|nullable|exists:product_variations,id",
            'variation_attribute_ids' => "sometimes|nullable|array",
            'variation_attribute_ids.*' => "integer|exists:product_variation_attributes,id",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null, $validator->errors()->first()));
    }
}
