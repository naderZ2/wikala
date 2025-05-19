<?php

namespace App\Http\Controllers\Seller;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    


    public function index(){
        // $gender=$request->gender;

    
        $orders = Order::whereSellerId(auth()->id())->with('seller')->get();

        $orderDelivered = Order::whereSellerId(auth()->id())->whereNotIn('status',['cancel','delivered'])->with('seller')->get();
        // $orderNotDelivered = $this->Order::where('status','delivered')->get();
        $orderNotDelivered = Order::whereSellerId(auth()->id())->whereNotIn('status', ['shipped','out_for_delivery','confirmed','order_placed'])->with('seller')->get();
        
        

        // dd($orders);
        // $searchResult=$searchResult->count();
        return view('seller.home',compact('orders','orderDelivered','orderNotDelivered'));
    }


}
