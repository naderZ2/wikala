<?php

namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver  extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name' , 'email',
        'password' , 'image',
        'device_id' , 'phone',
        'active'
    ];

    protected $hidden = 
    [
        'password',
        'device_id',
        'updated_at'
    ];


    public function setPasswordAttribute($value)
    {
        if(!is_null($value))
            $this->attributes['password'] = bcrypt($value);
    }

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = $this->uploadFile($value,'drivers',$this->attributes['image'] ?? "");
    }

    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

}
