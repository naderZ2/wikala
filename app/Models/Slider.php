<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FileUploadTrait;

class Slider extends Model
{
    use FileUploadTrait;
    use HasFactory;
    protected $fillable = [
        'name'  ,
        'link'
    ];
    protected $hidden = 
    [
        'updated_at',
        'created_at',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $this->uploadFile($value,'categories',$this->attributes['name'] ?? "");
    }

}
