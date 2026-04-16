<?php

namespace App\Http\Controllers\Seller\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\ConfirmationCodes;
use App\Traits\ResponsesTrait;
use App\Traits\SendSmsTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Http\Requests\Seller\Auth\LoginRequest;
use App\Http\Requests\Seller\Auth\RegisterRequest;

class LoginController extends Controller
{
    use ResponsesTrait, SendSmsTrait;

    /**
     * Login with phone + password → return Passport token
     */
    public function login(LoginRequest $request)
    {
        $seller = Seller::where('phone', $request->phone)->first();

        if (!$seller || !Hash::check($request->password, $seller->password)) {
            return $this->failed(null, 'Invalid phone or password');
        }

        if (!$seller->active) {
            return $this->failed(null, 'Your account is under review by admin');
        }

        $token = $seller->createToken('seller-token')->accessToken;

        
        return $this->success([
            'token' => $token,
            'seller' => $seller
        ], 'Login successful');
    }

    /**
     * Register a new seller
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->only([
            'name', 'phone', 'password',
            'shop_name_en', 'shop_name_ar'
        ]);

        // Use phone as email placeholder if no email provided
        $data['email'] = $request->email ?? $request->phone . '@seller.e-expo.com';
        $data['active'] = false; // Admin must approve

        $seller = Seller::create($data);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $seller->img_path = $request->file('logo');
            $seller->save();
        }

        // Handle banner upload
        if ($request->hasFile('banner')) {
            $path = $request->file('banner')->store('uploads/banners', 'public');
            $seller->banner = $path;
            $seller->save();
        }

        // Attach categories (max 3)
        if ($request->categories) {
            $seller->categories()->sync(array_slice($request->categories, 0, 3));
        } elseif ($request->category_id) {
            $seller->categories()->sync([$request->category_id]);
        }

        // Generate OTP
        $code = rand(1000, 9999);
        ConfirmationCodes::create([
            'phone' => $request->phone,
            'code' => $code,
        ]);

        // Send OTP via WhatsApp
        $phone =  $request->phone;
        $this->sendSmsWhatsApp($phone, $code);

        return $this->success([
            'seller_id' => $seller->id,
            'otp_code' => $code, // Remove in production
        ], 'Registration successful. Please verify your phone number.');
    }

    /**
     * Verify OTP code
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'code' => 'required|string',
        ]);

        $verification = ConfirmationCodes::where('phone', $request->phone)
            ->where('code', $request->code)
            ->where('active', 1)
            ->orderByDesc('id')
            ->first();

        if (!$verification) {
            return $this->failed(null, 'Invalid or expired OTP code');
        }

        // Check if OTP is expired (5 minutes)
        if ($verification->created_at->addMinutes(5) < Carbon::now()) {
            return $this->failed(null, 'OTP code has expired');
        }

        // Mark code as used
        $verification->update(['active' => 0]);

        return $this->success(null, 'Phone number verified successfully');
    }

    /**
     * Forgot Password - Send OTP to seller phone
     */
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
        ]);

        $seller = Seller::where('phone', $request->phone)->first();

        if (!$seller) {
            return $this->failed(null, 'No seller account found with this phone number');
        }

        // Generate OTP
        $code = rand(1111, 9999);
        ConfirmationCodes::create([
            'phone' => $request->phone,
            'code' => $code,
        ]);

        // Send OTP via WhatsApp
        $phone =  $request->phone;
        $res = $this->sendSmsWhatsApp($phone, $code);

        if (isset($res['data']) && $res['data']['status'] == 'error') {
            return $this->failed(null, $res['data']['message']);
        }

        return $this->success([
            'otp_code' => $code, // Remove in production
        ], 'OTP sent successfully to your phone');
    }

    /**
     * Reset Password - Verify OTP and set new password
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'code' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $confirmationCode = ConfirmationCodes::where('phone', $request->phone)
            ->orderByDesc('id')
            ->first();

        if (!$confirmationCode || $confirmationCode->code != $request->code || $confirmationCode->active == 0) {
            return $this->failed(null, 'Invalid or expired OTP code');
        }

        // Check if OTP is expired (5 minutes)
        if ($confirmationCode->created_at->addMinutes(5) < Carbon::now()) {
            return $this->failed(null, 'OTP code has expired');
        }

        $seller = Seller::where('phone', $request->phone)->first();

        if (!$seller) {
            return $this->failed(null, 'No seller account found with this phone number');
        }

        $seller->update(['password' => $request->password]);

        // Mark code as used
        $confirmationCode->update(['active' => 0]);

        return $this->success(null, 'Password reset successfully');
    }

    /**
     * Resend OTP - for both registration and forgot password
     */
    public function resendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'type' => 'required|string|in:register,forgot_password',
        ]);

        // For forgot_password, check seller exists
        if ($request->type === 'forgot_password') {
            $seller = Seller::where('phone', $request->phone)->first();
            if (!$seller) {
                return $this->failed(null, 'No seller account found with this phone number');
            }
        }

        // Deactivate old OTP codes for this phone
        ConfirmationCodes::where('phone', $request->phone)
            ->where('active', 1)
            ->update(['active' => 0]);

        // Generate new OTP
        $code = rand(1111, 9999);
        ConfirmationCodes::create([
            'phone' => $request->phone,
            'code' => $code,
        ]);

        // Send OTP via WhatsApp
        $phone =  $request->phone;
        $res = $this->sendSmsWhatsApp($phone, $code);

        if (isset($res['data']) && $res['data']['status'] == 'error') {
            return $this->failed(null, $res['data']['message']);
        }

        return $this->success([
            'otp_code' => $code, // Remove in production
        ], 'OTP resent successfully');
    }

    /**
     * Logout - revoke token
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return $this->success(null, 'Logged out successfully');
    }
}
