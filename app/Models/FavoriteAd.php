<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteAd extends Model
{
    use HasFactory;

    protected $table = 'favorite_ads';

    protected $fillable = [
        'user_id',
        'ad_id',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class, 'ad_id', 'id');
    }
}
