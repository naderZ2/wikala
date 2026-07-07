<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Models\Seller;

class CheckSellerPlanPayment
{
    use ResponsesTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $seller = $request->user();

        if ($seller) {
            // Get the main seller (or parent seller if the current user is an employee)
            $mainSeller = $seller->parent_id ? $seller->parent : $seller;

            if (!$mainSeller || $mainSeller->payment_status !== 'paid' || ($mainSeller->plan_ends_at && $mainSeller->plan_ends_at < now())) {
                return $this->failed([
                    'payment_pending' => true,
                    'expired' => $mainSeller->plan_ends_at && $mainSeller->plan_ends_at < now(),
                    'seller_id' => $seller->id
                ], 'Payment pending or subscription expired. Please select a plan and renew.');
            }
        }

        return $next($request);
    }
}
