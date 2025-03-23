<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FileUploadTrait;

class Category extends Model
{
    use FileUploadTrait;
    use HasFactory;
    protected $fillable = [
        'parent_id' , 'name_ar' , 
        'image' , 'end_point',
        'name_en' ,'rank','order'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    // public function setImageAttribute($value)
    // {
    //     $this->attributes['image'] = $this->uploadFile($value,'categories',$this->attributes['image'] ?? "");
    // }

    public function sellers()
    {
        return $this->belongsToMany(Seller::class)->where('active',1);
    }

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function children(){
        $name =request()->header('Lang') == "en" ?"name_en as name":"name_ar as name";
        return $this->hasMany(Category::class,'parent_id')->select('id',$name,'parent_id','image','order')->orderBy('order');
    }

    public function subCategories(){
        $name =request()->header('Lang') == "en" ?"name_en as name":"name_ar as name";
        return $this->hasMany(Category::class,'parent_id')->select('id',$name,'parent_id','image','end_point','order');
    }
    
    public function sellerServicesAvailability(){
        return $this->hasMany(SellerServicesAvailability::class);
    }
    
    


}
