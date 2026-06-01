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
            'order_id.required' => __('lang.order_id_required'),
            'order_id.exists'   => __('lang.order_not_exist'),
            'rating.required'   => __('lang.rating_required'),
            'rating.integer'    => __('lang.rating_must_be_number'),
            'rating.min'        => __('lang.rating_min'),
            'rating.max'        => __('lang.rating_max'),
        ];
    }
}
