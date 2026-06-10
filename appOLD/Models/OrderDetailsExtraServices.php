<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailsExtraServices extends Model
{
    use HasFactory;
    protected $table="order_details_extra_services";
    protected $fillable = [
        'order_details_id' , 'price',
        'extra_service_id' 
    ];

    protected $hidden = ['created_at','updated_at'];
    

    public function OrderDetails(){
        return $this->belongsTo(OrderDetails::class,'order_details_id');
    }
    
    public function extraDetails(){
        return $this->belongsTo(ProductExtraService::class,'extra_service_id');
    }
}
