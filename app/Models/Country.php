<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'name_en', 'flag', 'currency', 'currency_en', 'country_code', 'special', 'active'
    ];

    protected $hidden = ['name_en','currency', 'currency_en', 'flag', 'special', 'active', 'created_at', 'updated_at',
        'deleted_at','picture'];
}
