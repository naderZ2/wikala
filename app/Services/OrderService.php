<?php
namespace App\Services;

use DB;
use App\Models\Order;
use App\Models\AboutUs;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Discount;
use App\Models\CouponUsage;
use App\Traits\ResponsesTrait;
use App\Traits\FileUploadTrait;
use App\Models\ProductExtraService;
use App\Models\OrderDetailsExtraServices;

class OrderService{
    use ResponsesTrait;
    use FileUploadTrait;

    public function addOrder($request){
        $baskets = Order::where(['user_id' => auth()->id(),'type'=>'basket'])->get();
        if($baskets->isEmpty()){
            return $this->failed(null," السلة فارغة الرجاء اختيار بعض الخدمات اولا");
        }

        $deliveryFee = (float) (AboutUs::find(1)->delivery_fee ?? 0);
        $basketSubtotal = (float) $baskets->sum('total_price');

        $coupon          = null;
        $couponDiscount  = 0.0;
        $discountRatio   = 0.0;

        if($request->code){
            $coupon = Coupon::where('code', $request->code)->first();
            if($coupon){
                $eligibleSubtotal = $coupon->getEligibleSubtotal(auth()->id(), $basketSubtotal);
                if ($eligibleSubtotal <= 0) {
                    return $this->failed(null, trans('lang.coupon_not_valid_for_basket'));
                }
                [$valid, $error] = $coupon->validateFor(auth()->id(), $eligibleSubtotal);
                if(!$valid){
                    return $this->failed(null, $error);
                }
                $couponDiscount = $coupon->calculateDiscount($eligibleSubtotal);
            } else {
                $legacy = Discount::whereCode($request->code)->first();
                if($legacy){
                    $discountRatio = $legacy->value / 100;
                }
            }
        }

        $groupId = (string) \Illuminate\Support\Str::uuid();

        DB::beginTransaction();
        try {
            $allowedSellerIds = $coupon ? $coupon->sellers()->pluck('sellers.id')->toArray() : [];
            $allowedProductIds = $coupon ? $coupon->products()->pluck('products.id')->toArray() : [];

            foreach($baskets as $basket){
                $sellerShare = (float) $basket->total_price;

                if($coupon && $basketSubtotal > 0){
                    $basketEligibleAmount = 0.0;
                    if (empty($allowedSellerIds) || in_array($basket->seller_id, $allowedSellerIds)) {
                        if (empty($allowedProductIds)) {
                            $basketEligibleAmount = $sellerShare;
                        } else {
                            foreach ($basket->orderDetails as $detail) {
                                if (in_array($detail->product_id, $allowedProductIds)) {
                                    $itemPrice = (float) $detail->price;
                                    $extraServicePrice = (float) \App\Models\OrderDetailsExtraServices::where('order_details_id', $detail->id)->sum('price');
                                    $basketEligibleAmount += ($itemPrice + $extraServicePrice);
                                }
                            }
                        }
                    }
                    $share = $eligibleSubtotal > 0 ? ($basketEligibleAmount / $eligibleSubtotal) : 0;
                    $perOrderDiscount = round($couponDiscount * $share, 2);
                    $discountedTotal  = max(0, $sellerShare - $perOrderDiscount);
                } else {
                    $perOrderDiscount = $sellerShare * $discountRatio;
                    $discountedTotal  = $sellerShare - $perOrderDiscount;
                }

                $basket->update([
                    'type'            => 'order',
                    'group_id'        => $groupId,
                    'payment_type'    => $request->payment_type,
                    'delivery_time'   => $request->delivery_time,
                    'delivery_fee'    => $deliveryFee,
                    'total_price'     => $discountedTotal,
                    'address_id'      => $request->address_id,
                    'coupon_id'       => $coupon?->id,
                    'coupon_code'     => $coupon?->code,
                    'discount_amount' => round($perOrderDiscount, 2),
                ]);
            }

            if($coupon){
                $coupon->increment('used_count');
                foreach(Order::where('group_id',$groupId)->get() as $placedOrder){
                    CouponUsage::create([
                        'coupon_id'       => $coupon->id,
                        'user_id'         => auth()->id(),
                        'order_id'        => $placedOrder->id,
                        'discount_amount' => $placedOrder->discount_amount,
                    ]);
                }
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return $this->failed(null,"تعذر إنشاء الطلب");
        }

        $orders = Order::where('group_id',$groupId)->get();
        $subTotal = $orders->sum('total_price');
        $deliveryTotal = $orders->sum('delivery_fee');

        return $this->success([
            'group_id'           => $groupId,
            'orders'             => $orders->pluck('id'),
            'sub_total'          => $subTotal,
            'delivery_fee_total' => $deliveryTotal,
            'discount_amount'    => round($couponDiscount, 2),
            'coupon_code'        => $coupon?->code,
            'grand_total'        => $subTotal + $deliveryTotal,
        ],"تم التأكيد");
    }

    public function addToBasket($request){
        $actualProduct=Product::whereId($request->product_id)->first();
        $order = Order::where([
            'user_id'   => auth()->id(),
            'type'      => 'basket',
            'seller_id' => $actualProduct->seller_id,
        ])->first();
        if(!$order){
            $order = Order::create([
                'user_id'   => auth()->id(),
                'type'      => 'basket',
                'seller_id' => $actualProduct->seller_id,
            ]);
        }


        $quantity = (int) $request->quantity;
        $orderDetails['product_id'] = $request->product_id;
        $orderDetails['quantity'] = $quantity;

        // Use variation price if a variation is selected, otherwise use product price
        $price = (float) $actualProduct->price;
        $variationId = null;

        // Option 1: Client sends product_variation_id directly
        if($request->has('product_variation_id') && $request->product_variation_id){
            $variationId = $request->product_variation_id;
        }

        // Option 2: Client sends variation_attribute_ids → find the matching variation
        if(!$variationId && $request->has('variation_attribute_ids') && !empty($request->variation_attribute_ids)){
            $variationId = \App\Models\ProductVariationAttribute::whereIn('id', $request->variation_attribute_ids)
                ->pluck('product_variation_id')
                ->unique()
                ->first();
        }

        if($variationId){
            $variation = \App\Models\ProductVariation::where('id', $variationId)
                ->where('product_id', $request->product_id)
                ->first();
            if($variation && (float) $variation->price > 0){
                $price = (float) $variation->price;
            }
            $orderDetails['product_variation_id'] = $variationId;
        }

        $linePrice = round($price * $quantity, 2);
        $orderDetails['price'] = $linePrice;
        $orderDetails = $order->orderDetails()->create($orderDetails);

        $extraServiceTotal = 0;
        if($request->extraService){
            foreach($request->extraService as $extraService){
                $extraPrice = (float) ProductExtraService::whereId($extraService['id'])->value('price');
                OrderDetailsExtraServices::create([
                    'order_details_id' => $orderDetails->id,
                    'extra_service_id' => $extraService['id'],
                    'price' => $extraPrice
                ]);
                $extraServiceTotal += $extraPrice;
            }
        }

        $newTotal = (float) $order->total_price + $linePrice + $extraServiceTotal;
        $order->update(['total_price' => round($newTotal, 2), 'order_number' => $order->id + 10000]);
  
       
     
        return $this->success(null,"تم الطلب");
    }

    public function updateBasketItem($request){
        $orderItem = \App\Models\OrderDetails::where('id', $request->id)->first();
        if(!$orderItem){
            return $this->failed(null, "Item not found");
        }

        $order = $orderItem->order;
        if(!$order || $order->user_id !== auth()->id() || $order->type !== 'basket'){
            return $this->failed(null, "Item not found in your basket");
        }

        $product = Product::whereId($orderItem->product_id)->first();

        $variationId = $orderItem->product_variation_id;

        if($request->has('product_variation_id')){
            $variationId = $request->product_variation_id ?: null;
        }

        if($request->has('variation_attribute_ids') && !empty($request->variation_attribute_ids)){
            $resolved = \App\Models\ProductVariationAttribute::whereIn('id', $request->variation_attribute_ids)
                ->pluck('product_variation_id')
                ->unique()
                ->first();
            if($resolved){
                $variationId = $resolved;
            }
        }

        $unitPrice = (float) $product->price;
        if($variationId){
            $variation = \App\Models\ProductVariation::where('id', $variationId)
                ->where('product_id', $orderItem->product_id)
                ->first();
            if(!$variation){
                return $this->failed(null, "Variation does not belong to this product");
            }
            if((float) $variation->price > 0){
                $unitPrice = (float) $variation->price;
            }
        }

        $quantity = $request->has('quantity') && $request->quantity
            ? (int) $request->quantity
            : (int) $orderItem->quantity;

        $newLinePrice = round($unitPrice * $quantity, 2);
        $oldLinePrice = (float) $orderItem->price;

        // Calculate current extra service total for this item
        $extraServiceTotal = (float) $orderItem->extraService()
            ->sum(\DB::raw('price'));

        // Calculate line + extra service delta
        $delta = ($newLinePrice + $extraServiceTotal) - ($oldLinePrice + $extraServiceTotal);

        $orderItem->update([
            'quantity' => $quantity,
            'product_variation_id' => $variationId,
            'price' => $newLinePrice,
        ]);

        $order->update(['total_price' => round(max(0, (float) $order->total_price + $delta), 2)]);

        return $this->success(null, "تم التحديث");
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