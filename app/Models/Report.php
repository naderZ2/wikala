<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'reporter_id',
        'reportable_id',
        'reportable_type',
        'report_option_id',
        'additional_notes',
    ];

    protected $appends = ['dynamicRelation'];

    public function getDynamicRelationAttribute()
    {
        return $this->getRelationBasedOnType();
    }

    // A Report belongs to a ReportOption
    public function reportOption()
    {
        return $this->belongsTo(ReportOption::class);
    }

    // A Report belongs to the Reporter (User)
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    // Polymorphic relation (User or Ad)
    public function reportable()
    {
        return $this->morphTo();
    }

    public function getRelationBasedOnType()
    {
        if (in_array($this->reportable_type, ['App\\Models\\Ad', 'ad'])) {
            return $this->adSpecificRelation()->first();
        } elseif ($this->reportable_type === 'product') {
            return $this->productSpecificRelation()->first();
        } elseif (in_array($this->reportable_type, ['App\\Models\\User', 'user'])) {
            return $this->userSpecificRelation()->first();
        } elseif ($this->reportable_type === 'seller') {
            return $this->sellerSpecificRelation()->first();
        }

        return null;
    }

    public function adSpecificRelation(){
        return $this->hasOne(Ad::class, 'id', 'reportable_id');
    }

    public function productSpecificRelation(){
        return $this->hasOne(Product::class, 'id', 'reportable_id');
    }

    public function userSpecificRelation(){
        return $this->hasOne(User::class, 'id', 'reportable_id');
    }

    public function sellerSpecificRelation(){
        return $this->hasOne(Seller::class, 'id', 'reportable_id');
    }
}
