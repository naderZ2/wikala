<?php

namespace App\Http\Requests\Admin\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code'                 => 'required|string|max:50|unique:coupons,code',
            'discount_type'        => 'required|in:percentage,fixed',
            'value'                => 'required|numeric|min:0',
            'min_order_amount'     => 'nullable|numeric|min:0',
            'max_order_amount'     => 'nullable|numeric|min:0|gte:min_order_amount',
            'max_discount_amount'  => 'nullable|numeric|min:0',
            'usage_limit'          => 'nullable|integer|min:1',
            'usage_limit_per_user' => 'nullable|integer|min:1',
            'starts_at'            => 'nullable|date',
            'expires_at'           => 'nullable|date|after_or_equal:starts_at',
            'active'               => 'sometimes|boolean',
            'seller_ids'           => 'nullable|array',
            'seller_ids.*'         => 'exists:sellers,id',
            'product_ids'          => 'nullable|array',
            'product_ids.*'        => 'exists:products,id',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'active' => $this->has('active') ? (bool) $this->active : true,
        ]);

        if ($this->discount_type === 'percentage' && $this->value > 100) {
            $this->merge(['value' => 100]);
        }
    }
}
