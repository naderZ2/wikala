<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function __construct()
    {
        $this->model="App\Models\Consultation";
        $this->Section="App\Models\Section";
        $this->Consultant="App\Models\Consultant";
        $this->Country="App\Models\Country";
        $this->Order="App\Models\Order";
        $this->Seller="App\Models\Seller";
    }

    public function index(){
        // $gender=$request->gender;

    
        $orders = $this->Order::with('seller')->get();

        $orderDelivered = $this->Order::whereNotIn('status',['cancel','delivered'])->with('seller')->get();
        // $orderNotDelivered = $this->Order::where('status','delivered')->get();
        $orderNotDelivered = $this->Order::whereNotIn('status', ['shipped','out_for_delivery','confirmed','order_placed'])->with('seller')->get();
        
        $sellers = $this->Seller::where('active','1')->get();

        // dd($orders);
        // $searchResult=$searchResult->count();
        return view('admin.home',compact('orders','orderDelivered','orderNotDelivered','sellers'));
    }






    public function getSellerDetails(Request $request)
    {

        $sellerId = $request->input('seller_id');
    
        // Fetch seller details

        if($sellerId === 'All'){
            $orders = $this->Order::count();
            $orderDelivered = $this->Order::where('status','delivered')->count();
            $orderNotDelivered = $this->Order::whereNotIn('status', ['delivered', 'canceled','confirmed'])->count();

            // Log::info($orders);
            // Log::info($orderDelivered);
            // Log::info($orderNotDelivered);
            }else{
                $orders = $this->Order::where('seller_id',$sellerId)->count();
                $orderDelivered = $this->Order::where('status','delivered')->where('seller_id',$sellerId)->count();
                $orderNotDelivered = $this->Order::whereNotIn('status', ['delivered', 'canceled','confirmed'])->where('seller_id',$sellerId)->with('seller')->count();
            
        }
            

        // $orderNotDelivered = $this->Order::where('status','delivered')->get();


        // dd($seller);
        // Fetch orders for the selected seller
        // $orders = $seller ? $seller->orders : [];
    
        return response()->json([
            'orders' => $orders,
            'orderDelivered' => $orderDelivered,
            'orderNotDelivered' => $orderNotDelivered,
        ]);

    }

}
