<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id' , 'price',
        'quantity' , 'order_id'
    ];

    protected $hidden = ['created_at','updated_at','order_id','product_id'];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
    public function order(){
        return $this->belongsTo(Order::class);
    }
    
    public function extraService(){
        return $this->belongsTo(OrderDetailsExtraServices::class,'id','order_details_id');
    }
}
