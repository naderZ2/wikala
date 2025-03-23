<?php

namespace App\Http\Controllers\Client;

use App\Models\Order;
use App\Services\OrderService;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\City\CheckRequest;
use App\Http\Requests\Client\Order\StoreRequest;
use App\Http\Requests\Client\Order\CancelRequest;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    use ResponsesTrait;
    public function index(){

        $this->lang();
         $orders=Order::where(['user_id'=>auth()->id()])->where("type","!=","basket")
        ->with(["orderDetails.extraService.extraDetails:id,$this->description","seller:id,name,img_path",
        "orderDetails.product:id,$this->name,$this->description,$this->title,price,old_price,main_image,serving"])
        ->select('id','status','order_number','updated_at','seller_id')
        ->orderByDESC('id')
        ->get();
        
        return $this->success(OrderResource::collection($orders));
    }

    public function tracking(CheckRequest $request){
        $order=Order::whereId($request->id)
        ->with('driver:id,name,phone')
        ->first();
        return $this->success($order);
    }

    public function store(StoreRequest $request ,OrderService $service){
        
        $result = $service->addOrder($request);
        return $result;
    }
    
    public function cancelOrder(CancelRequest $request){
        $order = Order::find($request->id);
        if($order->status != "out_for_delivery" || $order->status != "delivered" ){
            $order->update(['status' => "cancel","reason"=>$request->reason]);
            return $this->success(null,trans('lang.order_cancel'));
        }
        else{
            return $this->success(null,trans('lang.order_not_cancel'));
        }
    }
}
