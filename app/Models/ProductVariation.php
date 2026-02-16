<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class ProductVariation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function attributes(){
        return $this->hasMany(ProductVariationAttribute::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }
}
