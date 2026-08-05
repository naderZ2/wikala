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
        $seller = Seller::where('phone', $request->phone)->first();

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

        if (! $this->sendAndStoreOtp(
            $request->phone,
            $request->country_code
        )) {
            return $this->failed(null, 'Unable to send OTP. Please try again.');
        }

        return $this->success([
            'seller_id' => $seller->id,
            'channel' => 'whatsapp',
            'expires_in' => $this->otpExpiryMinutes() * 60,
        ], 'Registration successful. Please verify your phone number.');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'country_code' => ['sometimes', 'nullable', 'string', 'regex:/^\+?[0-9]{1,6}$/'],
            'code' => 'required|string',
        ]);
        $phone = $this->normalizePhone($request);
        $verification = ConfirmationCodes::where('phone', $phone)
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
        $phone = $this->normalizePhone($request);

        if (! Seller::where('phone', $phone)->exists()) {
            return $this->failed(null, 'No seller account found with this phone number');
        }

        if (! $this->sendAndStoreOtp($phone, $request->country_code)) {
            return $this->failed(null, 'Unable to send OTP. Please try again.');
        }

        return $this->success([
            'channel' => 'whatsapp',
            'expires_in' => $this->otpExpiryMinutes() * 60,
        ], 'OTP sent successfully to your phone');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'country_code' => ['sometimes', 'nullable', 'string', 'regex:/^\+?[0-9]{1,6}$/'],
            'code' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $phone = $this->normalizePhone($request);
        $confirmationCode = ConfirmationCodes::where('phone', $phone)
            ->orderByDesc('id')
            ->first();

        if (! $this->otpMatches($confirmationCode, $request->code)) {
            return $this->failed(null, 'Invalid or expired OTP code');
        }

        if ($this->otpExpired($confirmationCode)) {
            $confirmationCode->update(['active' => 0]);

            return $this->failed(null, 'OTP code has expired');
        }

        $seller = Seller::where('phone', $phone)->first();

        if (! $seller) {
            return $this->failed(null, 'No seller account found with this phone number');
        }

        DB::transaction(function () use ($seller, $request, $confirmationCode): void {
            $seller->update(['password' => $request->password]);
            $confirmationCode->update(['active' => 0]);
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
        $phone = $this->normalizePhone($request);

        if (
            $request->type === 'forgot_password'
            && ! Seller::where('phone', $phone)->exists()
        ) {
            return $this->failed(null, 'No seller account found with this phone number');
        }

        if (! $this->sendAndStoreOtp($phone, $request->country_code)) {
            return $this->failed(null, 'Unable to send OTP. Please try again.');
        }

        return $this->success([
            'channel' => 'whatsapp',
            'expires_in' => $this->otpExpiryMinutes() * 60,
        ], 'OTP resent successfully');
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return $this->success(null, 'Logged out successfully');
    }

    private function sendAndStoreOtp(
        string $phone,
        ?string $countryCode = null
    ): bool {
        $code = (string) random_int(1000, 9999);
        $result = $this->sendSmsWhatsApp($phone, $code, $countryCode);

        if (! $result['success']) {
            return false;
        }

        DB::transaction(function () use ($phone, $code): void {
            ConfirmationCodes::where('phone', $phone)
                ->where('active', 1)
                ->update(['active' => 0]);
            ConfirmationCodes::create([
                'phone' => $phone,
                'code' => $code,
                'active' => 1,
            ]);
        });

        return true;
    }

    private function normalizePhone(Request $request): string
    {
        if (! $request->filled('country_code')) {
            return trim((string) $request->phone);
        }

        return app(ArriveWhatsService::class)->normalizePhoneNumber(
            $request->phone,
            $request->country_code
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
