<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ReportOptionService;
use App\Http\Requests\Admin\ReportOption\StoreRequest;

class ReportOptionController extends Controller
{
    protected $reportOptionService;

    public function __construct(ReportOptionService $reportOptionService)
    {
        $this->reportOptionService = $reportOptionService;
    }

    public function index()
    {
        
        $reportOption=$this->reportOptionService->all();

        return view('admin.report_options.index', compact('reportOption'));
    }

    public function store(StoreRequest $request)
    {
        $this->reportOptionService->create($request->validated());
        return to_route('reportOption.index')->with('success', trans('lang.created'));
        
    }
    
    public function update(StoreRequest $request)
    {
        $id = $request->id;
        $this->reportOptionService->update($id, $request->validated());

        return to_route('reportOption.index')->with('success', trans('lang.updated'));
    }


    public function enable($id)
    {
        $reason = $this->reportOptionService->find($id);

        $reason->enable = !$reason->enable;
        $reason->save();

        return redirect()->route('reportOption.index')->with('success', trans('lang.updated'));
    }
}
