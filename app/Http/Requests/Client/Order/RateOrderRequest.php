<?php

namespace App\Http\Requests\Client\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\ResponsesTrait;

class RateOrderRequest extends FormRequest
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
            'order_id' => "required|exists:orders,id",
            'rating'   => "required|integer|min:1|max:5",
            'comment'  => "nullable|string|max:1000",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null,$validator->errors()->first()));
    }

    public function messages(): array {
        return [
            'order_id.required' => 'The Order Id is required',
            'order_id.exists'   => 'The Order does not exist',
            'rating.required'   => 'The rating is required',
            'rating.integer'    => 'The rating must be a number',
            'rating.min'        => 'The rating must be at least 1',
            'rating.max'        => 'The rating must not exceed 5',
        ];
    }
}
