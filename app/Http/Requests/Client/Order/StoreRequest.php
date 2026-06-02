<?php

namespace App\Http\Requests\Client\Order;

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
            // 'products' => "required",
            'payment_type' => "required",
            'delivery_time' => "sometimes|nullable",
            'address_id' => "required",
            'file' => "sometimes|nullable",
            'coupon_code' => "sometimes|nullable",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null,$validator->errors()->first()));
    }

    public function messages(): array {
        return [
            // 'code.exists'  => 'The code Is Not found.',
            'products.required'  => __('lang.products_required'),
            'address_id.required'  => __('lang.address_required'),
            'delivery_time.required'  => __('lang.delivery_time_required'),
        ];
    }
}
