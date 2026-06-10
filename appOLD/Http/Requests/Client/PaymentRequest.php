<?php

namespace App\Http\Requests\Client;

use App\Traits\ResponsesTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PaymentRequest extends FormRequest
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
    protected $stopOnFirstFailure=true;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'payment_method' => 'required',
            'order_id' => 'required',
            'payment_option' => 'required',
            'coupon_code' => 'sometimes|nullable',
        ];

    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null,$validator->errors()->first()));
    }

    public function messages(): array {
        return [
            'payment_method.required'  =>  'payment method required',
            'payment_option.required'  =>  'payment option required',
            'order_id.required'  =>  'order id required',
        ];
    }
}
