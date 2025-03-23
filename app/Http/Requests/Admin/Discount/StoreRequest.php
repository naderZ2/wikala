<?php

namespace App\Http\Requests\Admin\Discount;

use App\Rules\IsValidValue;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
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
            'code'=>'required|unique:discounts,code',
            'coupons_user_number' => 'required|numeric',
            'coupons_number'=>'required|numeric|min:'.$this->coupons_user_number,
            'type' => 'required',
            'value' =>['required',new IsValidValue($this->type)],
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'sellers' => 'required'
        ];
    }

    public function messages(): array {
        return 
        [
            'coupons_number.min'  => 'Total Coupons must be bigger than user coupons ',
            'end_date.after'  => 'End Date must be after Start Date',
            'code.unique' => "Code already exists"
        ];
    }
}
