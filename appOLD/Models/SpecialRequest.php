<?php

namespace App\Models;

use App\Models\SpecialRequestDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpecialRequest extends Model
{
    use HasFactory;


    protected $fillable = [
        'category_id' , 'family_name',
        'area_id' , 'budget',
        'date','time',
        'description'
    ];








    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function area(){
        return $this->hasOne(City::class,'id','area_id');
    }



}
