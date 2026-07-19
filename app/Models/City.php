<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar' , 'name_en' ,
        'parent_id', 'country_id'
    ];

    protected $hidden = [ "created_at",'updated_at'  ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($city) {
            if ($city->parent_id) {
                $parent = self::find($city->parent_id);
                if ($parent) {
                    $city->country_id = $parent->country_id;
                }
            }
        });
    }

    public function parent(){
        return $this->belongsTo(City::class,'parent_id','id');
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function regions(){
        return $this->hasMany(City::class, 'parent_id', 'id');
    }

    public function sellers()
    {
        return $this->belongsToMany(Seller::class);
    }

    public function drivers()
    {
        return $this->belongsToMany(Driver::class);
    }

}
