<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Services\ICarryService;
use Illuminate\Console\Command;

/**
 * Poll iCarry tracking for every out-for-delivery order that has a tracking
 * number, refreshing the stored driver location/status. ICarryService::syncTracking
 * broadcasts a DriverLocationUpdated event whenever the driver coordinates change,
 * so subscribed clients receive live updates over WebSockets (Reverb).
 */
class PollIcarryTracking extends Command
{
    protected $signature = 'icarry:poll-tracking {--limit=200 : Max orders to poll in one run}';

    protected $description = 'Poll iCarry tracking for out-for-delivery orders and broadcast driver location updates in real time.';

    public function handle(ICarryService $icarry): int
    {
        $limit = max(1, (int) $this->option('limit'));

        $orders = Order::where('status', 'out_for_delivery')
            ->whereNotNull('icarry_tracking_number')
            ->orderByRaw('icarry_synced_at IS NULL DESC') // never-synced first
            ->orderBy('icarry_synced_at')                 // then the stalest
            ->limit($limit)
            ->get();

        if ($orders->isEmpty()) {
            return self::SUCCESS;
        }

        $this->info("Polling iCarry tracking for {$orders->count()} order(s)...");

        $withLocation = 0;
        foreach ($orders as $order) {
            $result = $icarry->syncTracking($order);
            if (($result['success'] ?? false) && ($result['driver']['lat'] ?? null) !== null) {
                $withLocation++;
            }
        }

        $this->info("Done. {$withLocation} order(s) reported a driver location.");

        return self::SUCCESS;
    }
}
