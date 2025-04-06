<?php

namespace App\Http\Controllers\Client;

use App\Models\FavoriteAd;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteAdController extends Controller
{
    use ResponsesTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favoriteAds = FavoriteAd::where('user_id', Auth::id())->get();
        return $this->success($favoriteAds);
    }
    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
{
    $user_id = Auth::id();

    $validated = $request->validate([
        'ad_id' => 'required|exists:ads,id',
    ]);

    // Check if the ad is already favorited by this user
    $alreadyExists = FavoriteAd::where('user_id', $user_id)
                        ->where('ad_id', $validated['ad_id'])
                        ->exists();

    if ($alreadyExists) {
        return $this->failed(null, trans('lang.already_favorited')); 
    }

    $favoriteAd = FavoriteAd::create([
        'user_id' => $user_id,
        'ad_id'   => $validated['ad_id'],
    ]);

    return $this->success($favoriteAd, trans('lang.created'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $favoriteAd = FavoriteAd::find($id);
        if (!$favoriteAd) {
            return $this->failed(null, trans('lang.not_found'));
        }

        if ($favoriteAd->user_id !== Auth::id()) {
            return $this->failed(null, trans('lang.not_found'));
        }

        $favoriteAd->delete();

        return $this->success(null, trans('lang.deleted'));
    }
}
