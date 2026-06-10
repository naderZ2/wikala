<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FileUploadTrait;

class UserDailyEvent extends Model
{
    use FileUploadTrait;
    use HasFactory;
    protected $fillable = [
        'id'  , 'daily_event_id','user_id'
    ];
    protected $table="user_daily_event";
    
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
    
    public function dailyEvent()
    {
        return $this->belongsTo(DailyEvents::class, 'daily_event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



}
