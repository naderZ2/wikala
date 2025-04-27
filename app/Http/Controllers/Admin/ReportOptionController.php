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
        return $this->success($this->reportOptionService->all());
    }

    public function store(StoreRequest $request)
    {
        $option = $this->reportOptionService->create($request->validated());
        return response()->json($option, 201);
    }

    public function update(StoreRequest $request, $id)
    {
        $option = $this->reportOptionService->update($id, $request->validated());
        return response()->json($option);
    }

    public function destroy($id)
    {
        $this->reportOptionService->delete($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
