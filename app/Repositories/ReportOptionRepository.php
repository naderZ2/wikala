<?php

namespace App\Repositories;

use App\Models\ReportOption;

class ReportOptionRepository
{
    protected $model;

    public function __construct(ReportOption $model)
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
    public function getEnable()
    {
        return $this->model->where('enable', 1)->get();
    }

    public function update($id, array $data)
    {
        $option = $this->model->findOrFail($id);
        $option->update($data);
        return $option;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
}
