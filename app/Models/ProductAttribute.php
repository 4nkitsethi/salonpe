<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = ['product_id',  'attribute_type',  'attribute_data',  'bar_code',  'hsn_code',  'ean_code',  'gst_amount',  'mrp',     'discounted_mrp',  'purchase_price',  'wholesale_price',  'salon_price',  'tax',     'quantity',  'additional_description'];


    public function media(){
        return $this->hasMany(Media::class,'associate_id','id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
            'attribute_type' => 'array',
            'attribute_data' => 'object',
    ];


}
