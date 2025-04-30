<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\ReportService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Report;

class ReportController extends Controller
{

    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }
    public function index()
    {
        // $this->lang();
        // $cities = City::whereNull('parent_id')->select('id',$this->name)->get();

        // $reports = $this->reportService->all();
        $reports = $this->reportService->allWithRelations();
        
        return view('admin.reports.index', compact('reports'));
    }
    
    public function details($id)
    {
        $report = $this->reportService->findWithRelations($id);
        
        Log::info($report);

        return view('admin.reports.details', compact('report'));
    }
}
