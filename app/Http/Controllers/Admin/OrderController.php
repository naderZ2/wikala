<?php

namespace App\Http\Controllers\Admin;
use Mpdf\Mpdf;
use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Services\OrderService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\AssignDriverRequest;

class OrderController extends Controller
{
     public function index(){
        $page = request()->segments();
        $page =end($page);

        if($page=='new')
        {
            $orders=Order::where('status','order_placed')->with('user:id,name,phone')->get();
        }elseif($page=='completed')
        {
            
            // Log::info('thecompleted');
            $orders=Order::whereIn('status',['cancel','delivered'])->with('user:id,name,phone')->get();
            
        }elseif($page=='under_preparation')
        {
            // Log::info('theunder_preparation');
            // $orders=Order::where('status',['shipped','out_for_delivery','confirmed'])->with('user:id,name,phone')->get();
            $orders = Order::whereIn('status', ['shipped', 'out_for_delivery', 'confirmed'])
            ->with('user:id,name,phone')
            ->get();
        }else
        {
            $orders=Order::with('user:id,name,phone')->get();
        }
            // Log::info($orders);


        return view('admin.order.index',compact('orders'));
    }

    public function details($id){
        $this->lang();
        $order=Order::whereId($id)->with('user:id,name',"orderDetails.product:id,$this->name")->first();
        $region_id = User::find($order->user_id)->region_id;
        // $city = City::find($region_id);
        // $drivers_id = $city->drivers->pluck('pivot.driver_id');
        // $drivers = Driver::whereIn('id',$drivers_id)->get(); 
        return view('admin.order.details',compact('order'));
    }

    public function changeOrderStatus($id,$action=null,OrderService $service){
        $request =(object) [
            "id" => $id,
            "action" => $action
        ];
        $service->changeOrderStatus($request);
        return to_route('order.index')->with('success',trans('lang.updated'));
    }

    public function assignDriver(AssignDriverRequest $request){
        $order = Order::find($request->id);
        $order->update(['driver_id' => $request->driver_id]);
        return to_route('order.index')->with('success',trans('lang.updated')); 
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

        return to_route('order.details',$id)->with('success',trans('lang.created'));

        // return response()->json(['message' => 'Invoice saved successfully!', 'path' => $filePath]);

    }
}
