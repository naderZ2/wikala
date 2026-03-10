<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Traits\ResponsesTrait;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    use ResponsesTrait;

    /**
     * Get delivery areas with cities/regions and prices
     * GET /seller/delivery-options
     */
    public function index(Request $request)
    {
        $this->lang();
        $seller = $request->user();
        $lang = request()->header('Lang', app()->getLocale());

        // Get all cities with regions
        $cities = City::with('regions')->get();

        // Get seller's selected delivery areas
        $sellerAreas = DB::table('city_seller')
            ->where('seller_id', $seller->id)
            ->get()
            ->keyBy(function ($item) {
                return $item->city_id . '_' . ($item->region_id ?? 0);
            });

        $data = $cities->map(function ($city) use ($sellerAreas, $lang) {
            return [
                'id' => $city->id,
                'name' => $lang == 'en' ? ($city->name_en ?? $city->name) : ($city->name_ar ?? $city->name),
                'name_en' => $city->name_en ?? $city->name,
                'name_ar' => $city->name_ar ?? $city->name,
                'regions' => $city->regions->map(function ($region) use ($city, $sellerAreas, $lang) {
                    $key = $city->id . '_' . $region->id;
                    $sellerArea = $sellerAreas->get($key);

                    return [
                        'id' => $region->id,
                        'name' => $lang == 'en' ? ($region->name_en ?? $region->name) : ($region->name_ar ?? $region->name),
                        'name_en' => $region->name_en ?? $region->name,
                        'name_ar' => $region->name_ar ?? $region->name,
                        'delivery_price' => $sellerArea ? $sellerArea->delivery_price : 0,
                        'active' => $sellerArea ? (bool) $sellerArea->active : false,
                    ];
                }),
            ];
        });

        return $this->success($data, 'Delivery options');
    }

    /**
     * Update delivery areas
     * PUT /seller/delivery-options
     */
    public function update(Request $request)
    {
        $seller = $request->user();

        $request->validate([
            'areas' => 'required|array',
            'areas.*.city_id' => 'required|exists:cities,id',
            'areas.*.region_id' => 'nullable|integer',
            'areas.*.delivery_price' => 'required|numeric|min:0',
            'areas.*.active' => 'required|boolean',
        ]);

        foreach ($request->areas as $area) {
            $regionId = $area['region_id'] ?? null;

            $existing = DB::table('city_seller')
                ->where('seller_id', $seller->id)
                ->where('city_id', $area['city_id'])
                ->where('region_id', $regionId)
                ->first();

            if ($existing) {
                DB::table('city_seller')
                    ->where('id', $existing->id)
                    ->update([
                        'delivery_price' => $area['delivery_price'],
                        'active' => $area['active'],
                        'updated_at' => now(),
                    ]);
            } else {
                DB::table('city_seller')->insert([
                    'seller_id' => $seller->id,
                    'city_id' => $area['city_id'],
                    'region_id' => $regionId,
                    'delivery_price' => $area['delivery_price'],
                    'active' => $area['active'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return $this->success(null, 'Delivery options updated');
    }
}
