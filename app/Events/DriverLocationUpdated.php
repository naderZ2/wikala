<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Broadcast in real time whenever an order's delivery driver location/status
 * changes (sourced from iCarry tracking). Listeners (client / seller / admin)
 * subscribe to the private channel "order.{id}".
 *
 * Implements ShouldBroadcastNow so the broadcast is sent immediately from the
 * polling command without depending on a running queue worker.
 */
class DriverLocationUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $orderId;
    public ?string $status;
    public ?string $trackingNumber;
    public array $driver;

    public function __construct(Order $order, array $driver = [])
    {
        $this->orderId        = (int) $order->id;
        $this->status         = $order->icarry_shipment_status;
        $this->trackingNumber = $order->icarry_tracking_number;

        $this->driver = [
            'id'    => $driver['id']    ?? $order->icarry_driver_id,
            'lat'   => $driver['lat']   ?? ($order->icarry_driver_lat !== null ? (float) $order->icarry_driver_lat : null),
            'lng'   => $driver['lng']   ?? ($order->icarry_driver_lng !== null ? (float) $order->icarry_driver_lng : null),
            'name'  => $driver['name']  ?? null,
            'phone' => $driver['phone'] ?? null,
        ];
    }

    /**
     * @return \Illuminate\Broadcasting\Channel[]
     */
    public function broadcastOn(): array
    {
        return [new PrivateChannel('order.' . $this->orderId)];
    }

    public function broadcastAs(): string
    {
        return 'driver.location';
    }

    public function broadcastWith(): array
    {
        return [
            'order_id'        => $this->orderId,
            'status'          => $this->status,
            'tracking_number' => $this->trackingNumber,
            'driver'          => $this->driver,
            'updated_at'      => now()->toIso8601String(),
        ];
    }
}
