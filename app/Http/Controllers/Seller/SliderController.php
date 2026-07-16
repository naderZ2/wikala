<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\AboutUs;
use App\Services\PayzahService;
use App\Traits\ResponsesTrait;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    use ResponsesTrait;
    use FileUploadTrait;

    protected $payzahService;

    public function __construct(PayzahService $payzahService)
    {
        $this->payzahService = $payzahService;
    }

    /**
     * List all sliders uploaded by the logged-in seller
     */
    public function index(Request $request)
    {
        $this->lang();
        $seller = $request->user();

        $sliders = Slider::where('seller_id', $seller->id)
            ->latest()
            ->get();

        // Get the current slider price configured by the admin
        $settings = AboutUs::first();
        $sliderPrice = $settings ? (float) $settings->slider_price : 10.00;
        $sliderDays = $settings && isset($settings->slider_days) ? (int) $settings->slider_days : 7;

        return $this->success([
            'sliders' => $sliders,
            'slider_price' => $sliderPrice,
            'slider_days' => $sliderDays
        ], 'Seller sliders retrieved successfully');
    }

    /**
     * Upload/create a new slider advertisement
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi,webm|max:51200', // max 50MB for video support
            'link' => 'nullable',
        ]);

        $seller = $request->user();
        $file = $request->file('image');
        
        $data = [
            'seller_id' => $seller->id,
            'is_paid' => 0,
            'link' => $request->link,
        ];

        if ($file) {
            $mime = $file->getMimeType();
            $ext  = strtolower($file->getClientOriginalExtension());

            if (str_starts_with($mime, 'video/')) {
                $data['type']  = 'video';
                $data['video'] = $this->uploadFile($file, 'sliders');
                $data['name']  = '';
            } elseif ($ext === 'gif' || $mime === 'image/gif') {
                $data['type'] = 'gif';
                $data['name'] = $this->uploadFile($file, 'sliders');
            } else {
                $data['type'] = 'image';
                $data['name'] = $this->uploadFile($file, 'sliders');
            }
        }

        $slider = Slider::create($data);

        return $this->success($slider, 'Slider created successfully. Proceed to payment.');
    }

    /**
     * Initiate Payzah payment for the slider
     */
    public function pay(Request $request, $id)
    {
        $seller = $request->user();
        $slider = Slider::where('seller_id', $seller->id)->findOrFail($id);

        if ($slider->is_paid) {
            return $this->failed(null, 'This slider has already been paid for.');
        }

        // Get the slider price
        $settings = AboutUs::first();
        $amount = $settings ? (float) $settings->slider_price : 10.00;

        // Generate track id
        $trackid = 'SELLERMINISLIDER' . $slider->id . 'T' . time();

        $lang = $request->header('Lang') ?? 'en';

        // Payment payload
        $payload = [
            "trackid" => $trackid,
            "amount" => $amount,
            "success_url" => route('seller.slider_payment.success', ['trackid' => $trackid]),
            "error_url" => route('seller.slider_payment.fail', ['trackid' => $trackid]),
            "currency" => "KWD",
            "language" => $lang,
            "payment_type" => "1", // standard Payment Type
            "udf1" => (string) $seller->id,
            "udf2" => (string) $slider->id,
        ];

        Log::info('Initiating slider payment for seller ' . $seller->id . ', slider ' . $slider->id, $payload);

        $paymentResponse = $this->payzahService->initiatePayment($payload);

        // Store payment response reference
        $slider->update([
            'payment_details' => json_encode($paymentResponse),
        ]);

        return response()->json($paymentResponse);
    }

    /**
     * Payzah successful payment callback
     */
    public function paymentSuccess(Request $request)
    {
        $trackid = $request->get('trackid');
        Log::info('Slider payment callback success: ' . $trackid, $request->all());

        $sliderId = null;
        if ($trackid && preg_match('/^SELLERMINISLIDER(\d+)T\d+$/', $trackid, $matches)) {
            $sliderId = $matches[1];
        }

        if ($sliderId) {
            $slider = Slider::find($sliderId);
            if ($slider) {
                // Verify payment status with Payzah
                $verification = $this->payzahService->verifyPayment(['trackid' => $trackid]);
                Log::info('Payzah Slider Payment verification: ', $verification);

                // Get dynamic slider duration
                $settings = AboutUs::first();
                $days = $settings && isset($settings->slider_days) ? (int)$settings->slider_days : 7;

                $slider->update([
                    'is_paid' => 1,
                    'start_date' => now(),
                    'end_date' => now()->addDays($days),
                    'payment_details' => json_encode(array_merge(
                        json_decode($slider->payment_details, true) ?? [],
                        $verification,
                        ['callback_data' => $request->all()]
                    ))
                ]);
            }
        }

        // Get dynamic slider duration for response message
        $settings = AboutUs::first();
        $days = $settings && isset($settings->slider_days) ? (int)$settings->slider_days : 7;

        $title = "Payment Successful | الدفع ناجح";
        $message = "Slider ad payment completed successfully. Your slide will be shown on the homepage for {$days} days.";
        $messageAr = "تم دفع السلايدر بنجاح. سيتم عرض إعلانك على الصفحة الرئيسية لمدة {$days} أيام.";

        return $this->renderHtmlResponse(true, $title, $message, $messageAr);
    }

    /**
     * Payzah failed payment callback
     */
    public function paymentFail(Request $request)
    {
        $trackid = $request->get('trackid');
        Log::warning('Slider payment callback failed: ' . $trackid, $request->all());

        $sliderId = null;
        if ($trackid && preg_match('/^SELLERMINISLIDER(\d+)T\d+$/', $trackid, $matches)) {
            $sliderId = $matches[1];
        }

        if ($sliderId) {
            $slider = Slider::find($sliderId);
            if ($slider) {
                $slider->update([
                    'payment_details' => json_encode(array_merge(
                        json_decode($slider->payment_details, true) ?? [],
                        ['callback_data' => $request->all()]
                    ))
                ]);
            }
        }

        $title = "Payment Failed | فشل الدفع";
        $message = "Slider payment failed. Please try again from the application.";
        $messageAr = "فشلت عملية دفع السلايدر. يرجى المحاولة مرة أخرى من التطبيق.";

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
