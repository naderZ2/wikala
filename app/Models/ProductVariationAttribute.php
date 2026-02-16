<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariationAttribute extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function variation(){
        return $this->belongsTo(ProductVariation::class, 'product_variation_id');
    }

    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }
}
