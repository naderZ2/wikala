<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use App\Traits\FileUploadTrait;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use FileUploadTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable =
    [
        'name',
        'image',
        'phone',
        'country_code',
        'password',
        'device_id',
        'email',
        'type',
        'limit_ad',
        'deleted_at',
        'lang',
        'followers_count',
        'provider_id',
        'provider_name',
        'active',
        'bio',
        'date_of_birth',
        'country_id',
        'region_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden =
    [
        "region_id",
        'birth_date',
        'password',
        'type',
        'limit_ad',
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    public function setImageAttribute($value)
    {
        if ($value instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['image'] = $this->uploadFile($value, 'profiles', $this->attributes['image'] ?? "");
        } else {
            $this->attributes['image'] = $value;
        }
    }

    protected $dates = [
        "birth_date"
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        if (!is_null($value))
            $this->attributes['password'] = bcrypt($value);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function region()
    {
        return $this->belongsTo(City::class);
    }

    public function address()
    {
        return $this->hasMany(UserAdress::class);
    }

    public static function formatPhoneNumber($phone, $countryCode = null)
    {
        if (is_null($phone)) {
            return null;
        }

        return app(\App\Services\ArriveWhatsService::class)
            ->normalizePhoneNumber((string) $phone, $countryCode);
    }

    public function locations()
    {
        return $this->hasMany(UserLocations::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class, 'user_id');
    }

    public function favoriteAds()
    {
        return $this->hasMany(FavoriteAd::class);
    }

    public function savedAds()
    {
        return $this->hasMany(SavedAd::class);
    }

    public function recentlyViewedAds()
    {
        return $this->hasMany(RecentlyViewAd::class);
    }

    // Relationship: Users that this user is following
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    // Relationship: Users that are following this user
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_id', 'follower_id');
    }

    /**
     * Get user's category limits.
     */
    public function categoryLimits()
    {
        return $this->hasMany(UserCategoryLimit::class);
    }

    /**
     * Get or create limit record for a category.
     */
    public function getCategoryLimit($categoryId)
    {
        return $this->categoryLimits()->where('category_id', $categoryId)->first();
    }

    /**
     * Check if user can create a free ad in this category.
     */
    public function canCreateFreeAdInCategory($categoryId)
    {
        $category = Category::find($categoryId);

        if (!$category || !$category->is_free) {
            return false; // Category doesn't exist or is not free
        }

        // Check if user has a custom limit
        $userLimit = $this->getCategoryLimit($categoryId);

        if ($userLimit) {
            return $userLimit->used_ads_count < $userLimit->free_ads_limit;
        }

        // Use category default limit
        $usedAds = $this->ads()->where('category_id', $categoryId)->count();
        return $usedAds < $category->free_ads_limit;
    }

    /**
     * Get remaining free ads count for a category.
     */
    public function getRemainingFreeAds($categoryId)
    {
        $category = Category::find($categoryId);

        if (!$category || !$category->is_free) {
            return 0;
        }

        $userLimit = $this->getCategoryLimit($categoryId);

        if ($userLimit) {
            return max(0, $userLimit->free_ads_limit - $userLimit->used_ads_count);
        }

        $usedAds = $this->ads()->where('category_id', $categoryId)->count();
        return max(0, $category->free_ads_limit - $usedAds);
    }
}
