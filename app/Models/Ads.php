<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    //
    protected $fillable = [
        'id',
        'title',
        'image',
        'url',
        'is_active'
    ];
}
