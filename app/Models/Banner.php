<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FileUploadTrait;

class Banner extends Model
{
    use FileUploadTrait;
    use HasFactory;
    protected $fillable = [
        'name', 'category_id', 'seller_id', 'is_paid', 'start_date', 'end_date', 'payment_details'
    ];
    
    protected $hidden = [
        'updated_at',
        'created_at',
        'category_id'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->uploadFile($value,'categories',$this->attributes['name'] ?? "");
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

}
