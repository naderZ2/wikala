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
        $this->lang();
        $reports = $this->reportService->allWithRelations() ?? collect();
        return view('admin.reports.index', compact('reports'));
    }

    public function details($id)
    {
        $this->lang();
        $report = $this->reportService->findWithRelations($id);
        if (!$report) {
            return redirect()->route('admin.reports.index')->with('error', trans('lang.no_data'));
        }
        return view('admin.reports.details', compact('report'));
    }
}
