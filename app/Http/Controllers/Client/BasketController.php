<?php

namespace App\Http\Controllers\Client;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Services\OrderService;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\City\CheckRequest;
use App\Http\Requests\Client\Basket\StoreRequest;
use App\Http\Requests\Client\Basket\CancelRequest;
use Illuminate\Support\Facades\Log;

class BasketController extends Controller
{
    use ResponsesTrait;
    public function index(){
        $this->lang();
        $orders=Order::where(['user_id'=>auth()->id(),"type"=>'basket'])
        // ->with("orderDetails.extraService.extraDetails:id,$this->description")
        ->with(["orderDetails.product:id,$this->description,$this->title,$this->name,main_image","orderDetails.extraService.extraDetails:id,$this->description"])
        ->select('id','total_price','status','order_number','updated_at','delivery_fee')
        ->get();
        return $this->success($orders);
    }

    public function addToBasket(StoreRequest $request ,OrderService $service){
                Log::info("newItem " .json_encode($request->validated()) );

        $result = $service->addToBasket($request);
        return $result;
    }
    
    public function cancelItem(CancelRequest $request){
        $orderItem=OrderDetails::where('id',$request->id)->first();
        $order = $orderItem->order;
        $totalPrice=$order->total_price - $orderItem->price;
      
        if($order->status != "out_for_delivery" || $order->status != "delivered" ){
            
              $order->update(['total_price' => $totalPrice]);
              $orderItem->delete();
            return $this->success(null,trans('lang.item_deleted'));
        }
        else{
            return $this->success(null,trans('lang.item_not_deleted'));
        }
    }
}
