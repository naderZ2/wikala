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
                $this->model->reportable_type === 'ad',
                fn($q) => $q->with('adSpecificRelation') // Replace 'adSpecificRelation' with actual Ad relation
            )->when(
                $this->model->reportable_type === 'user',
                fn($q) => $q->with('userSpecificRelation') // Replace 'userSpecificRelation' with actual User relation
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
         
        $report =$this->model->with([
            'reportOption', 
            'reporter', 
        ])->findOrFail($id);
            if($report->reportable_type === 'ad'){
                $report->load('adSpecificRelation');
            }else if($report->reportable_type === 'user'){
                $report->load('userSpecificRelation');
            }
    return $report;
    }
}
