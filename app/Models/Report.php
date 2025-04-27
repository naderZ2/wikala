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
}
