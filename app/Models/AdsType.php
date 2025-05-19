<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsType extends Model
{
    use HasFactory;

    protected $table = 'ads_type';

    protected $fillable = [
        'name',
        'enable',
    ];

    public function ads()
    {
        return $this->hasMany(Ad::class, 'type_id');
    }
    
}
