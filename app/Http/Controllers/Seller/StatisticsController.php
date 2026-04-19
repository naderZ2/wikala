<?php

namespace App\Http\Controllers\Seller;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ResponsesTrait;

class StatisticsController extends Controller
{
    use ResponsesTrait;

    public function index(Request $request)
    {
        $this->lang();
        $seller = $request->user();

        $productsCount = Product::where('seller_id', $seller->id)->count();
        $ordersCount = Order::where('seller_id', $seller->id)->count();
        $pendingOrdersCount = Order::where('seller_id', $seller->id)
            ->whereIn('status', ['order_placed', 'confirmed'])
            ->count();

        // Revenue & Commission
        $totalRevenue = Order::where('seller_id', $seller->id)
            ->where('status', 'delivered')
            ->sum('total_price');
        $totalCommission = $seller->calculateCommission($totalRevenue);
        $netEarnings = $totalRevenue - $totalCommission;

        $lang = request()->header('Lang', app()->getLocale());
        $shopName = $lang == 'en' ? $seller->shop_name_en : $seller->shop_name_ar;

        return $this->success([
            'products_count' => $productsCount,
            'orders_count' => $ordersCount,
            'pending_orders_count' => $pendingOrdersCount,
            'total_revenue' => round($totalRevenue, 2),
            'commission_type' => $seller->commission_type,
            'commission_value' => $seller->commission_value,
            'commission_label' => $seller->commission_type === 'percentage'
                ? $seller->commission_value . '%'
                : number_format($seller->commission_value, 2) . ' KWD (fixed)',
            'total_commission' => round($totalCommission, 2),
            'net_earnings' => round($netEarnings, 2),
            'seller' => [
                'id' => $seller->id,
                'name' => $seller->name,
                'img_path' => $seller->img_path,
                'shop_name' => $shopName,
                'shop_name_en' => $seller->shop_name_en,
                'shop_name_ar' => $seller->shop_name_ar,
            ]
        ], 'Dashboard data');
    }
}
