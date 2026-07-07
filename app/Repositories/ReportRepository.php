<?php

namespace App\Repositories;

use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportRepository
{
    protected $model;

    public function __construct(Report $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        $data['reporter_id'] = Auth::id();
        return $this->model->create($data);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function allWithRelations()
    {
        return $this->model->with(['reportOption', 'reporter'])->get();
    }

    public function allWithDynamicRelations()
    {
        return $this->model->with(['reportOption', 'reporter', 'getRelationBasedOnType' => function ($query) {
            $query->when(
                in_array($this->model->reportable_type, ['ad', 'product', \App\Models\Ad::class]),
                fn($q) => $q->with('adSpecificRelation')
            )->when(
                in_array($this->model->reportable_type, ['user', 'seller', \App\Models\User::class]),
                fn($q) => $q->with('userSpecificRelation')
            );
        }])->get();
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
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
    public function findWithRelations($id)
    {
        $report = $this->model->with(['reportOption', 'reporter'])->findOrFail($id);

        if (in_array($report->reportable_type, [\App\Models\Ad::class, 'ad', 'product'])) {
            $report->load('adSpecificRelation');
        } elseif (in_array($report->reportable_type, [\App\Models\User::class, 'user', 'seller'])) {
            $report->load('userSpecificRelation');
        }

        return $report;
    }
}
