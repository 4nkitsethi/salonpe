<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['associated','path','associate_id','featured'];

    /**
     * Get the user's first name.
    **/
    protected function path(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => "/storage/".$value,
        );
    }
}
