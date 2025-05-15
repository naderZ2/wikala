<?php

namespace App\Http\Controllers\Seller;
use App\Services\OrderService;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Order\EditStatusRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Mpdf\Mpdf;
class OrderController extends Controller
{
    public function index(){

        $page = request()->segments();
        $page =end($page);



        if($page=='new')
        {
            // Log::info('thenew');
            $orders=Order::whereSellerId(auth()->id())->where('status','order_placed')->with('user:id,name,phone')->get();
        }elseif($page=='completed')
        {
            
            // Log::info('thecompleted');
            $orders=Order::whereSellerId(auth()->id())->whereIn('status',['cancel','delivered'])->with('user:id,name,phone')->get();
            
        }elseif($page=='under_preparation')
        {
            // Log::info('theunder_preparation');
            $orders=Order::whereSellerId(auth()->id())->whereIn('status', ['shipped', 'out_for_delivery', 'confirmed'])->with('user:id,name,phone')->get();
            // Log::info($orders);
        }else
        {
            $orders=Order::whereSellerId(auth()->id())
            ->with('user:id,name,phone')->get();
            
        }

        return view('seller.order.index',compact('orders'));
    }

    public function details($id){
        $this->lang();
        $order=Order::whereId($id)->with('user:id,name',"orderDetails.product:id,$this->name")->first();
        return view('seller.order.details',compact('order'));
    }

    public function changeStatus(EditStatusRequest $request){
        #TODO complete
        Order::whereId($request->id)->update(['status' =>""]);
        return back()->with('success',trans('lang.updatted')); 
    }
    
      public function generateInvoice($id)
    {

        // Log::info('order');
        // $this->lang();

        
        $mainLang = App::getLocale();
        
        
        
        $order=Order::whereId($id)->with('user:id,name,phone,email,email',"orderDetails.product",'seller:id,email,name','address','address.region')->first();
        
        
        if($order->user->lang =='ar'){
            App::setLocale('ae');
            // Log::info('ae');
        }elseif($order->user->lang == 'en'){
            // Log::info('sssssssssssssssssssssssssssssss5555');
            App::setLocale('en');
            // Log::info('en');
        }

        // Log::info($order);
        
        $invoice = view('admin.order.invoice', compact('order'))->render();

        $pdf = new Mpdf([
            'default_font' => 'dejavusans', // Supports Arabic characters
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'default_font_size' => 12,
        ]);

        $pdf->WriteHTML($invoice);

        $path='invoices/invoice_' . $id. '_'. time() . '.pdf';
        $filePath = public_path($path);

        // Log::info('filePath');
        // Log::info($filePath);

        $pdf->Output($filePath, 'F');

        $order->bill_url = $path; 
        $order->save();
        // return 'sss';
        App::setLocale($mainLang);

        return to_route('seller.order.details',$id)->with('success',trans('lang.created'));

        // return response()->json(['message' => 'Invoice saved successfully!', 'path' => $filePath]);

    }
    
      public function changeOrderStatus($id,$action=null,OrderService $service){
        $request =(object) [
            "id" => $id,
            "action" => $action
        ];
        $service->changeOrderStatus($request);
        // dd(Route::currentRouteName());
        return redirect()->back()->with('success',trans('lang.updated'));
    }

}
