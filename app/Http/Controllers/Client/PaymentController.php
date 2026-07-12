<?php
namespace App\Http\Controllers\Client;

use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Client\PaymentRequest;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;
use Mpdf\Mpdf;
class PaymentController extends Controller
{
    use ResponsesTrait;
    public function __construct()
    {
        $this->model="App\Models\Payment";
    }

  public function payment(PaymentRequest $request){
            $req=$request->validated();
            $payment_option=$req['payment_option'];

            if(!empty($req['group_id'])){
                $orders = Order::where('group_id',$req['group_id'])->get();
            } else {
                $anchor = Order::where('id',$req['order_id'])->first();
                if($anchor && $anchor->group_id){
                    $orders = Order::where('group_id',$anchor->group_id)->get();
                } else {
                    $orders = $anchor ? collect([$anchor]) : collect();
                }
            }

            if($orders->isEmpty()){
                return $this->failed(null,"order not found");
            }

            $groupId = $orders->first()->group_id ?: ('single_'.$orders->first()->id);
            $order_total_price = $orders->sum('total_price') + $orders->sum('delivery_fee');
            $client = $orders->first()->user;

            $merchantTxnId = "Ezhalha_group_$groupId";

           if($request->payment_method == 'knet'){
            $payment_method = 'knet';


        }else if($request->payment_method == 'credit'){
            $payment_method = 'cc';

        }
        $data = array(
            "order" => array(
                "id" => $merchantTxnId,
                "reference" => "Ezhalha_$groupId",
                "description" => "Ezhalha product",
                "currency" => "KWD",
                "amount" => $order_total_price
            ),
            "language" => "en",
            "paymentGateway" => array(
                "src" => $payment_method
            ),
            "reference" => array(
                "id" => "Ezhalha_group_$groupId"
            ),
            "customer" => array(
                "uniqueId" => "Ezhalha_client_id_$client->id",
                "name" => "$client->name",
                "email" => "$client->email",
                "mobile" => "$client->phone"
            ),
            "returnUrl" => "https://ezhalhakw.com/ezhalha/api/success",
            "cancelUrl" => "https://ezhalhakw.com/ezhalha/api/fail",
            "notificationUrl" => "https://ezhalhakw.com/ezhalha"
        );

    // Encode the array into a JSON string
        $json_data = json_encode($data);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandboxapi.upayments.com/api/v1/charge',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $json_data, // Pass JSON-encoded data here
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer e66a94d579cf75fba327ff716ad68c53aae11528',
                'accept: application/json',
                'content-type: application/json'
            ),
        ));

        $result = curl_exec($curl);
        curl_close($curl);
        $resp=json_decode($result, true);

        foreach($orders as $order){
            Payment::create([
                'user_id'          => auth()->id(),
                'order_id'         => $order->id,
                'status'           => "PENDING",
                'amount'           => $order->total_price + $order->delivery_fee,
                'payment_method'   => $request->payment_method,
                'payment_option'   => $payment_option,
                'payment_order_id' => $merchantTxnId,
            ]);
        }

        return $this->success(["payment_url" =>$resp['data']['link']]);

    }



    public function successUrl(Request $request){
        $merchantTxnId = $_GET['requested_order_id'];
        $paymentId= $_GET['payment_id'];
        $payments = Payment::where('payment_order_id',$merchantTxnId)->get();

        foreach($payments as $payment){
            $order = Order::with('user')->find($payment->order_id);
            if ($order) {
                $order->update(['payment_status'=>"success"]);
                $path = $this->generateInvoice($order->id);
                if ($order->user && $order->user->phone) {
                    $this->sendOtpAsync($order->user->phone, "https://wikala.org/ex/$path");
                }
            }
            $payment->update(['status' => "success",'payment_id'=>$paymentId]);
        }

        return $this->success(null,"عملية ناجحة");
    }

    public function failUrl(Request $request){
        $merchantTxnId = $_GET['requested_order_id'];
        $paymentId= $_GET['payment_id'];
        $payments = Payment::where('payment_order_id',$merchantTxnId)->get();

        foreach($payments as $payment){
            Order::where('id',$payment->order_id)->update(['payment_status'=>"failed"]);
            $payment->update(['status' => "failed",'payment_id'=>$paymentId]);
        }

        return $this->failed(null,"عملية غير ناجحة");
    }


    public static function sendOtpAsync($phoneNumber, $message)
    {
        $countryCode = '20';
        // $formattedNumber = $countryCode . ltrim($phoneNumber, '');
        $formattedNumber = ltrim($phoneNumber, '+');
        // $formattedNumber = $phoneNumber;
                  // Log::info("sendOtpAsync:-" .$formattedNumber );


        $url = 'https://app.arrivewhats.com/api/send';
        $settings = \App\Models\AboutUs::first();
        $params = [
            'query' => [
                'number' => $formattedNumber,
                'type' => 'text',
                'message' => $message,
                'instance_id' => $settings ? $settings->instance_id : '6A53B0DA3B7C6',
                'access_token' => $settings ? $settings->access_token : '6a3808911d3cc',
            ],
        ];

        $client = new Client();
        $promise = $client->getAsync($url, $params);

        try {
            $response = $promise->wait(); // Block until the request is complete
            $responseData = json_decode($response->getBody(), true);

            // Log::info('WhatsApp OTP sent successfully.', ['response' => $responseData]);

            return [
                'success' => true,
                'data' => $responseData,
            ];
        } catch (\Throwable $exception) {
            Log::error('Failed to send WhatsApp OTP.', ['error' => $exception->getMessage()]);
                // Log::info("sendOtpAsync:success"  );

            return [
                'success' => false,
                'error' => $exception->getMessage(),
            ];
        }
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

        $tempDir = storage_path('app/mpdf');
        if (!file_exists($tempDir)) {
            mkdir($tempDir, 0775, true);
        }

        $pdf = new Mpdf([
            'tempDir' => $tempDir,
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
        return $path;
        // return 'sss';
        // App::setLocale($mainLang);

        // return to_route('order.details',$id)->with('success',trans('lang.created'));

        // return response()->json(['message' => 'Invoice saved successfully!', 'path' => $filePath]);

    }
}
