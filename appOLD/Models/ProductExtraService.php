<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductExtraService  extends Model
{
    use HasFactory;
    protected $fillable = [
        'description_en' , 'description_ar' ,
         'price',
        'product_id' 
    ]; 


}
