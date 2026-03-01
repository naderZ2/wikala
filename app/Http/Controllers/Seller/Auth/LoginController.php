<?php

namespace App\Http\Controllers\Seller\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\ConfirmationCode;
use App\Traits\ResponsesTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Seller\Auth\LoginRequest;
use App\Http\Requests\Seller\Auth\RegisterRequest;

class LoginController extends Controller
{
    use ResponsesTrait;

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

        // Attach category
        if ($request->category_id) {
            $seller->categories()->sync([$request->category_id]);
        }

        // Generate OTP
        $code = rand(1000, 9999);
        \DB::table('confirmation_codes')->insert([
            'phone' => $request->phone,
            'code' => $code,
            'active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $this->success([
            'seller_id' => $seller->id,
            'otp_code' => $code, // Remove in production, send via WhatsApp instead
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

        $verification = \DB::table('confirmation_codes')
            ->where('phone', $request->phone)
            ->where('code', $request->code)
            ->where('active', 1)
            ->latest('created_at')
            ->first();

        if (!$verification) {
            return $this->failed(null, 'Invalid or expired OTP code');
        }

        // Mark code as used
        \DB::table('confirmation_codes')
            ->where('id', $verification->id)
            ->update(['active' => 0, 'updated_at' => now()]);

        return $this->success(null, 'Phone number verified successfully');
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
