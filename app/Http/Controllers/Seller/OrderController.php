<?php

namespace App\Http\Controllers\Seller;

use App\Services\OrderService;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\ResponsesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Mpdf\Mpdf;

class OrderController extends Controller
{
    use ResponsesTrait;

    /**
     * List orders with status filter
     * GET /seller/orders?status=confirmed
     */
    public function index(Request $request)
    {
        $seller = $request->user();

        $query = Order::where('seller_id', $seller->id)
            ->with('user:id,name,phone');

        // Filter by status
        if ($request->status && $request->status !== 'all') {
            $statusMap = [
                'confirmed' => ['confirmed'],
                'under_processing' => ['order_placed'],
                'out_for_delivery' => ['out_for_delivery', 'shipped'],
                'delivered' => ['delivered'],
                'cancelled' => ['cancel'],
            ];

            $statuses = $statusMap[$request->status] ?? [$request->status];
            $query->whereIn('status', $statuses);
        }

        $orders = $query->orderBy('created_at', 'desc')->get()->map(function ($order) {
            return [
                'id' => $order->id,
                'order_number' => $order->order_number,
                'date' => $order->created_at ? $order->created_at->format('d-m-Y') : null,
                'payment_type' => $order->payment_type,
                'status' => $order->status,
                'user' => $order->user ? [
                    'name' => $order->user->name,
                    'phone' => $order->user->phone,
                ] : null,
            ];
        });

        return $this->success($orders, 'Orders list');
    }

    /**
     * Order details
     * GET /seller/orders/{id}
     */
    public function details(Request $request, $id)
    {
        $order = Order::where('id', $id)
            ->where('seller_id', $request->user()->id)
            ->with([
                'user:id,name,phone,email',
                'orderDetails.product:id,name_en,name_ar,price',
                'orderDetails.variation.attributes',
                'address.region',
            ])
            ->firstOrFail();

        $items = $order->orderDetails->map(function ($detail) {
            $options = '';
            if ($detail->variation && $detail->variation->attributes) {
                $options = $detail->variation->attributes->pluck('value')->implode('/');
            }

            return [
                'name' => $detail->product ? ($detail->product->name_en ?? $detail->product->name_ar) : 'Unknown',
                'qty' => $detail->quantity,
                'options' => $options,
                'price' => $detail->price,
            ];
        });

        return $this->success([
            'order_number' => $order->order_number,
            'customer_name' => $order->user ? $order->user->name : 'Unknown',
            'date' => $order->created_at ? $order->created_at->format('d-m-Y H:i') : null,
            'total_amount' => $order->total_price,
            'payment_type' => $order->payment_type,
            'whatsapp' => $order->user ? $order->user->phone : null,
            'address' => $order->address ? [
                'street' => $order->address->street,
                'block' => $order->address->block_no,
                'building' => $order->address->building_no,
                'floor' => $order->address->floor_no,
                'region' => $order->address->region ? $order->address->region->name_en : null,
            ] : null,
            'items' => $items,
            'status' => $order->status,
            'bill_url' => $order->bill_url,
            'delivery_fee' => $order->delivery_fee,
        ], 'Order details');
    }

    /**
     * Change order status
     * PUT /seller/orders/{id}/status
     */
    public function changeOrderStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:confirmed,shipped,out_for_delivery,delivered,cancel',
        ]);

        $order = Order::where('id', $id)
            ->where('seller_id', $request->user()->id)
            ->firstOrFail();

        $statusTimeMap = [
            'confirmed' => 'confirmed_time',
            'shipped' => 'shipped_time',
            'out_for_delivery' => 'out_for_delivery_time',
            'delivered' => 'actual_delivery_time',
            'cancel' => 'cancel_time',
        ];

        $updateData = ['status' => $request->status];
        if (isset($statusTimeMap[$request->status])) {
            $updateData[$statusTimeMap[$request->status]] = now();
        }

        $order->update($updateData);

        return $this->success([
            'order_id' => $order->id,
            'status' => $order->status,
        ], 'Order status updated');
    }

    /**
     * Generate invoice
     * GET /seller/orders/{id}/invoice
     */
    public function generateInvoice(Request $request, $id)
    {
        $mainLang = App::getLocale();

        $order = Order::where('id', $id)
            ->where('seller_id', $request->user()->id)
            ->with('user:id,name,phone,email', 'orderDetails.product', 'seller:id,email,name', 'address', 'address.region')
            ->firstOrFail();

        if ($order->user && $order->user->lang == 'ar') {
            App::setLocale('ae');
        } else {
            App::setLocale('en');
        }

        $invoice = view('admin.order.invoice', compact('order'))->render();

        $pdf = new Mpdf([
            'default_font' => 'dejavusans',
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'default_font_size' => 12,
        ]);

        $pdf->WriteHTML($invoice);

        $path = 'invoices/invoice_' . $id . '_' . time() . '.pdf';
        $filePath = public_path($path);
        $pdf->Output($filePath, 'F');

        $order->bill_url = $path;
        $order->save();

        App::setLocale($mainLang);

        return $this->success([
            'invoice_url' => $path,
        ], 'Invoice generated successfully');
    }
}
