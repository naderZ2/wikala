<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldRejectedReason extends Model
{
    use HasFactory;

    protected $table = 'old_rejected_reason';

    protected $fillable = [
        'ad_id',
        'name',
        'description',
    ];

    // Relationship: Each reason belongs to one ad
    public function ad()
    {
        return $this->belongsTo(Ad::class, 'ad_id');
    }
}
