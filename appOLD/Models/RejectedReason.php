<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RejectedReason extends Model
{
    use HasFactory;


    
    protected $table = 'rejected_reason';

    protected $fillable = [
        'name',
        'enable',
        'description',
    ];


    public function ads()
    {
        return $this->hasMany(Ad::class, 'rejected_id');
    }

}
