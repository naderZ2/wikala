<?php
namespace App\Models;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class SellerServicesAvailability extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id' , 'product_id',
        'category_id' , 'availability' ,'date'
    ];
    
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function seller(){
        return $this->belongsTo(Seller::class,'seller_id','id');
    }
}