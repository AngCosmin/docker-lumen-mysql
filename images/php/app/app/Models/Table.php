<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
        'restaurant_id',
        'identify',
    ];

    protected $hidden = [
        
    ];
}
