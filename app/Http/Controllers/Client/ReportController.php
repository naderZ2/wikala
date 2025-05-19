<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Services\ReportService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Report\StoreRequest;

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
    
    public function store(StoreRequest $request)
    {
        $report = $this->reportService->create($request->validated());
        return $this->success($report);
    }
}
