<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerSubscriptionPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'plan_id',
        'amount',
        'status',
        'transaction_id',
        'payment_method',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'amount' => 'decimal:2',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
