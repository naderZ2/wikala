<?php

namespace App\Http\Controllers\Client;

use App\Models\Ad;
use App\Models\Auction;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Auction\StoreRequest;

class AuctionController extends Controller
{
    use ResponsesTrait;

    public function store(StoreRequest $request)
    {
        Log::info('Auction creation request', ['request' => $request->all()]);
        $data = $request->validated();
        $data['user_id'] = auth()->id(); // Assuming you want to set the user_id from the authenticated user
        Log::info('Auction creation validated', ['request' => $data]);

        // Get the last auction for this ad
        $lastAuction = Auction::where('ad_id', $data['ad_id'])->orderByDesc('price')->first();
        if ($lastAuction && $data['price'] <= $lastAuction->price) {
            return $this->failed(null,__('lang.price_must_be_greater_than_last', ['price' => $lastAuction->price]));
        }
        // Get the main price of the ad
        $lowestAuction = Ad::where('id', $data['ad_id'])->value('price');
        if ($lowestAuction !== null && $data['price'] < $lowestAuction) {
            return $this->failed(null, __('lang.price_must_be_greater_than_main', ['price' => $mainPrice]));
        }
        
        $auction = Auction::create($data);
        return $this->success($auction);
    }

    public function getByAd($ad_id)
    {
        $auctions = Auction::where('ad_id', $ad_id)->with('user:id,name,image')->orderByDesc('created_at')->get();
        $lowestAuction = Ad::where('id', $ad_id)->value('price');

        $auctions->lowestAuction = $lowestAuction;
        return $this->success($auctions);
    }
}
