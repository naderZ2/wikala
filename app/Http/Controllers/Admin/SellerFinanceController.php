<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerFinanceController extends Controller
{
    public function index()
    {
        $this->lang();

        $sellers = Seller::whereNull('parent_id')
            ->with('categories')
            ->get()
            ->map(function ($seller) {
                $deliveredOrders = Order::where('seller_id', $seller->id)
                    ->where('status', 'delivered');

                $totalOrders = $deliveredOrders->count();
                $totalRevenue = $deliveredOrders->sum('total_price');
                $commissionAmount = $seller->calculateCommission($totalRevenue);
                $netEarnings = $totalRevenue - $commissionAmount;

                $seller->total_orders = $totalOrders;
                $seller->total_revenue = $totalRevenue;
                $seller->commission_amount = $commissionAmount;
                $seller->net_earnings = $netEarnings;

                return $seller;
            });

        // Totals
        $grandTotalRevenue = $sellers->sum('total_revenue');
        $grandTotalCommission = $sellers->sum('commission_amount');
        $grandTotalEarnings = $sellers->sum('net_earnings');

        return view('admin.seller.finance', compact(
            'sellers',
            'grandTotalRevenue',
            'grandTotalCommission',
            'grandTotalEarnings'
        ));
    }

    public function updateCommission(Request $request, $id)
    {
        $request->validate([
            'commission_type' => 'required|in:percentage,fixed',
            'commission_value' => 'required|numeric|min:0',
        ]);

        $seller = Seller::findOrFail($id);
        $seller->update([
            'commission_type' => $request->commission_type,
            'commission_value' => $request->commission_value,
        ]);

        return to_route('admin.seller.finance')->with('success', trans('lang.updated'));
    }
}
