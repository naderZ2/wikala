<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'whatsapp_number','facebook',
        'insta','youtube',
        'description','privacy',
        'terms_ar','terms_en','access_token','instance_id'
    ];

    protected $hidden = ['updated_at'];
}
