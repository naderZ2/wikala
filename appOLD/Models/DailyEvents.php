<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FileUploadTrait;

class DailyEvents extends Model

{
    use FileUploadTrait;
    use HasFactory;
    protected $fillable = [
       	"event_category_id",	"phone", "time",
       	"whatsApp_number",	"date"	,'active',
       	"address",	"family_name",
       	"description_ar", 	"description_en",
       	"longitude"	, "latitude"	,
       	"name_ar",	"name_en"	,'image',
       	'city_id','type','f_phone','user_id',
       	'f_whatsApp_number','f_address','f_latitude','f_longitude','rejection_reason'
    ];
    protected $table="daliy_events";

    protected $hidden = ['created_at', 'updated_at'];

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = $this->uploadFile($value,'categories',$this->attributes['image'] ?? "");
    }
    
    public function eventCategory(){
        return $this->belongsTo(EventCategory::class,'event_category_id');
    }
    
    public function userDailyEvents()
    {
        return $this->hasMany(UserDailyEvent::class, 'daily_event_id');
    }


    


}
