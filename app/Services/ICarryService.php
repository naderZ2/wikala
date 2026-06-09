<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Seller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class ICarryService
{
    protected string $baseUrl;
    protected string $email;
    protected string $password;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('services.icarry.base_url', 'https://test.icarry.com/api-frontend'), '/');
        $this->email = config('services.icarry.email', '');
        $this->password = config('services.icarry.password', '');
    }

    /**
     * Get token from Cache or authenticate to get a new one.
     *
     * @param bool $forceRefresh
     * @return string|null
     */
    public function getAuthToken(bool $forceRefresh = false): ?string
    {
        $cacheKey = 'icarry_api_token_' . md5($this->email);

        if ($forceRefresh) {
            Cache::forget($cacheKey);
        }

        return Cache::remember($cacheKey, now()->addHours(12), function () {
            $response = $this->authenticate();
            return $response['token'] ?? null;
        });
    }

    /**
     * Authenticate and return the raw response payload.
     *
     * @return array
     */
    public function authenticate(): array
    {
        $url = "{$this->baseUrl}/Authenticate/GetTokenForCustomerApi";

        Log::info('iCARRY API Authentication Request', [
            'url' => $url,
            'email' => $this->email,
        ]);

        try {
            $response = Http::post($url, [
                'Email' => $this->email,
                'Password' => $this->password,
            ]);

            Log::info('iCARRY API Authentication Response', [
                'status' => $response->status(),
                'body' => $response->json(),
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            return [];
        } catch (\Throwable $e) {
            Log::error('iCARRY API Authentication Exception', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return [];
        }
    }

    /**
     * Helper to make authorized HTTP requests.
     *
     * @param string $method
     * @param string $endpoint
     * @param array $data
     * @param array $queryParams
     * @return array
     */
    protected function request(string $method, string $endpoint, array $data = [], array $queryParams = []): array
    {
        $token = $this->getAuthToken();
        if (!$token) {
            // Try forcing a refresh once if token is missing
            $token = $this->getAuthToken(true);
            if (!$token) {
                Log::error('iCARRY API Request failed: Unable to obtain authentication token.');
                return [
                    'success' => false,
                    'error' => 'Authentication token missing.',
                ];
            }
        }

        $url = "{$this->baseUrl}/" . ltrim($endpoint, '/');

        Log::info("iCARRY API Request [{$method}]", [
            'url' => $url,
            'data' => $data,
            'queryParams' => $queryParams,
        ]);

        try {
            $client = Http::withToken($token);

            if (!empty($queryParams)) {
                $client = $client->withQueryParameters($queryParams);
            }

            $response = match (strtoupper($method)) {
                'GET'  => $client->get($url),
                'POST' => $client->post($url, $data),
                default => throw new \InvalidArgumentException("Unsupported HTTP method: {$method}"),
            };

            Log::info("iCARRY API Response [{$method}]", [
                'status' => $response->status(),
                'body' => $response->json() ?? $response->body(),
            ]);

            // If token has expired (typically returning 401 Unauthorized), refresh it and retry once
            if ($response->status() === 401) {
                Log::warning('iCARRY API returned 401 Unauthorized. Refreshing token and retrying...');
                $token = $this->getAuthToken(true);
                if ($token) {
                    $client = Http::withToken($token);
                    if (!empty($queryParams)) {
                        $client = $client->withQueryParameters($queryParams);
                    }
                    $response = match (strtoupper($method)) {
                        'GET'  => $client->get($url),
                        'POST' => $client->post($url, $data),
                    };

                    Log::info("iCARRY API Response (Retry) [{$method}]", [
                        'status' => $response->status(),
                        'body' => $response->json() ?? $response->body(),
                    ]);
                }
            }

            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'data' => $response->json(),
            ];

        } catch (\Throwable $e) {
            Log::error('iCARRY API Request Exception', [
                'endpoint' => $endpoint,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Estimate rates for Marketplace.
     *
     * @param array $data
     * @return array
     */
    public function estimateRates(array $data): array
    {
        return $this->request('POST', 'SmartwareShipment/EstimateRatesForMarketplace', $data);
    }

    /**
     * Create Order for Marketplace.
     *
     * @param array $data
     * @return array
     */
    public function createOrder(array $data): array
    {
        return $this->request('POST', 'SmartwareShipment/CreateOrderForMarketPlace', $data);
    }

    /**
     * Get all locations/warehouses.
     *
     * @return array
     */
    public function getLocations(): array
    {
        return $this->request('GET', 'Warehouse/GetAll');
    }

    /**
     * Create a new warehouse.
     *
     * @param array $data
     * @return array
     */
    public function createWarehouse(array $data): array
    {
        return $this->request('POST', 'Warehouse/createWarehouseForMarketPlace', $data);
    }

    /**
     * Track an order by tracking number.
     *
     * @param string $trackingNumber
     * @return array
     */
    public function trackOrder(string $trackingNumber): array
    {
        return $this->request('GET', 'SmartwareShipment/orderTracking', [], ['trackingNumber' => $trackingNumber]);
    }

    /**
     * Cancel an order by tracking number.
     *
     * @param string $trackingNumber
     * @return array
     */
    public function cancelOrder(string $trackingNumber): array
    {
        return $this->request('GET', 'SmartwareShipment/CancelOrder', [], ['trackingNumber' => $trackingNumber]);
    }

    /**
     * Create Merchant/Customer Account.
     *
     * @param array $data
     * @return array
     */
    public function createCustomer(array $data): array
    {
        return $this->request('POST', 'Customer/CreateMarchantAccountForECommerce', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | Order-aware helpers (map our Order/Seller models to iCarry payloads)
    |--------------------------------------------------------------------------
    */

    /**
     * Ensure the seller has an iCarry warehouse (pickup location).
     * Returns the warehouse name, lazily creating one in iCarry if missing.
     * Falls back to the global ICARRY_PICKUP_LOCATION when creation fails.
     */
    public function ensureWarehouseForSeller(Seller $seller): ?string
    {
        if (!empty($seller->icarry_warehouse_name)) {
            return $seller->icarry_warehouse_name;
        }

        $base = trim((string) ($seller->shop_name_en ?: $seller->shop_name_ar ?: $seller->name));
        if ($base === '') {
            $base = 'Seller';
        }
        // Suffix with the seller id to keep warehouse names unique in iCarry.
        $warehouseName = $base . ' #' . $seller->id;

        $city = $seller->cities()->first();
        $cityName = $city ? ($city->name_en ?? $city->name_ar ?? '') : '';
        $fallbackCountry = config('services.icarry.default_country');

        $result = $this->createWarehouse([
            'Name'     => $warehouseName,
            'IsActive' => true,
            'Address'  => [
                'FirstName'     => $seller->name ?? 'Seller',
                'LastName'      => '.',
                'Email'         => $seller->email ?? '',
                'County'        => $cityName ?: $fallbackCountry,
                'City'          => $cityName ?: $fallbackCountry,
                'Address1'      => $warehouseName,
                'Address2'      => '',
                'ZipPostalCode' => '',
                'PhoneNumber'   => $seller->phone ?? '',
            ],
        ]);

        if (($result['success'] ?? false) && !empty($result['data'])) {
            $name = $result['data']['Name'] ?? $warehouseName;
            $seller->icarry_warehouse_name = $name;
            $seller->save();
            return $name;
        }

        Log::warning('iCARRY ensureWarehouseForSeller failed; using global fallback.', [
            'seller_id' => $seller->id,
            'result'    => $result,
        ]);

        return config('services.icarry.pickup_location') ?: null;
    }

    /**
     * Build the CreateOrderForMarketPlace payload from one of our Order rows.
     * Public so it can be unit-tested in isolation.
     */
    public function buildCreateOrderPayload(Order $order, string $pickupLocation): array
    {
        $order->loadMissing(['user', 'address.region', 'orderDetails']);

        $user    = $order->user;
        $address = $order->address;
        $region  = $address ? $address->region : null; // City model
        $country = config('services.icarry.default_country');
        $currency = config('services.icarry.cod_currency');

        $cityName = $region ? ($region->name_en ?? $region->name_ar ?? null) : null;

        $addressParts = array_filter([
            $address->street ?? null,
            ($address && $address->block_no) ? 'Block ' . $address->block_no : null,
            ($address && $address->building_no) ? 'Bldg ' . $address->building_no : null,
            ($address && $address->floor_no) ? 'Floor ' . $address->floor_no : null,
        ]);
        $address1 = !empty($addressParts) ? implode(', ', $addressParts) : ($cityName ?: $country);

        $parcels = [];
        $totalQty = 0;
        foreach ($order->orderDetails as $detail) {
            $qty = max(1, (int) ($detail->quantity ?? 1));
            $totalQty += $qty;
            $parcels[] = [
                'Sku'      => (string) ($detail->product_id ?? $detail->id),
                'Quantity' => $qty,
                'Weight'   => 1,
                'Length'   => 1,
                'Width'    => 1,
                'Height'   => 1,
            ];
        }
        if (empty($parcels)) {
            $parcels[] = [
                'Sku' => (string) $order->id, 'Quantity' => 1,
                'Weight' => 1, 'Length' => 1, 'Width' => 1, 'Height' => 1,
            ];
            $totalQty = 1;
        }

        $isCod = strtolower((string) $order->payment_type) === 'cash';
        $codAmount = $isCod ? ((float) $order->total_price + (float) $order->delivery_fee) : 0;

        return [
            'ParcelDimensionsList'  => $parcels,
            'ProcessOrder'          => false,
            'ExternalId'            => (string) $order->id,
            'pickupLocation'        => $pickupLocation,
            'dropOffAddress'        => [
                'FirstName'     => $user->name ?? 'Customer',
                'LastName'      => '.',
                'Email'         => $user->email ?? '',
                'PhoneNumber'   => $user->phone ?? '',
                'Country'       => $country,
                'City'          => $cityName ?: $country,
                'Address1'      => $address1,
                'Address2'      => ($address && $address->notes) ? $address->notes : '',
                'ZipPostalCode' => '',
            ],
            'CODAmount'             => $codAmount,
            'COdCurrency'           => $currency,
            'ActualWeight'          => max(1, $totalQty),
            'PackageType'           => 'Parcel',
            'Length'                => 1,
            'Width'                 => 1,
            'Height'                => 1,
            'Notes'                 => (string) ($order->order_number ?? ''),
            'SystemShipmentProvider' => null,
            'Price'                 => (float) $order->delivery_fee,
            'ParcelQuantity'        => $totalQty,
            'ParcelPackageValue'    => (float) $order->total_price,
            'ParcelPackageCurrency' => $currency,
            'ParcelDescription'     => 'Order #' . ($order->order_number ?? $order->id),
        ];
    }

    /**
     * Create the shipment in iCarry for one of our orders and persist the
     * returned tracking number / order id / status onto the order.
     * Never throws — failures are logged and returned.
     */
    public function syncCreateOrder(Order $order): array
    {
        try {
            // Don't double-create if this order was already pushed.
            if (!empty($order->icarry_tracking_number)) {
                return [
                    'success'         => true,
                    'already_created' => true,
                    'tracking_number' => $order->icarry_tracking_number,
                ];
            }

            $seller = $order->seller;
            $pickupLocation = $seller
                ? $this->ensureWarehouseForSeller($seller)
                : (config('services.icarry.pickup_location') ?: null);

            if (empty($pickupLocation)) {
                Log::warning('iCARRY syncCreateOrder: no pickup location available; skipping.', [
                    'order_id' => $order->id,
                ]);
                return ['success' => false, 'error' => 'No pickup location configured.'];
            }

            $payload = $this->buildCreateOrderPayload($order, $pickupLocation);
            $result  = $this->createOrder($payload);

            if (($result['success'] ?? false) && !empty($result['data'])) {
                $data = $result['data'];
                $order->icarry_order_id        = $data['OrderId'] ?? null;
                $order->icarry_tracking_number = $data['TrackingNumber'] ?? null;
                $order->icarry_shipment_status = $this->extractStatus($data);
                $order->icarry_synced_at       = now();
                $order->save();
            } else {
                Log::warning('iCARRY syncCreateOrder failed.', [
                    'order_id' => $order->id,
                    'result'   => $result,
                ]);
            }

            return $result;
        } catch (\Throwable $e) {
            Log::error('iCARRY syncCreateOrder exception.', [
                'order_id' => $order->id,
                'message'  => $e->getMessage(),
            ]);
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Refresh tracking from iCarry for an order, persist the driver location
     * and shipment status, and return a normalized payload.
     */
    public function syncTracking(Order $order): array
    {
        if (empty($order->icarry_tracking_number)) {
            return [
                'success' => false,
                'error'   => 'Order has no iCarry tracking number.',
                'driver'  => null,
            ];
        }

        try {
            $result = $this->trackOrder($order->icarry_tracking_number);
            $data   = is_array($result['data'] ?? null) ? $result['data'] : [];

            $driver = $this->extractDriverLocation($data);
            $status = $this->extractStatus($data);

            $order->icarry_tracking_data = $data ?: null;
            $order->icarry_synced_at     = now();
            if ($status !== null)        { $order->icarry_shipment_status = $status; }
            if ($driver['id'] !== null)  { $order->icarry_driver_id  = $driver['id']; }
            if ($driver['lat'] !== null) { $order->icarry_driver_lat  = $driver['lat']; }
            if ($driver['lng'] !== null) { $order->icarry_driver_lng  = $driver['lng']; }
            $order->save();

            return [
                'success'         => $result['success'] ?? false,
                'tracking_number' => $order->icarry_tracking_number,
                'status'          => $status ?? $order->icarry_shipment_status,
                'driver'          => $driver,
                'raw'             => $data,
            ];
        } catch (\Throwable $e) {
            Log::error('iCARRY syncTracking exception.', [
                'order_id' => $order->id,
                'message'  => $e->getMessage(),
            ]);
            return ['success' => false, 'error' => $e->getMessage(), 'driver' => null];
        }
    }

    /**
     * Defensively pull a shipment status string out of an iCarry payload.
     */
    protected function extractStatus(array $data): ?string
    {
        foreach (['shipmentStatus', 'ShipmentStatus', 'ShipmentStatusName', 'Status', 'status', 'OrderStatus'] as $key) {
            if (isset($data[$key]) && $data[$key] !== '' && !is_array($data[$key])) {
                return (string) $data[$key];
            }
        }
        return null;
    }

    /**
     * Defensively extract the driver id + live coordinates from a tracking
     * payload. The tracking response shape is not documented in the Postman
     * collection, so we probe a nested driver object first, then top-level keys.
     */
    protected function extractDriverLocation(array $data): array
    {
        $sources = [];
        foreach (['Driver', 'driver', 'DriverInfo', 'driverInfo'] as $k) {
            if (isset($data[$k]) && is_array($data[$k])) {
                $sources[] = $data[$k];
            }
        }
        $sources[] = $data; // top-level fallback (checked last)

        $latKeys   = ['DriverLatitude', 'driverLatitude', 'Latitude', 'latitude', 'Lat', 'lat'];
        $lngKeys   = ['DriverLongitude', 'driverLongitude', 'Longitude', 'longitude', 'Lng', 'lng', 'Long', 'long'];
        $nameKeys  = ['DriverName', 'driverName', 'Name', 'name'];
        $phoneKeys = ['DriverPhone', 'driverPhone', 'Phone', 'phone', 'PhoneNumber'];

        $driver = ['id' => null, 'lat' => null, 'lng' => null, 'name' => null, 'phone' => null];

        foreach ($sources as $src) {
            // At the top level only trust an explicit DriverId (avoid grabbing the order's own Id).
            $idKeys = ($src === $data) ? ['DriverId', 'driverId'] : ['DriverId', 'driverId', 'Id', 'id'];
            $driver['id']    = $driver['id']    ?? $this->firstKey($src, $idKeys);
            $driver['lat']   = $driver['lat']   ?? $this->firstKey($src, $latKeys);
            $driver['lng']   = $driver['lng']   ?? $this->firstKey($src, $lngKeys);
            $driver['name']  = $driver['name']  ?? $this->firstKey($src, $nameKeys);
            $driver['phone'] = $driver['phone'] ?? $this->firstKey($src, $phoneKeys);
        }

        $driver['lat'] = is_numeric($driver['lat']) ? (float) $driver['lat'] : null;
        $driver['lng'] = is_numeric($driver['lng']) ? (float) $driver['lng'] : null;

        return $driver;
    }

    /**
     * Return the first present, non-empty, scalar value among the given keys.
     */
    protected function firstKey(array $data, array $keys)
    {
        foreach ($keys as $key) {
            if (isset($data[$key]) && $data[$key] !== '' && !is_array($data[$key])) {
                return $data[$key];
            }
        }
        return null;
    }
}
