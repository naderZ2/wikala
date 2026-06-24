<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\PayzahService;
use App\Traits\ResponsesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PayzahController extends Controller
{
    use ResponsesTrait;

    protected $payzahService;

    public function __construct(PayzahService $payzahService)
    {
        $this->payzahService = $payzahService;
    }

    public function processPayment(Request $request)
    {
        $lang = $request->header('lang') ?? 'ar';
        app()->setLocale($lang);

        $rules = [
            'trackid' => 'required|string',
            'amount' => 'required|numeric',
            'currency' => 'required|string',
            'payment_type' => 'in:1,2'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->sendError($validator->errors()->first(), 400);
        }

        $payload = [
            "trackid" => $request->trackid,
            "amount" => $request->amount,
            "success_url" => "https://expo.sys-web.net/success",
            "error_url" => "https://expo.sys-web.net/error",
            "currency" => $request->currency,
            "language" => $lang,
            "payment_type" => $request->input('payment_type', '1'),
            "udf1" => $request->input('udf1', ''),
            "udf2" => $request->input('udf2', ''),
            "udf3" => $request->input('udf3', ''),
            "udf4" => $request->input('udf4', ''),
            "udf5" => $request->input('udf5', ''),
        ];

        $paymentResponse = $this->payzahService->initiatePayment($payload);
        return response()->json($paymentResponse);
    }

    /**
     * Compatibility helper to match expected sendError calls.
     */
    protected function sendError($error, $code = 404)
    {
        return response()->json([
            'success' => false,
            'message' => $error,
        ], $code);
    }
}
