<?php

namespace App\Http\Controllers\Client;

use App\Models\{Discount,UserDiscounts};
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Discount\CheckRequest;

class DiscountController extends Controller
{
    use ResponsesTrait;
    public function checkAvailabilty(CheckRequest $request){
        $discount=Discount::whereCode($request->code)->first();
        if(!$discount){
            return $this->failed(null,trans('lang.code_not_found'));
        }

        if($discount->end_date < now() || $discount->active == 0 || $discount->used_coupons >= $discount->coupons_number){
            return $this->failed(null,trans('lang.code_expired'));
        }

        $userDiscounts=UserDiscounts::where(["user_id" => auth()->id(),"discount_id" => $discount->id])->count();
        if($userDiscounts >= $discount->coupons_user_number){
            return $this->failed(null,trans('lang.usage_limit'));
        }
        $price=$request->price-($request->price * ($discount->value/100));
        return $this->success($price);
    }
}
