<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FileUploadTrait;

class EventCategory extends Model
{
    use FileUploadTrait;
    use HasFactory;
    protected $fillable = [
        'name_ar' , 
        'image' ,
        'name_en' ,
        'order' ,
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = $this->uploadFile($value,'categories',$this->attributes['image'] ?? "");
    }




}
