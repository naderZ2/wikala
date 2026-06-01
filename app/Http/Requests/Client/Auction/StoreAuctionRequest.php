<?php

namespace App\Http\Requests\Client\Auction;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuctionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ad_id' => 'required|exists:ads,id',
            'price' => 'required|numeric|min:0.01',
        ];
    }

    public function messages()
    {
        return [
            'ad_id.required' => __('lang.ad_id_required'),
            'ad_id.exists' => __('lang.ad_id_exists'),
            'price.required' => __('lang.price_required'),
            'price.numeric' => __('lang.price_numeric'),
            'price.min' => __('lang.price_min'),
        ];
    }
}
