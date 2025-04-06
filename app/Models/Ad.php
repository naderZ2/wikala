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
        'type_id',
        'rejected_id',
        'ad_number',
        'title',
        'description',
        'contact_method',
        'negotiable',
        'status',
        'start_date',
        'end_date',
    ];

    // 🧩 Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
}
