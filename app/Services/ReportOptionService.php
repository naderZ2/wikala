<?php

namespace App\Services;

use App\Repositories\ReportOptionRepository;

class ReportOptionService
{
    protected $reportOptionRepository;

    public function __construct(ReportOptionRepository $reportOptionRepository)
    {
        $this->reportOptionRepository = $reportOptionRepository;
    }

    public function create(array $data)
    {
        return $this->reportOptionRepository->create($data);
    }

    public function all()
    {
        return $this->reportOptionRepository->all();
    }

    public function update($id, array $data)
    {
        return $this->reportOptionRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->reportOptionRepository->delete($id);
    }
}
