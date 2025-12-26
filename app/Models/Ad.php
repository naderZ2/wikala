<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'category_id',
        'user_id',
        'is_commercial',
        'type_id',
        'city_id',
        'region_id',
        'rejected_id',
        'ad_number',
        'price',
        'title',
        'description',
        'contact_method',
        'negotiable',
        'main_image',
        'status',
        'start_date',
        'end_date',
        'is_sponsored',
        'sponsored_price',
        'sponsored_at',
    ];

    protected $casts = [
        'is_sponsored' => 'boolean',
        'sponsored_price' => 'decimal:2',
        'sponsored_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function region()
    {
        return $this->belongsTo(City::class, 'region_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    

    public function rejectedReason()
    {
        return $this->belongsTo(RejectedReason::class, 'rejected_id');
    }
    public function adsType()
{
    return $this->belongsTo(AdsType::class, 'type_id');
}

    public function images()
    {
        return $this->hasMany(AdsImage::class, );
    }

    public function attributes()
    {
        return $this->hasMany(AdsAttribute::class, );
    }

    public function favorites()
    {
        return $this->hasMany(FavoriteAd::class);
    }

    public function savedAd()
    {
        return $this->hasMany(SavedAd::class);
    }

    public function recentViews()
    {
        return $this->hasMany(RecentlyViewAd::class);
    }

    public function hiddenAds()
    {
        return $this->hasMany(HiddenAd::class, 'ad_id');
    }

    public function auctions()
    {
        return $this->hasMany(Auction::class, 'ad_id');
    }


    public function getPriceAttribute($value)
    {
        return (int)$value ;
    }
}
