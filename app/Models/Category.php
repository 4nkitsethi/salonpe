<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','parent_id'];

    public function subCategories(){
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function category(){
        return $this->hasOne(Category::class,'id','parent_id');
    }
}
