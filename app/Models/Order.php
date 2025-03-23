<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id' , 'total_price' ,
        'status' , 'order_number' ,
        'payment_type' , 'seller_id' ,
        'driver_id' ,'delivery_time',
        'actual_delivery_time' ,'cancel_time',
        'confirmed_time' , 'shipped_time',
        'out_for_delivery_time' , 'address_id',
        'file','type','reason' ,'bill_url','payment_status','delivery_fee'
    ];
    
    protected $dates = [
        'delivery_time',
        //actual_delivery_time',
        //'cancel_time',
        //'shipped_time',
       // 'out_for_delivery_time' ,
       'updated_at',
        'created_at'
    ];
    
    protected $casts = [
	'updated_at' => 'datetime:d-M',
	'out_for_delivery_time' => 'datetime:d-M-Y',
	'created_at' => 'datetime:d-M-Y',
	'shipped_time' => 'datetime:d-M-Y',
	'confirmed_time' => 'datetime:d-M-Y',
	'actual_delivery_time' => 'datetime:d-M-Y',
	'delivery_time' => 'datetime:d-M-Y',

    ];
    protected $hidden = ['user_id','seller_id','driver_id','address_id'];

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    
     public function seller(){
        return $this->belongsTo(Seller::class,'seller_id','id');
    }


    public function driver(){
        return $this->belongsTo(Driver::class);
    }
    
    public function address(){
        return $this->hasOne(UserAdress::class,'id','address_id');
    }
}
