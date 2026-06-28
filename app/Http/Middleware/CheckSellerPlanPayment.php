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

            if (!$mainSeller || $mainSeller->payment_status !== 'paid') {
                return $this->failed([
                    'payment_pending' => true,
                    'seller_id' => $seller->id
                ], 'Payment pending. Please select a plan and pay to complete registration.');
            }
        }

        return $next($request);
    }
}
