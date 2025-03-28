<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedAd extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ad_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class,'ad_id','id');
    }
}
