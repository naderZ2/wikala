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
                in_array($this->model->reportable_type, ['ad', \App\Models\Ad::class]),
                fn($q) => $q->with('adSpecificRelation')
            )->when(
                $this->model->reportable_type === 'product',
                fn($q) => $q->with('productSpecificRelation')
            )->when(
                in_array($this->model->reportable_type, ['user', \App\Models\User::class]),
                fn($q) => $q->with('userSpecificRelation')
            )->when(
                $this->model->reportable_type === 'seller',
                fn($q) => $q->with('sellerSpecificRelation')
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

        if (in_array($report->reportable_type, [\App\Models\Ad::class, 'ad'])) {
            $report->load('adSpecificRelation');
        } elseif ($report->reportable_type === 'product') {
            $report->load('productSpecificRelation');
        } elseif (in_array($report->reportable_type, [\App\Models\User::class, 'user'])) {
            $report->load('userSpecificRelation');
        } elseif ($report->reportable_type === 'seller') {
            $report->load('sellerSpecificRelation');
        }

        return $report;
    }
}
