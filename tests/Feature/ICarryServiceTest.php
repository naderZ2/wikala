<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Seller;
use App\Models\UserAdress;
use App\Models\OrderDetails;
use App\Services\ICarryService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ICarryServiceTest extends TestCase
{
    protected ICarryService $service;

    protected function setUp(): void
    {
        parent::setUp();

        // Configure test configurations for services
        config(['services.icarry.base_url' => 'https://test.icarry.com/api-frontend']);
        config(['services.icarry.email' => 'test@yallapay.com']);
        config(['services.icarry.password' => 'password123']);

        $this->service = new ICarryService();

        // Clear cache before each test
        Cache::forget('icarry_api_token_' . md5('test@yallapay.com'));
    }

    /** @test */
    public function it_can_authenticate_and_get_a_token()
    {
        Http::fake([
            'https://test.icarry.com/api-frontend/Authenticate/GetTokenForCustomerApi' => Http::response([
                'email' => 'test@yallapay.com',
                'customer_id' => 12345,
                'token' => 'mocked-jwt-token-xyz'
            ], 200)
        ]);

        $token = $this->service->getAuthToken();

        $this->assertEquals('mocked-jwt-token-xyz', $token);
        
        // Assert token is cached
        $cacheKey = 'icarry_api_token_' . md5('test@yallapay.com');
        $this->assertEquals('mocked-jwt-token-xyz', Cache::get($cacheKey));
    }

    /** @test */
    public function it_estimates_shipping_rates()
    {
        Http::fake([
            'https://test.icarry.com/api-frontend/Authenticate/GetTokenForCustomerApi' => Http::response([
                'token' => 'mocked-jwt-token-xyz'
            ], 200),
            'https://test.icarry.com/api-frontend/SmartwareShipment/EstimateRatesForMarketplace' => Http::response([
                [
                    'Name' => 'No Limit',
                    'Price' => '$2.14',
                    'Rate' => 2.141
                ]
            ], 200)
        ]);

        $response = $this->service->estimateRates([
            'pickupLocation' => 'WarehouseA',
            'incluedShippingCost' => true,
            'CODAmount' => 10,
            'DropOffLocation' => 'Beirut'
        ]);

        $this->assertTrue($response['success']);
        $this->assertEquals(200, $response['status']);
        $this->assertEquals('No Limit', $response['data'][0]['Name']);
    }

    /** @test */
    public function it_creates_a_marketplace_order()
    {
        Http::fake([
            'https://test.icarry.com/api-frontend/Authenticate/GetTokenForCustomerApi' => Http::response([
                'token' => 'mocked-jwt-token-xyz'
            ], 200),
            'https://test.icarry.com/api-frontend/SmartwareShipment/CreateOrderForMarketPlace' => Http::response([
                'OrderId' => 5837,
                'TrackingNumber' => 'IC01987654321',
                'shipmentStatus' => 'UnAssignCarrier'
            ], 200)
        ]);

        $response = $this->service->createOrder([
            'ExternalId' => 'order_123',
            'pickupLocation' => 'WarehouseA',
            'dropOffAddress' => [
                'FirstName' => 'John',
                'LastName' => 'Doe'
            ]
        ]);

        $this->assertTrue($response['success']);
        $this->assertEquals('IC01987654321', $response['data']['TrackingNumber']);
    }

    /** @test */
    public function it_retrieves_all_warehouses()
    {
        Http::fake([
            'https://test.icarry.com/api-frontend/Authenticate/GetTokenForCustomerApi' => Http::response([
                'token' => 'mocked-jwt-token-xyz'
            ], 200),
            'https://test.icarry.com/api-frontend/Warehouse/GetAll' => Http::response([
                ['Id' => 668, 'Name' => 'WarehouseA'],
                ['Id' => 669, 'Name' => 'WarehouseB']
            ], 200)
        ]);

        $response = $this->service->getLocations();

        $this->assertTrue($response['success']);
        $this->assertCount(2, $response['data']);
        $this->assertEquals('WarehouseA', $response['data'][0]['Name']);
    }

    /** @test */
    public function it_creates_a_warehouse()
    {
        Http::fake([
            'https://test.icarry.com/api-frontend/Authenticate/GetTokenForCustomerApi' => Http::response([
                'token' => 'mocked-jwt-token-xyz'
            ], 200),
            'https://test.icarry.com/api-frontend/Warehouse/createWarehouseForMarketPlace' => Http::response([
                'Id' => 999,
                'Name' => 'NewWarehouse'
            ], 200)
        ]);

        $response = $this->service->createWarehouse([
            'Name' => 'NewWarehouse',
            'IsActive' => true
        ]);

        $this->assertTrue($response['success']);
        $this->assertEquals(999, $response['data']['Id']);
    }

    /** @test */
    public function it_tracks_an_order()
    {
        Http::fake([
            'https://test.icarry.com/api-frontend/Authenticate/GetTokenForCustomerApi' => Http::response([
                'token' => 'mocked-jwt-token-xyz'
            ], 200),
            'https://test.icarry.com/api-frontend/SmartwareShipment/orderTracking*' => Http::response([
                'TrackingNumber' => 'IC01987654321',
                'Status' => 'InTransit'
            ], 200)
        ]);

        $response = $this->service->trackOrder('IC01987654321');

        $this->assertTrue($response['success']);
        $this->assertEquals('IC01987654321', $response['data']['TrackingNumber']);
    }

    /** @test */
    public function it_cancels_an_order()
    {
        Http::fake([
            'https://test.icarry.com/api-frontend/Authenticate/GetTokenForCustomerApi' => Http::response([
                'token' => 'mocked-jwt-token-xyz'
            ], 200),
            'https://test.icarry.com/api-frontend/SmartwareShipment/CancelOrder*' => Http::response([
                'success' => true,
                'message' => 'Order cancelled successfully.'
            ], 200)
        ]);

        $response = $this->service->cancelOrder('IC01987654321');

        $this->assertTrue($response['success']);
        $this->assertTrue($response['data']['success']);
    }

    /** @test */
    public function it_registers_a_customer_account()
    {
        Http::fake([
            'https://test.icarry.com/api-frontend/Authenticate/GetTokenForCustomerApi' => Http::response([
                'token' => 'mocked-jwt-token-xyz'
            ], 200),
            'https://test.icarry.com/api-frontend/Customer/CreateMarchantAccountForECommerce' => Http::response([
                'Email' => 'newcustomer@email.com',
                'WarehouseName' => 'New Warehouse'
            ], 200)
        ]);

        $response = $this->service->createCustomer([
            'Email' => 'newcustomer@email.com',
            'FirstName' => 'Jane',
            'LastName' => 'Doe',
            'Password' => 'newpassword123'
        ]);

        $this->assertTrue($response['success']);
        $this->assertEquals('newcustomer@email.com', $response['data']['Email']);
    }

    /**
     * Build an in-memory Order (no DB) with its relations pre-loaded so that
     * buildCreateOrderPayload() can be exercised without a database.
     */
    private function makeOrder(string $paymentType = 'cash'): Order
    {
        $user = (new User())->forceFill([
            'name'  => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+96512345678',
        ]);

        $city = (new City())->forceFill([
            'name_en' => 'Kuwait City',
            'name_ar' => 'مدينة الكويت',
        ]);

        $address = (new UserAdress())->forceFill([
            'street'      => 'Main St',
            'block_no'    => '5',
            'building_no' => '12',
            'floor_no'    => '3',
            'notes'       => 'ring bell',
        ]);
        $address->setRelation('region', $city);

        $detail = (new OrderDetails())->forceFill([
            'product_id' => 101,
            'quantity'   => 2,
        ]);

        $order = (new Order())->forceFill([
            'id'           => 5,
            'payment_type' => $paymentType,
            'total_price'  => '30',
            'delivery_fee' => '2',
            'order_number' => '10005',
        ]);
        $order->setRelation('user', $user);
        $order->setRelation('address', $address);
        $order->setRelation('orderDetails', collect([$detail]));

        return $order;
    }

    /** @test */
    public function it_builds_a_create_order_payload_from_an_order()
    {
        $payload = $this->service->buildCreateOrderPayload($this->makeOrder('cash'), 'WarehouseA');

        $this->assertEquals('WarehouseA', $payload['pickupLocation']);
        $this->assertEquals('5', $payload['ExternalId']);
        $this->assertEquals('John Doe', $payload['dropOffAddress']['FirstName']);
        $this->assertEquals('+96512345678', $payload['dropOffAddress']['PhoneNumber']);
        $this->assertEquals('Kuwait City', $payload['dropOffAddress']['City']);
        $this->assertEquals('Kuwait', $payload['dropOffAddress']['Country']);
        $this->assertStringContainsString('Main St', $payload['dropOffAddress']['Address1']);
        $this->assertStringContainsString('Block 5', $payload['dropOffAddress']['Address1']);

        // Cash order => COD = total + delivery fee
        $this->assertEquals(32.0, $payload['CODAmount']);
        $this->assertEquals('KWD', $payload['COdCurrency']);

        // Parcels reflect the order details
        $this->assertCount(1, $payload['ParcelDimensionsList']);
        $this->assertEquals('101', $payload['ParcelDimensionsList'][0]['Sku']);
        $this->assertEquals(2, $payload['ParcelDimensionsList'][0]['Quantity']);
        $this->assertEquals(2, $payload['ParcelQuantity']);
    }

    /** @test */
    public function it_does_not_charge_cod_for_non_cash_orders()
    {
        $payload = $this->service->buildCreateOrderPayload($this->makeOrder('card'), 'WarehouseA');

        $this->assertEquals(0, $payload['CODAmount']);
    }

    /** @test */
    public function it_extracts_driver_location_from_a_nested_driver_object()
    {
        $method = new \ReflectionMethod(ICarryService::class, 'extractDriverLocation');
        $method->setAccessible(true);

        $driver = $method->invoke($this->service, [
            'Driver' => [
                'Id'        => 77,
                'Latitude'  => 29.3759,
                'Longitude' => 47.9774,
                'Name'      => 'Sam Driver',
                'Phone'     => '+96599999999',
            ],
        ]);

        $this->assertEquals(77, $driver['id']);
        $this->assertEquals(29.3759, $driver['lat']);
        $this->assertEquals(47.9774, $driver['lng']);
        $this->assertEquals('Sam Driver', $driver['name']);
    }

    /** @test */
    public function it_extracts_driver_location_from_top_level_fields()
    {
        $method = new \ReflectionMethod(ICarryService::class, 'extractDriverLocation');
        $method->setAccessible(true);

        // Top-level "Id" must NOT be treated as a driver id (it's the order id);
        // only an explicit DriverId counts.
        $driver = $method->invoke($this->service, [
            'Id'                => 5837,
            'DriverId'          => 42,
            'DriverLatitude'    => '30.10',
            'DriverLongitude'   => '48.20',
        ]);

        $this->assertEquals(42, $driver['id']);
        $this->assertEquals(30.10, $driver['lat']);
        $this->assertEquals(48.20, $driver['lng']);
    }

    /** @test */
    public function it_extracts_a_shipment_status()
    {
        $method = new \ReflectionMethod(ICarryService::class, 'extractStatus');
        $method->setAccessible(true);

        $this->assertEquals('OutForDelivery', $method->invoke($this->service, ['shipmentStatus' => 'OutForDelivery']));
        $this->assertEquals('InTransit', $method->invoke($this->service, ['Status' => 'InTransit']));
        $this->assertNull($method->invoke($this->service, ['something_else' => 'x']));
    }

    /** @test */
    public function it_returns_existing_warehouse_without_calling_the_api()
    {
        Http::fake();

        $seller = (new Seller())->forceFill([
            'id'                    => 9,
            'icarry_warehouse_name' => 'Existing WH',
        ]);

        $name = $this->service->ensureWarehouseForSeller($seller);

        $this->assertEquals('Existing WH', $name);
        Http::assertNothingSent();
    }

    /** @test */
    public function it_refreshes_token_and_retries_on_unauthorized()
    {
        // First authenticate yields initial token
        // First rate request returns 401 Unauthorized
        // Secondary authenticate yields new token
        // Secondary rate request succeeds (200)
        Http::fake([
            'https://test.icarry.com/api-frontend/Authenticate/GetTokenForCustomerApi' => Http::sequence()
                ->push(['token' => 'expired-token'])
                ->push(['token' => 'fresh-token']),
            'https://test.icarry.com/api-frontend/SmartwareShipment/EstimateRatesForMarketplace' => Http::sequence()
                ->push(['error' => 'Unauthorized'], 401)
                ->push(['success' => true], 200)
        ]);

        $response = $this->service->estimateRates([
            'pickupLocation' => 'WarehouseA'
        ]);

        $this->assertTrue($response['success']);
        $this->assertEquals(200, $response['status']);
        $this->assertTrue($response['data']['success']);
    }
}
