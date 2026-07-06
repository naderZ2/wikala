<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\AboutUs;
use App\Services\PayzahService;
use App\Traits\ResponsesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    use ResponsesTrait;

    protected $payzahService;

    public function __construct(PayzahService $payzahService)
    {
        $this->payzahService = $payzahService;
    }

    /**
     * List all banners uploaded by the logged-in seller
     */
    public function index(Request $request)
    {
        $this->lang();
        $seller = $request->user();

        $banners = Banner::where('seller_id', $seller->id)
            ->with(['category' => function($q) {
                $q->select('id', $this->name);
            }])
            ->latest()
            ->get();

        // Get the current banner price configured by the admin
        $settings = AboutUs::first();
        $bannerPrice = $settings ? (float) $settings->banner_price : 10.00;

        return $this->success([
            'banners' => $banners,
            'banner_price' => $bannerPrice
        ], 'Seller banners retrieved successfully');
    }

    /**
     * Upload/create a new banner
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // max 5MB
            'category_id' => 'nullable|exists:categories,id',
            'type' => 'sometimes|string|in:banner,slider',
        ]);

        $seller = $request->user();

        $banner = Banner::create([
            'name' => $request->file('image'), // FileUploadTrait triggers setNameAttribute
            'category_id' => $request->category_id,
            'seller_id' => $seller->id,
            'is_paid' => 0,
            'type' => $request->type ?? 'banner',
        ]);

        return $this->success($banner, 'Banner created successfully. Proceed to payment.');
    }

    /**
     * Initiate Payzah payment for the banner
     */
    public function pay(Request $request, $id)
    {
        $seller = $request->user();
        $banner = Banner::where('seller_id', $seller->id)->findOrFail($id);

        if ($banner->is_paid) {
            return $this->failed(null, 'This banner has already been paid for.');
        }

        // Get the banner price
        $settings = AboutUs::first();
        $amount = $settings ? (float) $settings->banner_price : 10.00;

        // Generate track id
        $trackid = 'SELLERBANNER' . $banner->id . 'T' . time();

        $lang = $request->header('Lang') ?? 'en';

        // Payment payload
        $payload = [
            "trackid" => $trackid,
            "amount" => $amount,
            "success_url" => route('seller.banner_payment.success', ['trackid' => $trackid]),
            "error_url" => route('seller.banner_payment.fail', ['trackid' => $trackid]),
            "currency" => "KWD",
            "language" => $lang,
            "payment_type" => "1", // standard Payment Type
            "udf1" => (string) $seller->id,
            "udf2" => (string) $banner->id,
        ];

        Log::info('Initiating banner payment for seller ' . $seller->id . ', banner ' . $banner->id, $payload);

        $paymentResponse = $this->payzahService->initiatePayment($payload);

        // Store payment response reference
        $banner->update([
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
        Log::info('Banner payment callback success: ' . $trackid, $request->all());

        $bannerId = null;
        if ($trackid && preg_match('/^SELLERBANNER(\d+)T\d+$/', $trackid, $matches)) {
            $bannerId = $matches[1];
        }

        if ($bannerId) {
            $banner = Banner::find($bannerId);
            if ($banner) {
                // Verify payment status with Payzah
                $verification = $this->payzahService->verifyPayment(['trackid' => $trackid]);
                Log::info('Payzah Banner Payment verification: ', $verification);

                $banner->update([
                    'is_paid' => 1,
                    'start_date' => now(),
                    'end_date' => now()->addDays(7),
                    'payment_details' => json_encode(array_merge(
                        json_decode($banner->payment_details, true) ?? [],
                        $verification,
                        ['callback_data' => $request->all()]
                    ))
                ]);
            }
        }

        $title = "Payment Successful | الدفع ناجح";
        $message = "Banner payment completed successfully. Your banner will be shown on the home page for 7 days.";
        $messageAr = "تم دفع الإعلان بنجاح. سيتم عرض إعلانك على الصفحة الرئيسية لمدة 7 أيام.";

        return $this->renderHtmlResponse(true, $title, $message, $messageAr);
    }

    /**
     * Payzah failed payment callback
     */
    public function paymentFail(Request $request)
    {
        $trackid = $request->get('trackid');
        Log::warning('Banner payment callback failed: ' . $trackid, $request->all());

        $bannerId = null;
        if ($trackid && preg_match('/^SELLERBANNER(\d+)T\d+$/', $trackid, $matches)) {
            $bannerId = $matches[1];
        }

        if ($bannerId) {
            $banner = Banner::find($bannerId);
            if ($banner) {
                $banner->update([
                    'payment_details' => json_encode(array_merge(
                        json_decode($banner->payment_details, true) ?? [],
                        ['callback_data' => $request->all()]
                    ))
                ]);
            }
        }

        $title = "Payment Failed | فشل الدفع";
        $message = "Banner payment failed. Please try again from the application.";
        $messageAr = "فشلت عملية دفع الإعلان. يرجى المحاولة مرة أخرى من التطبيق.";

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
