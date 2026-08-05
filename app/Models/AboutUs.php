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
        'banner_price', 'slider_price', 'slider_days',
        'arrive_whats_base_url', 'arrive_whats_token',
        'arrive_whats_default_country_code', 'arrive_whats_receipt_phone'
    ];

    protected $hidden = [
        'updated_at',
        'arrive_whats_token',
        'arrive_whats_receipt_phone',
        'access_token',
        'instance_id',
    ];

    protected $casts = [
        'arrive_whats_token' => 'encrypted',
    ];
}
