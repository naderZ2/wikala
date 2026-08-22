<?php

namespace App\Http\Controllers\Client\Auth;

use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use Illuminate\Support\Carbon;
use App\Models\ConfirmationCodes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\CheckPhoneExists;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Client\Password\CheckRequest;

class ResetPasswordController extends Controller
{
    use ResponsesTrait;
    public function __construct()
    {
        $this->model="App\Models\User";
    }

    public function editPassword(CheckRequest $request){
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return $this->failed(null,trans('lang.Incorrect_old_password'));
        } 
        
        $newPassword = $request->input('new_password') ?? $request->input('password');
        auth()->user()->update(['password' => $newPassword]);
        
        return $this->success(null,trans('lang.password_changed'));
    }

    public function resetPassword(ResetPasswordRequest $request){
        $phoneCandidates = $this->model::phoneCandidates(
            $request->phone,
            $request->input('country_code')
        );

        $confirmationCode = ConfirmationCodes::whereIn('phone', $phoneCandidates)
            ->orderByDESC('id')
            ->first();

        if (
            ! $confirmationCode
            || (int) $confirmationCode->active !== 1
            || ! hash_equals(
                (string) $confirmationCode->code,
                (string) $request->otpCode
            )
        ) {
            return $this->failed(null,trans('lang.wrong_otp_number') );
        }

        $expiryMinutes = max(
            1,
            (int) config('services.arrive_whats.otp_expiry_minutes', 5)
        );

        if ($confirmationCode->created_at->copy()->addMinutes($expiryMinutes)->isPast()) {
            $confirmationCode->update(['active' => 0]);

            return $this->failed(null, trans('lang.otp_expired'));
        }

        \DB::transaction(function () use ($request, $confirmationCode, $phoneCandidates): void {
            $this->model::whereIn('phone', $phoneCandidates)
                ->firstOrFail()
                ->update(['password' => $request->password]);

            ConfirmationCodes::whereIn('phone', $phoneCandidates)->update(['active'=>0]);
        });

        return $this->success(null,trans('lang.new_password_created'));
    }

}
