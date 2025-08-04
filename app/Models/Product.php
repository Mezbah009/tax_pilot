<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductFirstSection;
use App\Models\ProductSecondSection;
use App\Models\ProductThirdSection;
use App\Models\ProductFourthSection;
use App\Models\ProductFifthSection;
use App\Models\ProductSixthSection;
use App\Models\ProductSeventhSection;






class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link',
        'description',
        'category_id',
        'sub_category_id',
        'sub_sub_category_id',
        'image_id',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    // Category relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Subcategory relationship
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    // Sub Subcategory relationship
    public function subsubcategory()
    {
        return $this->belongsTo(SubSubCategory::class, 'sub_sub_category_id');
    }


    public function sections()
    {
        return $this->hasMany(ProductFirstSection::class);
    }

    public function secondSections()
    {
        return $this->hasMany(ProductSecondSection::class);
    }
    public function thirdSections()
    {
        return $this->hasMany(ProductThirdSection::class);
    }

    public function fourthSections()
    {
        return $this->hasMany(ProductFourthSection::class);
    }

    public function fifthSections()
    {
        return $this->hasMany(ProductFifthSection::class);
    }

    public function sixthSections()
    {
        return $this->hasMany(ProductSixthSection::class);
    }

    public function seventhSections()
    {
        return $this->hasMany(ProductSeventhSection::class);
    }
    public function demos()
    {
        return $this->hasMany(Demo::class);
    }
}
