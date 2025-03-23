<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteSeller extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id' , 'seller_id'
    ];
}
