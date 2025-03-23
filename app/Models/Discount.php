<?php

namespace App\Models;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'code','start_date',
        'end_date','type',
        'value','coupons_number',
        'coupons_user_number',
        'active' ,'used_coupons','seller_id'
    ];

    protected $hidden = ['created_at', 'updated_at'];




    public function sellers()
{
    return $this->belongsToMany(Seller::class);
}

}
