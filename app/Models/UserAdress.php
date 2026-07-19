<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAdress extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table="address_user";
    protected $fillable = [
        'name', 'user_id' , 'region_id' , 'country_id', 
        'floor_no' ,'flat_no' , 
        'building_no' ,'block_no' , 
        'street'  , 'notes','latitude' , 'longitude' 
    ]; 

    public function region(){
        return $this->belongsTo(City::class);
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

    protected $hidden = 
    [
        "user_id",
        "region_id",
        "country_id",
        'updated_at',
        'created_at',
        'deleted_at',
    ];
    
}
