<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
use App\Models\SpecialRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpecialRequestDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'special_requests_id' ,'user_id',
        'type' , 'content','role'
    ];


    public function specialRequest(){
        return $this->belongsTo(SpecialRequest::class,'special_requests_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');

    }


    public function admin(){
        return $this->belongsTo(Admin::class,'user_id','id');

    }


}
