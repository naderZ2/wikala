<?php

namespace App\Http\Controllers\Client\Auth;

use App\Exceptions\ArriveWhatsException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Client\CheckClientExistsRequest;
use App\Http\Requests\Client\CheckPhoneExists;
use App\Http\Requests\Client\CheckPhoneRequest;
use App\Models\ConfirmationCodes;
use App\Models\User;
use App\Services\ArriveWhatsService;
use App\Traits\ResponsesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserAuthController extends Controller
{
    use ResponsesTrait;

    public function checkClientExists(CheckClientExistsRequest $request)
    {
        $formattedPhone = User::formatPhoneNumber(
            $request->phone,
            $request->country_code
        );
        $user = User::where('phone', $formattedPhone)->first();

        if ($user) {
            return $this->failed(null, trans('lang.emailorphone'));
        }

        return $this->success();
    }

    public function register(
        RegisterRequest $request,
        ArriveWhatsService $arriveWhats
    ){
        $data = $request->validated();
        $countryCode = $request->input('country_code')
            ?: $arriveWhats->defaultCountryCode();
        $formattedPhone = $arriveWhats->normalizePhoneNumber(
            $request->phone,
            $countryCode
        );

        $data['phone'] = $formattedPhone;
        $data['country_code'] = preg_replace('/\D+/', '', (string) $countryCode);

        $user = User::withTrashed()
            ->where('phone', $formattedPhone)
            ->first();
        $confirmationCode = ConfirmationCodes::where('phone', $formattedPhone)
            ->orderByDesc('id')
            ->first();

        if ($user && is_null($user->deleted_at)) {
            return $this->failed(null, trans('lang.phoneExist'));
        }

        if (! $this->otpMatches($confirmationCode, $request->otpCode)) {
            return $this->failed(null, trans('lang.wrong_otp_number'));
        }

        if ($this->otpExpired($confirmationCode)) {
            $confirmationCode->update(['active' => 0]);

            return $this->failed(null, trans('lang.otp_expired'));
        }

        DB::transaction(function () use (&$user, $data, $confirmationCode): void {
            if ($user) {
                $data['deleted_at'] = null;
                $user->update($data);
            } else {
                $user = User::create($data);
            }

            $confirmationCode->update(['active' => 0]);
        });

        $user->token = $user->createToken('API Token')->accessToken;

        return $this->success($user);
    }

    public function login(LoginRequest $request)
    {
        $credentials = [
            'phone' => User::formatPhoneNumber(
                $request->phone,
                $request->country_code
            ),
            'password' => $request->password,
        ];

        if (! auth()->attempt($credentials)) {
            return $this->failed(
                null,
                trans('lang.wrong_username_or_password')
            );
        }

        $user = auth()->user();
        $user->update(['device_id' => $request->device_id]);
        $user->token = $user->createToken('API Token')->accessToken;
        $user->type = 1;

        return $this->success($user);
    }

    public function logout(Request $request)
    {
        if (auth()->user()) {
            auth()->user()->update(['device_id' => null]);
            auth()->user()->token()->revoke();
        }

        return $this->success(null, trans('logout_success'));
    }

    public function updateDeviceId(Request $request)
    {
        $request->validate(['device_id' => 'required|string']);
        auth()->user()->update(['device_id' => $request->device_id]);

        return $this->success(null, 'Device ID updated');
    }

    public function sendOtpPassword(
        CheckPhoneExists $request,
        ArriveWhatsService $arriveWhats
    ){
        return $this->deliverOtp(
            $request->phone,
            $request->country_code,
            $arriveWhats,
            'password_reset'
        );
    }

    public function sendOtpRegister(
        CheckPhoneRequest $request,
        ArriveWhatsService $arriveWhats
    ){
        return $this->deliverOtp(
            $request->phone,
            $request->country_code,
            $arriveWhats,
            'registration'
        );
    }

    private function deliverOtp(
        string $phone,
        ?string $countryCode,
        ArriveWhatsService $arriveWhats,
        string $flow
    ){
        $formattedPhone = $arriveWhats->normalizePhoneNumber(
            $phone,
            $countryCode
        );
        $code = (string) random_int(1000, 9999);

        try {
            $arriveWhats->send(
                $formattedPhone,
                "Your OTP is: {$code}",
                $countryCode
            );
        } catch (ArriveWhatsException $e) {
            Log::warning('Arrive Whats OTP delivery failed.', ['flow' => $flow, 'error' => $e->getMessage()]);

            return $this->failed(null, 'Unable to send OTP. Please try again.');
        }

        DB::transaction(function () use ($formattedPhone, $code): void {
            ConfirmationCodes::where('phone', $formattedPhone)
                ->where('active', 1)
                ->update(['active' => 0]);

            ConfirmationCodes::create([
                'phone' => $formattedPhone,
                'code' => $code,
                'active' => 1,
            ]);
        });

        return $this->success([
            'channel' => 'whatsapp',
            'expires_in' => $this->otpExpiryMinutes() * 60,
        ]);
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
