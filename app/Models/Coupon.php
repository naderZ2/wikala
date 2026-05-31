<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_type',
        'value',
        'min_order_amount',
        'max_order_amount',
        'max_discount_amount',
        'usage_limit',
        'usage_limit_per_user',
        'used_count',
        'starts_at',
        'expires_at',
        'active',
    ];

    protected $casts = [
        'starts_at'           => 'datetime',
        'expires_at'          => 'datetime',
        'active'              => 'boolean',
        'value'               => 'decimal:2',
        'min_order_amount'    => 'decimal:2',
        'max_order_amount'    => 'decimal:2',
        'max_discount_amount' => 'decimal:2',
    ];

    public function usages()
    {
        return $this->hasMany(CouponUsage::class);
    }

    public function sellers()
    {
        return $this->belongsToMany(Seller::class, 'coupon_seller');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'coupon_product');
    }

    public function getEligibleSubtotal($userId, $fallbackSubtotal = null)
    {
        $hasSellers = $this->sellers()->exists();
        $hasProducts = $this->products()->exists();

        if (!$hasSellers && !$hasProducts) {
            return $fallbackSubtotal !== null ? (float) $fallbackSubtotal : 0.0;
        }

        $basketOrders = Order::where(['user_id' => $userId, 'type' => 'basket'])->get();
        if ($basketOrders->isEmpty()) {
            return 0.0;
        }

        $eligibleTotal = 0.0;
        $allowedSellerIds = $hasSellers ? $this->sellers()->pluck('sellers.id')->toArray() : [];
        $allowedProductIds = $hasProducts ? $this->products()->pluck('products.id')->toArray() : [];

        foreach ($basketOrders as $order) {
            if ($hasSellers && !in_array($order->seller_id, $allowedSellerIds)) {
                continue;
            }

            foreach ($order->orderDetails as $detail) {
                if ($hasProducts && !in_array($detail->product_id, $allowedProductIds)) {
                    continue;
                }

                $itemPrice = (float) $detail->price;
                $extraServicePrice = (float) OrderDetailsExtraServices::where('order_details_id', $detail->id)->sum('price');
                $eligibleTotal += ($itemPrice + $extraServicePrice);
            }
        }

        return $eligibleTotal;
    }

    public function userUsageCount($userId)
    {
        return $this->usages()->where('user_id', $userId)->count();
    }

    public function calculateDiscount($subtotal)
    {
        $subtotal = (float) $subtotal;

        if ($this->discount_type === 'percentage') {
            $discount = $subtotal * ((float) $this->value / 100);
        } else {
            $discount = (float) $this->value;
        }

        if ($this->max_discount_amount !== null) {
            $discount = min($discount, (float) $this->max_discount_amount);
        }

        return min($discount, $subtotal);
    }

    public function validateFor($userId, $subtotal)
    {
        if (!$this->active) {
            return [false, trans('lang.code_not_found')];
        }

        $now = now();
        if ($this->starts_at && $now->lt($this->starts_at)) {
            return [false, trans('lang.code_not_found')];
        }
        if ($this->expires_at && $now->gt($this->expires_at)) {
            return [false, trans('lang.code_expired')];
        }

        if ($this->usage_limit !== null && $this->used_count >= $this->usage_limit) {
            return [false, trans('lang.usage_limit')];
        }

        if ($this->usage_limit_per_user !== null) {
            $userCount = $this->userUsageCount($userId);
            if ($userCount >= $this->usage_limit_per_user) {
                return [false, trans('lang.usage_limit')];
            }
        }

        if ($this->min_order_amount !== null && (float) $subtotal < (float) $this->min_order_amount) {
            return [false, trans('lang.coupon_min_amount_not_met')];
        }
        if ($this->max_order_amount !== null && (float) $subtotal > (float) $this->max_order_amount) {
            return [false, trans('lang.coupon_max_amount_exceeded')];
        }

        return [true, null];
    }
}
