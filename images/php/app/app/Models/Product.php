<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'restaurant_id',
        'category_id',
        'name',
        'price',
        'description',
        'picture',
    ];

    protected $hidden = [
        
    ];
}
