<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportOption extends Model
{
    use HasFactory;


    
    protected $fillable = [
        'title_ar',
        'title_en',
        'enable',
    ];


    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
