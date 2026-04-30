<?php

namespace App\Http\Controllers\Client;

use App\Models\Order;
use App\Models\AboutUs;
use App\Models\OrderDetails;
use App\Services\OrderService;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\City\CheckRequest;
use App\Http\Requests\Client\Basket\StoreRequest;
use App\Http\Requests\Client\Basket\UpdateRequest;
use App\Http\Requests\Client\Basket\CancelRequest;
use Illuminate\Support\Facades\Log;

class BasketController extends Controller
{
    use ResponsesTrait;
    public function index(){
        $this->lang();
        $orders=Order::where(['user_id'=>auth()->id(),"type"=>'basket'])
        ->with([
            "seller:id,name,img_path",
            "orderDetails.product:id,$this->description,$this->title,$this->name,main_image,seller_id",
            "orderDetails.product.seller:id,name,img_path,details,about",
            "orderDetails.variation" => function ($q) {
                $q->select('id','product_id','price','quantity','sku','is_active')
                  ->with(['attributes' => function($qa){
                      $qa->with(['attribute' => function($qatt){
                          $qatt->select('id', \DB::raw($this->name), 'type','image','enable');
                      }]);
                  }]);
            },
            "orderDetails.extraService.extraDetails:id,$this->description"
        ])
        ->select('id','seller_id','total_price','status','order_number','updated_at','delivery_fee')
        ->get();

        $deliveryFee = (float) (AboutUs::find(1)->delivery_fee ?? 0);
        $subTotal = $orders->sum('total_price');
        $deliveryTotal = $orders->count() * $deliveryFee;

        return $this->success([
            'baskets'            => $orders,
            'sub_total'          => $subTotal,
            'delivery_fee'       => $deliveryFee,
            'delivery_fee_total' => $deliveryTotal,
            'grand_total'        => $subTotal + $deliveryTotal,
        ]);
    }

    public function addToBasket(StoreRequest $request ,OrderService $service){
                // Log::info("newItem " .json_encode($request->validated()) );

        $result = $service->addToBasket($request);
        return $result;
    }

    public function updateBasket(UpdateRequest $request, OrderService $service){
        return $service->updateBasketItem($request);
    }

    public function cancelItem(CancelRequest $request){
        $orderItem=OrderDetails::where('id',$request->id)->first();
        $order = $orderItem->order;
        $totalPrice=$order->total_price - $orderItem->price;

        if($order->status != "out_for_delivery" || $order->status != "delivered" ){

              $order->update(['total_price' => $totalPrice]);
              $orderItem->delete();

              if($order->type == 'basket' && $order->orderDetails()->count() === 0){
                  $order->delete();
              }

            return $this->success(null,trans('lang.item_deleted'));
        }
        else{
            return $this->success(null,trans('lang.item_not_deleted'));
        }
    }
}
