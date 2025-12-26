<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FileUploadTrait;


class Category extends Model
{
    use FileUploadTrait;
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'name_ar',
        'image',
        'end_point',
        'name_en',
        'rank',
        'order',
        'is_free',
        'free_ads_limit'
    ];

    protected $casts = [
        'is_free' => 'boolean',
        'free_ads_limit' => 'integer',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    // public function setImageAttribute($value)
    // {
    //     $this->attributes['image'] = $this->uploadFile($value,'categories',$this->attributes['image'] ?? "");
    // }

    public function sellers()
    {
        return $this->belongsToMany(Seller::class)->where('active', 1);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        $name = request()->header('Lang') == "en" ? "name_en as name" : "name_ar as name";
        return $this->hasMany(Category::class, 'parent_id')->select('id', $name, 'parent_id', 'image', 'order')->orderBy('order');
    }

    public function subCategories()
    {
        $name = request()->header('Lang') == "en" ? "name_en as name" : "name_ar as name";
        return $this->hasMany(Category::class, 'parent_id')
            ->select('id', $name, 'parent_id', 'image', 'end_point', 'order')
            ->with(['subCategories' => function ($query) {
                $query->with('subCategories'); // Allow recursive fetching of subCategories
            }])
            ->orderBy('order');
    }

    /**
     * Get main category and all its subcategories recursively.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategoriesRecursive()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('subCategoriesRecursive');
    }





    public function sellerServicesAvailability()
    {
        return $this->hasMany(SellerServicesAvailability::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class, 'category_id');
    }

    public function attributes()
    {
        return $this->hasManyThrough(
            Attribute::class,
            CategoryAttribute::class,
            'category_id', // Foreign key on CategoryAttribute table
            'id', // Foreign key on Attribute table
            'id', // Local key on Category table
            'attribute_id' // Local key on CategoryAttribute table
        );
    }

    /**
     * Get user category limits for this category.
     */
    public function userCategoryLimits()
    {
        return $this->hasMany(UserCategoryLimit::class);
    }
}
