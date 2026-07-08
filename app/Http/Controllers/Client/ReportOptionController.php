<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Traits\ResponsesTrait;
use App\Http\Controllers\Controller;
use App\Services\ReportOptionService;

class ReportOptionController extends Controller
{
    use ResponsesTrait;

    protected $reportOptionService;

    public function __construct(ReportOptionService $reportOptionService)
    {
        $this->reportOptionService = $reportOptionService;
    }

    public function index()
    {
        $this->lang();
        return $this->success($this->reportOptionService->getEnable(['id', $this->title, 'created_at', 'updated_at', 'enable']));
    }
}
