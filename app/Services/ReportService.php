<?php

namespace App\Services;

use App\Repositories\ReportRepository;

class ReportService
{
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function create(array $data)
    {
        return $this->reportRepository->create($data);
    }

    public function all()
    {
        return $this->reportRepository->all();
    }

    public function update($id, array $data)
    {
        return $this->reportRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->reportRepository->delete($id);
    }
}
