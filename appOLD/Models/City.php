<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar' , 'name_en' ,
        'parent_id' 
    ];

    protected $hidden = [ "created_at",'updated_at'  ];

    public function parent(){
        return $this->belongsTo(City::class,'parent_id','id');
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
