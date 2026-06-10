<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLocations extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','details',
        'latitude','longitude'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
