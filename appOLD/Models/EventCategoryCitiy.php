<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FileUploadTrait;

class EventCategoryCitiy extends Model

{
    use FileUploadTrait;
    use HasFactory;
    protected $fillable = [
        'city_id','event_category_id'
    ];
    protected $table="event_category_cities";

    protected $hidden = ['created_at', 'updated_at'];


    
    public function eventCategory(){
        return $this->belongsTo(EventCategory::class,'event_category_id');
    }

    


}
