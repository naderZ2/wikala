<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;
class Notification extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'name_ar' , 'description_ar',
        'name_en' , 'description_en',
        'type' , 'product_id',
        'seller_id' ,'region_id',
        'user_id','updated_at'
      
    ];

    protected $hidden = ['created_at' ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])
        ->format('Y-m-d H:i:s');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function region()
    {
        return $this->belongsTo(City::class);
    }
}
