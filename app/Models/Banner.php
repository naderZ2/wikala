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
        'name'  , 'category_id'
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

}
