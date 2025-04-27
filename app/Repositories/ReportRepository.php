<?php

namespace App\Repositories;

use App\Models\Report;

class ReportRepository
{
    protected $model;

    public function __construct(Report $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function update($id, array $data)
    {
        $report = $this->model->findOrFail($id);
        $report->update($data);
        return $report;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
