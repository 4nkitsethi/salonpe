<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Tag extends Model
{
    use HasFactory;

    protected $fillable = ["name","category"];

     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
                            'category' => 'array',
    ];

      /**
     * Get the user's first name.
    **/
    protected function category(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Category::select(['id','name','parent_id'])->whereIn('id', json_decode($value))->get(),
        );
    }

}
