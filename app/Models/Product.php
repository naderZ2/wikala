<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title_en','title_ar',
        'name_ar' ,'name_en',
        'description_en' , 'description_ar' ,
        'quantity' , 'price','old_price',
        'seller_id' , 'category_id',
        'main_image' ,'is_available',
        'picture','serving','deleted_at'
    ]; 

    public function images(){
        return $this->hasMany(ProductImage::class);
    }
    public function extraServices(){
        return $this->hasMany(ProductExtraService::class);
    }
    
    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    
       public function sellerServicesAvailability(){
        return $this->hasMany(SellerServicesAvailability::class);
    }
}
