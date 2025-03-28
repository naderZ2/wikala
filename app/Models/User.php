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
        'name', 'image',
        'phone', 'password', 
        'device_id','email' ,
        'deleted_at','lang' ,
        'provider_id','provider_name',
        'active','bio','date_of_birth'
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
        // 'device_id',
        'updated_at',
        'created_at',
        'deleted_at'
    ];
    public function setImageAttribute($value)
    {
        $this->attributes['image'] = $this->uploadFile($value,'profiles',$this->attributes['image'] ?? "");
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $dates =[
        "birth_date"
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function setPasswordAttribute($value){
        if(!is_null($value))
            $this->attributes['password'] = bcrypt($value);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function region(){
        return $this->belongsTo(City::class);
    }

    public function address(){
        return $this->hasMany(UserAdress::class);
    }

    public function locations()  {
        return $this->hasMany(UserLocations::class);
    }

    public function recentlyViewedAds()
    {
        return $this->hasMany(RecentlyViewAd::class);
    }



}
