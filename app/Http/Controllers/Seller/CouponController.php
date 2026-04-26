<?php

namespace App\Http\Controllers\Seller;

use App\Models\Coupon;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    use ResponsesTrait;

    public function index()
    {
        $now = now();

        $coupons = Coupon::where('active', true)
            ->where(function ($q) use ($now) {
                $q->whereNull('starts_at')->orWhere('starts_at', '<=', $now);
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('expires_at')->orWhere('expires_at', '>=', $now);
            })
            ->get(['id','code','discount_type','value','min_order_amount','max_order_amount','max_discount_amount','starts_at','expires_at']);

        return $this->success($coupons, 'Active coupons');
    }
}
