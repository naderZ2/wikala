<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Auth\LoginRequest;
use App\Http\Requests\Seller\Auth\RegisterRequest;
use App\Models\ConfirmationCodes;
use App\Models\Seller;
use App\Services\ArriveWhatsService;
use App\Traits\ResponsesTrait;
use App\Traits\SendSmsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ResponsesTrait, SendSmsTrait;

    public function login(LoginRequest $request)
    {
        $phoneCandidates = Seller::phoneCandidates($request->phone, $request->country_code);
        $seller = Seller::whereIn('phone', $phoneCandidates)->first();

        if (! $seller || ! Hash::check($request->password, $seller->password)) {
            return $this->failed(null, 'Invalid phone or password');
        }

        $mainSeller = $seller->parent_id ? $seller->parent : $seller;

        if (! $mainSeller || $mainSeller->payment_status !== 'paid') {
            return $this->failed([
                'payment_pending' => true,
                'seller_id' => $seller->id,
            ], 'Payment pending. Please select a plan and pay to complete registration.');
        }

        if (! $seller->active) {
            return $this->failed(null, 'Your account is under review by admin');
        }

        return $this->success([
            'token' => $seller->createToken('seller-token')->accessToken,
            'seller' => $seller,
        ], 'Login successful');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->only([
            'name',
            'email',
            'phone',
            'password',
            'shop_name_en',
            'shop_name_ar',
            'plan_id',
        ]);
        $data['email'] = $request->email ?? $request->phone.'@seller.e-expo.com';
        $data['active'] = false;

        $seller = Seller::create($data);

        foreach ([
            'logo' => 'img_path',
            'banner' => 'banner',
            'civil_id_image' => 'civil_id_image',
            'commercial_license_image' => 'commercial_license_image',
        ] as $input => $attribute) {
            if ($request->hasFile($input)) {
                $seller->{$attribute} = $request->file($input);
            }
        }
        $seller->save();

        if ($request->categories) {
            $seller->categories()->sync(array_slice($request->categories, 0, 3));
        } elseif ($request->category_id) {
            $seller->categories()->sync([$request->category_id]);
        }

        $otpResult = $this->sendAndStoreOtp(
            $request->phone,
            $request->country_code
        );

        $responseData = [
            'seller_id' => $seller->id,
            'channel' => 'whatsapp',
            'expires_in' => $this->otpExpiryMinutes() * 60,
            'otp' => $otpResult['otp'] ?? null,
            'otp_sent' => $otpResult['success'] ?? false,
        ];

        if (! empty($otpResult['error'])) {
            $responseData['otp_error'] = $otpResult['error'];
        }

        return $this->success(
            $responseData,
            'Registration successful. Please verify your phone number.'
        );
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'country_code' => ['sometimes', 'nullable', 'string', 'regex:/^\+?[0-9]{1,6}$/'],
            'code' => 'required|string',
        ]);
        $phoneCandidates = Seller::phoneCandidates($request->phone, $request->country_code);
        $verification = ConfirmationCodes::whereIn('phone', $phoneCandidates)
            ->where('active', 1)
            ->orderByDesc('id')
            ->first();

        if (! $this->otpMatches($verification, $request->code)) {
            return $this->failed(null, 'Invalid or expired OTP code');
        }

        if ($this->otpExpired($verification)) {
            $verification->update(['active' => 0]);

            return $this->failed(null, 'OTP code has expired');
        }

        $verification->update(['active' => 0]);

        return $this->success(null, 'Phone number verified successfully');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'country_code' => ['sometimes', 'nullable', 'string', 'regex:/^\+?[0-9]{1,6}$/'],
        ]);
        $phoneCandidates = Seller::phoneCandidates($request->phone, $request->country_code);
        $phone = $this->normalizePhone($request);

        if (! Seller::whereIn('phone', $phoneCandidates)->exists()) {
            return $this->failed(null, 'No seller account found with this phone number');
        }

        $otpResult = $this->sendAndStoreOtp($phone, $request->country_code);

        $responseData = [
            'channel' => 'whatsapp',
            'expires_in' => $this->otpExpiryMinutes() * 60,
            'otp' => $otpResult['otp'] ?? null,
            'otp_sent' => $otpResult['success'] ?? false,
        ];

        if (! empty($otpResult['error'])) {
            $responseData['otp_error'] = $otpResult['error'];
        }

        return $this->success(
            $responseData,
            'OTP sent successfully to your phone'
        );
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'country_code' => ['sometimes', 'nullable', 'string', 'regex:/^\+?[0-9]{1,6}$/'],
            'code' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $phoneCandidates = Seller::phoneCandidates($request->phone, $request->country_code);
        $confirmationCode = ConfirmationCodes::whereIn('phone', $phoneCandidates)
            ->orderByDesc('id')
            ->first();

        if (! $this->otpMatches($confirmationCode, $request->code)) {
            return $this->failed(null, 'Invalid or expired OTP code');
        }

        if ($this->otpExpired($confirmationCode)) {
            $confirmationCode->update(['active' => 0]);

            return $this->failed(null, 'OTP code has expired');
        }

        $seller = Seller::whereIn('phone', $phoneCandidates)->first();

        if (! $seller) {
            return $this->failed(null, 'No seller account found with this phone number');
        }

        DB::transaction(function () use ($seller, $request, $confirmationCode, $phoneCandidates): void {
            $seller->update(['password' => $request->password]);
            ConfirmationCodes::whereIn('phone', $phoneCandidates)->update(['active' => 0]);
        });

        return $this->success(null, 'Password reset successfully');
    }

    public function resendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'country_code' => ['sometimes', 'nullable', 'string', 'regex:/^\+?[0-9]{1,6}$/'],
            'type' => 'required|string|in:register,forgot_password',
        ]);
        $phoneCandidates = Seller::phoneCandidates($request->phone, $request->country_code);
        $phone = $this->normalizePhone($request);

        if (
            $request->type === 'forgot_password'
            && ! Seller::whereIn('phone', $phoneCandidates)->exists()
        ) {
            return $this->failed(null, 'No seller account found with this phone number');
        }

        $otpResult = $this->sendAndStoreOtp($phone, $request->country_code);

        $responseData = [
            'channel' => 'whatsapp',
            'expires_in' => $this->otpExpiryMinutes() * 60,
            'otp' => $otpResult['otp'] ?? null,
            'otp_sent' => $otpResult['success'] ?? false,
        ];

        if (! empty($otpResult['error'])) {
            $responseData['otp_error'] = $otpResult['error'];
        }

        return $this->success(
            $responseData,
            'OTP resent successfully'
        );
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return $this->success(null, 'Logged out successfully');
    }

    private function sendAndStoreOtp(
        string $phone,
        ?string $countryCode = null
    ): array {
        $phoneCandidates = Seller::phoneCandidates($phone, $countryCode);
        $normalizedPhone = app(ArriveWhatsService::class)->normalizePhoneNumber($phone, $countryCode);
        $code = (string) random_int(1000, 9999);
        $result = $this->sendSmsWhatsApp($normalizedPhone, $code, $countryCode);

        DB::transaction(function () use ($phoneCandidates, $normalizedPhone, $code): void {
            ConfirmationCodes::whereIn('phone', $phoneCandidates)
                ->where('active', 1)
                ->update(['active' => 0]);
            ConfirmationCodes::create([
                'phone' => $normalizedPhone,
                'code' => $code,
                'active' => 1,
            ]);
        });

        return [
            'success' => $result['success'] ?? false,
            'otp' => $code,
            'error' => ! empty($result['success']) ? null : ($result['error'] ?? 'Unable to send OTP'),
            'data' => $result['data'] ?? null,
        ];
    }

    private function normalizePhone(Request $request): string
    {
        return app(ArriveWhatsService::class)->normalizePhoneNumber(
            $request->phone,
            $request->input('country_code')
        );
    }

    private function otpMatches(
        ?ConfirmationCodes $confirmationCode,
        mixed $submittedCode
    ): bool {
        return $confirmationCode
            && (int) $confirmationCode->active === 1
            && hash_equals(
                (string) $confirmationCode->code,
                (string) $submittedCode
            );
    }

    private function otpExpired(ConfirmationCodes $confirmationCode): bool
    {
        return $confirmationCode->created_at
            ->copy()
            ->addMinutes($this->otpExpiryMinutes())
            ->isPast();
    }

    private function otpExpiryMinutes(): int
    {
        return max(
            1,
            (int) config('services.arrive_whats.otp_expiry_minutes', 5)
        );
    }
}
