<?php

namespace App\Services;

use App\Exceptions\ArriveWhatsException;
use App\Models\AboutUs;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Throwable;

class ArriveWhatsService
{
    public function defaultCountryCode(): string
    {
        return $this->credentials()['default_country_code'];
    }

    /**
     * Send a text message through Arrive Whats.
     *
     * @throws \App\Exceptions\ArriveWhatsException
     */
    public function send(string $phone, string $message, ?string $countryCode = null): array
    {
        $credentials = $this->credentials();

        if ($credentials['token'] === '') {
            throw new ArriveWhatsException('WhatsApp delivery is not configured.');
        }

        $receiver = $this->normalizePhoneNumber(
            $phone,
            $countryCode ?: $credentials['default_country_code']
        );

        if ($receiver === '') {
            throw new ArriveWhatsException('A valid WhatsApp receiver is required.');
        }

        try {
            $response = Http::asForm()
                ->acceptJson()
                ->connectTimeout((int) config('services.arrive_whats.connect_timeout', 5))
                ->timeout((int) config('services.arrive_whats.timeout', 15))
                ->retry(
                    3,
                    250,
                    function (Throwable $exception, PendingRequest $request): bool {
                        if ($exception instanceof ConnectionException) {
                            return true;
                        }

                        if ($exception instanceof RequestException && $exception->response) {
                            return $exception->response->serverError()
                                || $exception->response->status() === 429;
                        }

                        return false;
                    },
                    false
                )
                ->post($credentials['base_url'].'/send', [
                    'token' => $credentials['token'],
                    'receiver' => $receiver,
                    'msgtext' => $message,
                ]);
        } catch (Throwable $exception) {
            // Do not retain the HTTP exception: it may contain the form body,
            // including the provider token and message text.
            throw new ArriveWhatsException('WhatsApp delivery failed.');
        }

        $payload = $response->json();
        $providerAccepted = is_array($payload)
            && filter_var($payload['status'] ?? false, FILTER_VALIDATE_BOOLEAN);

        if (! $response->successful() || ! $providerAccepted) {
            throw new ArriveWhatsException('WhatsApp delivery failed.');
        }

        return $payload;
    }

    /**
     * Send a receipt/invoice to the configured receipt phone, or to the
     * supplied customer phone when no dedicated receiver is configured.
     *
     * @throws \App\Exceptions\ArriveWhatsException
     */
    public function sendReceipt(
        string $customerPhone,
        string $message,
        ?string $customerCountryCode = null
    ): array {
        $credentials = $this->credentials();
        $receiptPhone = $credentials['receipt_phone'];

        return $this->send(
            $receiptPhone !== '' ? $receiptPhone : $customerPhone,
            $message,
            $receiptPhone !== '' ? $credentials['default_country_code'] : $customerCountryCode
        );
    }

    /**
     * Normalize a local or international number to digits-only international
     * format. A leading local trunk zero is removed before adding the received
     * country calling code.
     */
    public function normalizePhoneNumber(?string $phone, ?string $countryCode = null): string
    {
        $rawPhone = trim((string) $phone);

        if ($rawPhone === '') {
            return '';
        }

        $isExplicitlyInternational = str_starts_with($rawPhone, '+')
            || str_starts_with($rawPhone, '00');

        $phoneDigits = preg_replace('/\D+/', '', $rawPhone) ?? '';

        if (str_starts_with($rawPhone, '00')) {
            $phoneDigits = substr($phoneDigits, 2);
        }

        if ($isExplicitlyInternational) {
            return $phoneDigits;
        }

        $rawCountryCode = trim(
            (string) ($countryCode ?: $this->credentials()['default_country_code'])
        );
        $countryDigits = preg_replace('/\D+/', '', $rawCountryCode) ?? '';

        if (str_starts_with($rawCountryCode, '00')) {
            $countryDigits = substr($countryDigits, 2);
        }

        if ($countryDigits === '') {
            return $phoneDigits;
        }

        if (str_starts_with($phoneDigits, $countryDigits)) {
            return $phoneDigits;
        }

        $localNumber = preg_replace('/^0+/', '', $phoneDigits) ?? $phoneDigits;

        return $countryDigits.$localNumber;
    }

    /**
     * Resolve settings for every call so admin database changes take effect on
     * the next request even when Laravel's configuration is cached.
     */
    private function credentials(): array
    {
        $settings = null;

        try {
            $settings = AboutUs::query()->first();
        } catch (Throwable) {
            // Fresh installs may call the service before the settings migration.
        }

        return [
            'base_url' => rtrim(
                $this->databaseValue($settings, 'arrive_whats_base_url')
                    ?: (string) config('services.arrive_whats.base_url'),
                '/'
            ),
            'token' => (string) (
                $this->databaseValue($settings, 'arrive_whats_token')
                    ?: config('services.arrive_whats.token', '')
            ),
            'default_country_code' => (string) (
                $this->databaseValue($settings, 'arrive_whats_default_country_code')
                    ?: config('services.arrive_whats.default_country_code', '965')
            ),
            'receipt_phone' => (string) (
                $this->databaseValue($settings, 'arrive_whats_receipt_phone')
                    ?: config('services.arrive_whats.receipt_phone', '')
            ),
        ];
    }

    private function databaseValue(?AboutUs $settings, string $attribute): mixed
    {
        if (! $settings || ! array_key_exists($attribute, $settings->getAttributes())) {
            return null;
        }

        $value = $settings->getAttribute($attribute);

        return is_string($value) ? trim($value) : $value;
    }
}
