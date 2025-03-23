<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'id' , 'user_id',
        'order_id' ,'status',
        'amount' , 'payment_method' 
        ,'payment_option' ,'payment_order_id',
        'payment_id'
    ];
    
        protected $table="payment";

    public function client(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    
}

