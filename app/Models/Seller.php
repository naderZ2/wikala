<?php

namespace App\Models;

use App\Models\Discount;
use App\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use HasFactory;
    use FileUploadTrait;

    protected $guard = 'seller';
    protected $fillable = [
        'name' , 'email',
        'password' , 'active',
        'latitude','longitude',
        'details','img_path'
    ];

    protected $hidden = 
    [
        'password' , 'updated_at'
    ];


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
    
       public function setImgPathAttribute($value)
    {
        $this->attributes['img_path'] = $this->uploadFile($value,'profiles',$this->attributes['img_path'] ?? "");
    }

}
