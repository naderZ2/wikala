<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCategoryLimit extends Model
{
    use HasFactory;

    protected $table = 'user_category_limits';

    protected $fillable = [
        'user_id',
        'category_id',
        'free_ads_limit',
        'used_ads_count',
    ];

    protected $casts = [
        'free_ads_limit' => 'integer',
        'used_ads_count' => 'integer',
    ];

    /**
     * Get the user that owns this limit.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category this limit belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Check if user can create more free ads in this category.
     */
    public function canCreateFreeAd()
    {
        return $this->used_ads_count < $this->free_ads_limit;
    }

    /**
     * Get remaining free ads count.
     */
    public function getRemainingAdsAttribute()
    {
        return max(0, $this->free_ads_limit - $this->used_ads_count);
    }
}
