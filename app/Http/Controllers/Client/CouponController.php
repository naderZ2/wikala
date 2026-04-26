<?php

namespace App\Http\Controllers\Client;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    use ResponsesTrait;

    public function check(Request $request)
    {
        $request->validate([
            'code'  => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $coupon = Coupon::where('code', $request->code)->first();
        if (!$coupon) {
            return $this->failed(null, trans('lang.code_not_found'));
        }

        [$valid, $error] = $coupon->validateFor(auth()->id(), $request->price);
        if (!$valid) {
            return $this->failed(null, $error);
        }

        $discount = $coupon->calculateDiscount($request->price);
        $finalPrice = max(0, (float) $request->price - $discount);

        return $this->success([
            'code'            => $coupon->code,
            'discount_type'   => $coupon->discount_type,
            'value'           => (float) $coupon->value,
            'discount_amount' => round($discount, 2),
            'original_price'  => (float) $request->price,
            'final_price'     => round($finalPrice, 2),
        ], trans('lang.coupon_applied'));
    }
}
