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
        'name', 'link', 'type', 'video'
    ];
    protected $hidden = 
    [
        'updated_at',
        'created_at',
    ];

    public function setNameAttribute($value)
    {
        if ($value && is_object($value)) {
            $mime = $value->getMimeType();
            $ext  = strtolower($value->getClientOriginalExtension());

            if (str_starts_with($mime, 'video/')) {
                // Video file: store in 'video' column, clear 'name'
                $this->attributes['type']  = 'video';
                $this->attributes['video'] = $this->uploadFile($value, 'sliders', $this->attributes['video'] ?? "");
                $this->attributes['name']  = null;
                return;
            } elseif ($ext === 'gif' || $mime === 'image/gif') {
                $this->attributes['type'] = 'gif';
            } else {
                $this->attributes['type'] = 'image';
            }

            $this->attributes['name'] = $this->uploadFile($value, 'sliders', $this->attributes['name'] ?? "");
        }
    }

}
