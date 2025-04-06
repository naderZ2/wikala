<?php

namespace App\Http\Controllers\Client;

use App\Models\SavedAd;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SavedAdController extends Controller
{
    use ResponsesTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $savedAds = SavedAd::where('user_id', Auth::id())->get();
        return $this->success($savedAds);
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

        // Prevent saving the same ad twice
        $alreadyExists = SavedAd::where('user_id', $user_id)
                            ->where('ad_id', $validated['ad_id'])
                            ->exists();

        if ($alreadyExists) {
            return $this->failed(null, trans('lang.already_saved'));
        }

        $savedAd = SavedAd::create([
            'user_id' => $user_id,
            'ad_id'   => $validated['ad_id'],
        ]);

        return $this->success($savedAd, trans('lang.created'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $savedAd = SavedAd::find($id);

        if (!$savedAd) {
            return $this->failed(null, trans('lang.not_found'));
        }

        if ($savedAd->user_id !== Auth::id()) {
            return $this->failed(null, trans('lang.not_found'));
        }

        $savedAd->delete();

        return $this->success(null, trans('lang.deleted'));
    }
}
