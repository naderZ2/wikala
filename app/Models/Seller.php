<?php

namespace App\Models;

use App\Models\Discount;
use App\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Seller extends Authenticatable
{
    use HasFactory, HasApiTokens;
    use FileUploadTrait;
    use HasRoles;

    protected $guard = 'seller';
    protected $fillable = [
        'name', 'email', 'phone',
        'password', 'active',
        'latitude', 'longitude',
        'details', 'img_path', 'about',
        'shop_name_en', 'shop_name_ar', 'banner', 'parent_id',
        'commission_type', 'commission_value',
        'icarry_warehouse_name',
        'plan_id', 'payment_status', 'payment_details',
        'plan_starts_at', 'plan_ends_at',
        'civil_id_image', 'commercial_license_image'
    ];

    protected $hidden = 
    [
        'password', 'updated_at'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function subscriptionPayments()
    {
        return $this->hasMany(SellerSubscriptionPayment::class);
    }


    public function discounts()
{
    return $this->belongsToMany(Discount::class);
}
    public function setPasswordAttribute($value){
        if(!is_null($value))
            $this->attributes['password'] = bcrypt($value);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
   
    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    public function setImgPathAttribute($value)
    {
        if ($value instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['img_path'] = $this->uploadFile($value, 'profiles', $this->attributes['img_path'] ?? "");
        } else {
            $this->attributes['img_path'] = $value;
        }
    }

    public function setBannerAttribute($value)
    {
        if ($value instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['banner'] = $this->uploadFile($value, 'banners', $this->attributes['banner'] ?? "");
        } else {
            $this->attributes['banner'] = $value;
        }
    }

    public function setCivilIdImageAttribute($value)
    {
        if ($value instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['civil_id_image'] = $this->uploadFile($value, 'documents', $this->attributes['civil_id_image'] ?? "");
        } else {
            $this->attributes['civil_id_image'] = $value;
        }
    }

    public function setCommercialLicenseImageAttribute($value)
    {
        if ($value instanceof \Illuminate\Http\UploadedFile) {
            $this->attributes['commercial_license_image'] = $this->uploadFile($value, 'documents', $this->attributes['commercial_license_image'] ?? "");
        } else {
            $this->attributes['commercial_license_image'] = $value;
        }
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function employees()
    {
        return $this->hasMany(Seller::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Seller::class, 'parent_id');
    }

    public function getMainSellerId()
    {
        return $this->parent_id ?? $this->id;
    }

    /**
     * Calculate the commission amount from a given total
     */
    public function calculateCommission($amount)
    {
        if ($this->commission_type === 'fixed') {
            return min($this->commission_value, $amount);
        }
        // percentage
        return round($amount * ($this->commission_value / 100), 2);
    }
}
