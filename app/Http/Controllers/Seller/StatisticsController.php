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

        $lang = request()->header('Lang', app()->getLocale());
        $shopName = $lang == 'en' ? $seller->shop_name_en : $seller->shop_name_ar;

        return $this->success([
            'products_count' => $productsCount,
            'orders_count' => $ordersCount,
            'pending_orders_count' => $pendingOrdersCount,
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
