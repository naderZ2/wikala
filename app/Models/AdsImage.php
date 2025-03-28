<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsImage extends Model
{
    use HasFactory;
    protected $table = 'ads_images';

    protected $fillable = [
        'ad_id',
        'image_path',
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class, 'ad_id', 'id');
    }
}
