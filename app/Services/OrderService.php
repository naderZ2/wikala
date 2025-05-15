<?php
namespace App\Services;

use DB;
use App\Models\Order;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Discount;
use App\Traits\ResponsesTrait;
use App\Traits\FileUploadTrait;
use App\Models\ProductExtraService;
use App\Models\OrderDetailsExtraServices;

class OrderService{
    use ResponsesTrait;
    use FileUploadTrait;

    public function addOrder($request){
         $order = Order::where(['user_id' => auth()->id(),'type'=>'basket'])->first();

        $AboutUsData=AboutUs::find(1);
        if(!$order){
              return $this->failed(null," السلة فارغة الرجاء اختيار بعض الخدمات اولا");
        }
        $arr=["payment_type" => $request->payment_type,'delivery_time' => $request->delivery_time ,'type'=>"order",'delivery_fee'=>$AboutUsData->delivery_fee];
        if($request->code){
              $discount=Discount::whereCode($request->code)->first();
               $price=$order->total_price-($order->total_price * ($discount->value/100));
            $arr['total_price']=$price;
        }

        $order->update($arr);
    //     "address_id" =>$request->address_id]););
        return $this->success(null,"تم التأكيد");
    }
    
    // public function addOrder($request){
    //     DB::beginTransaction();
    //     $order = Order::create(['user_id' => auth()->id(),
    //     "payment_type" => $request->payment_type,'delivery_time' => $request->delivery_time ,
    //     "address_id" =>$request->address_id]);
    //     $totalPrice=0;
    //     $seller_id=0;
    //     foreach( $request->products as $product){
    //     // foreach( json_encode(json_decode($request->products, true)) as $product){
    //         $actualProduct=Product::whereId($product['id'])->first();
    //         $price =$actualProduct->price;
    //         $seller_id = $actualProduct->seller_id;
    //         if($actualProduct->quantity < $product['quantity']){
    //             DB::rollback();
    //             return $this->failed(null,"maximum quantity to order  $actualProduct->name_en:  $actualProduct->quantity");
    //         }
    //         $orderDetails['quantity'] = $product['quantity'];
    //         $orderDetails['product_id'] = $product['id'];
    //         $orderDetails['price'] = $product['quantity'] * $price;
    //         $totalPrice += $orderDetails['price'];
    //         $order->orderDetails()->create($orderDetails);
    //         $actualProduct->decrement('quantity',$product['quantity']);
    //     }
    //     $data =['seller_id' =>$seller_id ,'total_price' => $totalPrice ,"order_number" => $order->id +10000];

    //     if($request->hasFile('file')) {
    //         // Log::error('file');
    //         $data['file']=$this->uploadFile($request->file, 'sections');     
    //     }
    //     $order->update($data);
    //     DB::commit();
    //     return $this->success(null,"تم الطلب");
    // }
    
    public function addToBasket($request){
       $order = Order::where(['user_id' => auth()->id(),'type'=>'basket'])->first();
        $actualProduct=Product::whereId($request->product_id)->first();
       if(!$order){
        $order = Order::create(['user_id' => auth()->id(),'type'=>'basket',
        'seller_id'=>$actualProduct->seller_id
        ]);
       }else{
           if($actualProduct->seller_id!=$order->seller_id){
               
                return $this->failed(null," يجب ان تكون كل المنتجات من نفس موزع الخدمة");

           }
       }
       
        // $orderDetails['quantity'] = $product['quantity'];
        $orderDetails['product_id'] =$request->product_id;
        $orderDetails['price'] =$actualProduct->price;
        $orderDetails=$order->orderDetails()->create($orderDetails);
        $totalPrice =$order->total_price + $orderDetails['price'];
       
       $order->update(['total_price' =>$totalPrice,"order_number" => $order->id +10000]);
       
       if($request->extraService){
           
            foreach( $request->extraService as $extraService){
            $extraPrice=ProductExtraService::whereId($extraService['id'])->value('price');
            OrderDetailsExtraServices::create(['order_details_id'=>$orderDetails->id,
            "extra_service_id"=>$extraService['id'],
            "price"=>$extraPrice]);
            
        }
       }
  
       
     
        return $this->success(null,"تم الطلب");
    }

    public function changeOrderStatus($request){
        $order = Order::find($request->id);
        $status =[];
        if($order->status == "delivered" || $order->status == "cancel"){
            return "no action can take to this order";
        }else{
            
            if($request->action == "cancel"){
                $status = ['status' =>"cancel" ,'cancel_time' =>now()];
            }
            else if($order->status == "order_placed"){
                $status = ['status' =>"confirmed" ,'confirmed_time' => now()->format('Y-m-d H:i:s')];
            }
            else if($order->status == "confirmed"){
                $status = ['status' =>"shipped" , 'shipped_time' => now()];
            }
            else if($order->status == "shipped"){
                $status = ['status' =>"out_for_delivery" , 'out_for_delivery_time' => now()];
            }
            else if($order->status == "out_for_delivery"){
                $status = ['status' =>"delivered" ,'actual_delivery_time' =>now()];
            }
            $order->update($status);
        }

    }
}

?>