<?php

namespace App\Http\Controllers\Seller;

use App\Models\Notification;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use ResponsesTrait;

    public function index(Request $request)
    {
        $this->lang();

        $sellerId = auth('seller-api')->user()->getMainSellerId();

        $notifications = Notification::where(function ($q) use ($sellerId) {
            $q->whereIn('recipient_type', ['all', 'sellers'])
              ->orWhere(function ($sub) use ($sellerId) {
                  $sub->where('recipient_type', 'specific_seller')
                      ->where('seller_id', $sellerId);
              });
        })
        ->select('id', $this->name, $this->description, 'type', 'product_id', 'seller_id', 'region_id', 'updated_at')
        ->orderByDesc('created_at')
        ->limit(50)
        ->get();

        return $this->success($notifications);
    }
}
