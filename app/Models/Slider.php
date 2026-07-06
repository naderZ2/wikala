<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'link', 'type', 'video', 'seller_id', 'is_paid', 'start_date', 'end_date', 'payment_details'
    ];
    protected $hidden = 
    [
        'updated_at',
        'created_at',
    ];

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

}
