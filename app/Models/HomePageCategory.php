<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageCategory extends Model
{
    use HasFactory;


    protected $table = 'home_page_category';

    protected $fillable = [
        'category_id',
        'name_ar',
        'name_en',
        'sort_order',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


}
