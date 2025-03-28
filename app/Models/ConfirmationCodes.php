<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmationCodes extends Model
{
    use HasFactory;
    protected $fillable = [

        'id',
        'code',
        'phone',
        'active'
    ];
   

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
