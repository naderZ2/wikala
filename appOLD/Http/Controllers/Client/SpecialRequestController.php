<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\SpecialRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
use App\Services\SpecialRequestService;
use App\Http\Requests\Client\SpecialRequest\SpecialRequestsRequest;
use App\Http\Requests\Client\SpecialRequest\SpecialRequestDetailsRequest;
use App\Traits\ResponsesTrait;


class SpecialRequestController extends Controller
{
    
    use ResponsesTrait;
    public function saveSpecialRequest(SpecialRequestsRequest $request,SpecialRequestService $service)
    {
        $validatedData = $request->validated();
        // Create the Special Request
        $specialRequest = $service->createSpecialRequest($validatedData);
         return $this->success($specialRequest);
    }
    
    public function saveSpecialRequestDetails(SpecialRequestDetailsRequest $request,SpecialRequestService $service)
    {
        $validatedData = $request->validated();
    
        $specialRequest = $service->createSpecialRequestDetails($validatedData);
        return $this->success($specialRequest);

    }
    
}
