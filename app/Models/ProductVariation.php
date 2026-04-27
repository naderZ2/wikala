<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function parent(){
        return $this->belongsTo(ProductVariation::class, 'parent_id');
    }

    public function children(){
        return $this->hasMany(ProductVariation::class, 'parent_id');
    }

    /**
     * Recursive relationship: children with their children (infinite depth)
     */
    public function allChildren(){
        return $this->children()->with('allChildren.attributes');
    }

    public function attributes(){
        return $this->hasMany(ProductVariationAttribute::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }
}
