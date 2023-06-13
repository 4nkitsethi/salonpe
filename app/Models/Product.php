<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Json;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [ "product_id",  "name",  "product_type",  "brand_id",  "sub_category_id",  'thumb_image',  'product_description',  'ingredients',  'how_to_use',  'skin_type',  'hair_type',  'firm',    'Last_CPU_GST',  'tag',     'category_id',  'slug' ,   'best_offers',  'best_selling' , 'weight_size',  'colour_shades',  'tags'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
                            'product_type' => 'array',
                            'skin_type' => 'array',
                            'hair_type' => 'array',
    ];

    public function  category(){
        return $this->belongsTo(Category::class,'sub_category_id');
    }

    public function  brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function attributes(){
        return $this->hasMany(ProductAttribute::class,'product_id','id');
    }

      /**
     * Get the user's first name.
     */
    protected function thumbImage(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => "/storage/".$value,
        );
    }
}
