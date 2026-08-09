<?php

namespace App\Traits;

use App\Exceptions\ArriveWhatsException;
use App\Services\ArriveWhatsService;
use Illuminate\Support\Facades\Log;

trait SendSmsTrait
{
    public function sendSmsWhatsApp(
        string $phone,
        string|int $otp,
        ?string $countryCode = null
    ): array {
        try {
            $data = app(ArriveWhatsService::class)->send(
                $phone,
                'Your OTP is: '.(string) $otp,
                $countryCode
            );

            return [
                'success' => true,
                'data' => $data,
            ];
        } catch (ArriveWhatsException $e) {
            Log::warning('Arrive Whats OTP delivery failed.', [
                'flow' => 'seller_auth',
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'error' => 'Unable to send OTP. Please try again.',
            ];
        }
    }
}
