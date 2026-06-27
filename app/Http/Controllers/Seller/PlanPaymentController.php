<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Seller;
use App\Services\PayzahService;
use App\Traits\ResponsesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlanPaymentController extends Controller
{
    use ResponsesTrait;

    protected $payzahService;

    public function __construct(PayzahService $payzahService)
    {
        $this->payzahService = $payzahService;
    }

    /**
     * Get all active subscription plans
     */
    public function getPlans()
    {
        $this->lang();
        $plans = Plan::where('is_active', true)
            ->select('id', \Illuminate\Support\Facades\DB::raw($this->name), \Illuminate\Support\Facades\DB::raw($this->description), 'price')
            ->get();
        return $this->success($plans, 'Active plans retrieved successfully');
    }

    /**
     * Select a plan and initiate payment
     */
    public function selectPlan(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'payment_method' => 'sometimes|string',
        ]);

        $seller = auth()->user();
        if (!$seller) {
            return $this->failed(null, 'Unauthorized', 401);
        }

        $plan = Plan::findOrFail($request->plan_id);

        // Generate a unique tracking ID for the plan payment
        $trackid = 'SELLER_PLAN_' . $seller->id . '_' . time();

        // Calculate amount
        $amount = (float) $plan->price;

        $lang = $request->header('Lang') ?? 'en';

        // Initiate payment payload
        $payload = [
            "trackid" => $trackid,
            "amount" => $amount,
            "success_url" => route('seller.payment.success', ['trackid' => $trackid]),
            "error_url" => route('seller.payment.fail', ['trackid' => $trackid]),
            "currency" => "KWD",
            "language" => $lang,
            "payment_type" => "1", // standard Payment Type
            "udf1" => (string) $seller->id,
            "udf2" => (string) $plan->id,
        ];

        Log::info('Initiating plan payment for seller: ' . $seller->id, $payload);

        $paymentResponse = $this->payzahService->initiatePayment($payload);

        // Store selected plan on the seller but keep payment status pending
        $seller->update([
            'plan_id' => $plan->id,
            'payment_status' => 'pending',
            'payment_details' => json_encode($paymentResponse),
        ]);

        return response()->json($paymentResponse);
    }

    /**
     * Callback for successful payment
     */
    public function paymentSuccess(Request $request)
    {
        $trackid = $request->get('trackid');
        Log::info('Plan payment callback success: ' . $trackid, $request->all());

        $sellerId = null;
        if ($trackid && preg_match('/^SELLER_PLAN_(\d+)_/', $trackid, $matches)) {
            $sellerId = $matches[1];
        }

        if ($sellerId) {
            $seller = Seller::find($sellerId);
            if ($seller) {
                // Verify payment status with Payzah
                $verification = $this->payzahService->verifyPayment(['trackid' => $trackid]);
                Log::info('Payzah Plan Payment verification: ', $verification);

                $seller->update([
                    'payment_status' => 'paid',
                    'payment_details' => json_encode(array_merge(
                        json_decode($seller->payment_details, true) ?? [],
                        $verification,
                        ['callback_data' => $request->all()]
                    ))
                ]);
            }
        }

        $title = "Payment Successful | الدفع ناجح";
        $message = "Subscription payment completed successfully. Your profile is now under review by Admin.";
        $messageAr = "تم دفع الاشتراك بنجاح. حسابك الآن قيد المراجعة من قبل الإدارة.";

        return $this->renderHtmlResponse(true, $title, $message, $messageAr);
    }

    /**
     * Callback for failed payment
     */
    public function paymentFail(Request $request)
    {
        $trackid = $request->get('trackid');
        Log::warning('Plan payment callback failed: ' . $trackid, $request->all());

        $sellerId = null;
        if ($trackid && preg_match('/^SELLER_PLAN_(\d+)_/', $trackid, $matches)) {
            $sellerId = $matches[1];
        }

        if ($sellerId) {
            $seller = Seller::find($sellerId);
            if ($seller) {
                $seller->update([
                    'payment_status' => 'failed',
                    'payment_details' => json_encode(array_merge(
                        json_decode($seller->payment_details, true) ?? [],
                        ['callback_data' => $request->all()]
                    ))
                ]);
            }
        }

        $title = "Payment Failed | فشل الدفع";
        $message = "Subscription payment failed. Please try again from the application.";
        $messageAr = "فشلت عملية دفع الاشتراك. يرجى المحاولة مرة أخرى من التطبيق.";

        return $this->renderHtmlResponse(false, $title, $message, $messageAr);
    }

    /**
     * Render a premium styled HTML response for web redirects
     */
    private function renderHtmlResponse($success, $title, $message, $messageAr)
    {
        $color = $success ? '#27ae60' : '#e74c3c';
        $iconClass = $success ? 'fa-check-circle' : 'fa-times-circle';

        return response('
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>' . $title . '</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
            <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700&display=swap" rel="stylesheet">
            <style>
                body {
                    margin: 0;
                    padding: 0;
                    font-family: "Rubik", sans-serif;
                    background: linear-gradient(135deg, #0f0c20 0%, #15102a 100%);
                    color: #ffffff;
                    height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    overflow: hidden;
                }
                .card {
                    background: rgba(255, 255, 255, 0.05);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255, 255, 255, 0.1);
                    border-radius: 20px;
                    padding: 40px;
                    max-width: 500px;
                    text-align: center;
                    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
                    animation: fadeInUp 0.6s ease-out;
                }
                .icon {
                    font-size: 70px;
                    color: ' . $color . ';
                    margin-bottom: 25px;
                    animation: scaleIn 0.5s ease-out;
                }
                h2 {
                    margin: 0 0 15px 0;
                    font-size: 24px;
                    font-weight: 700;
                }
                p {
                    font-size: 16px;
                    line-height: 1.6;
                    color: rgba(255, 255, 255, 0.8);
                    margin: 10px 0;
                }
                .lang-divider {
                    height: 1px;
                    background: rgba(255, 255, 255, 0.15);
                    margin: 20px 0;
                }
                .btn {
                    display: inline-block;
                    margin-top: 25px;
                    padding: 12px 30px;
                    background: #7366ff;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 30px;
                    font-weight: 500;
                    box-shadow: 0 5px 15px rgba(115, 102, 255, 0.3);
                    transition: transform 0.2s, box-shadow 0.2s;
                }
                .btn:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 8px 20px rgba(115, 102, 255, 0.5);
                }
                @keyframes fadeInUp {
                    from { opacity: 0; transform: translateY(30px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                @keyframes scaleIn {
                    from { transform: scale(0.5); opacity: 0; }
                    to { transform: scale(1); opacity: 1; }
                }
            </style>
        </head>
        <body>
            <div class="card">
                <div class="icon"><i class="fa ' . $iconClass . '"></i></div>
                <h2>' . ($success ? "Success | نجاح" : "Failed | فشل") . '</h2>
                <p class="en-msg">' . $message . '</p>
                <div class="lang-divider"></div>
                <p class="ar-msg" dir="rtl">' . $messageAr . '</p>
            </div>
        </body>
        </html>
        ', 200);
    }
}
