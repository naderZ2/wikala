<?php

namespace App\Http\Controllers\Client;

use App\Models\SavedAd;
use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Services\SavedAdService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SavedAdController extends Controller
{
    use ResponsesTrait;

    protected $savedAdService;


    public function __construct(SavedAdService $savedAdService)
    {
        $this->savedAdService = $savedAdService;
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ad_id' => 'required|exists:ads,id',
        ]);

        $savedAd = $this->savedAdService->saveAd($validated['ad_id']);

        if (!$savedAd) {
            return $this->failed(null, trans('lang.already_saved'));
        }

        return $this->success($savedAd, trans('lang.created'));
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy($id)
    {
        $deleted = $this->savedAdService->deleteAd($id);

        if (!$deleted) {
            return $this->failed(null, trans('lang.not_found'));
        }

        return $this->success(null, trans('lang.deleted'));
    }
}
