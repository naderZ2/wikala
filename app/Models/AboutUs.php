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
        'insta','tiktok','youtube',"phone","email",'ads_time_user','ads_time_business',
        'description','privacy','free_ads_business','free_ads_user',
        'terms_ar','terms_en','access_token','instance_id','image_limit','delivery_fee',
        'banner_price', 'slider_price', 'slider_days'
    ];

    protected $hidden = ['updated_at'];
}
