<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Services\ReportService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Report\StoreRequest;
use App\Services\OneSignalService;


class ReportController extends Controller
{
    use ResponsesTrait;

    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function index()
    {
        
        return $this->success($this->reportService->all());
    }
    
    public function store(StoreRequest $request, OneSignalService $oneSignal)
    {
        $report = $this->reportService->create($request->validated());
            
        $user = auth()->user();
        $report->sendit  = $oneSignal->send(
            "New Report Submitted",
            "A new report was created by user : " . $user->name,
            [
                'report_id' => 30,
                'user_id' => 300,
            ]
        );

        
        return $this->success($report);
    }
}
