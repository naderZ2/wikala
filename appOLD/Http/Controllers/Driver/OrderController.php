<?php

namespace App\Http\Controllers\Driver;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    use ResponsesTrait;
    public function index(){
        $orders = Order::whereDriverId(auth()->id())
        ->select('id','status','order_number','updated_at'
       // ,
        // 'confirmed_time','shipped_time'
        )->get();
        return $this->success($orders);
    }

    public function details(Request $request){
        $this->lang();
        $order = Order::whereDriverId(auth()->id())
        ->whereId($request->id)
        ->first();
        $order->uu=\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)
        ->format('d-m-Y');
        $address = $order->address;
        $address->region=$address->region()->select('id','parent_id',$this->name)->first();
        $address->region_parent=$address->region->parent()->select('id','parent_id',$this->name)->first();
        return $this->success($order);
    }

    public function orderDelivery(Request $request){
        Order::whereId($request->id)->update(['status' => "delivered" ,'actual_delivery_time' =>now()]);
        return $this->success(null,trans('lang.updated'));
    }
}
