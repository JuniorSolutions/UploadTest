<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable = [
        'rubric_1',
        'rubric_2',
        'category',
        'manufacturer',
        'product_name',
        'code',
        'description',
        'price',
        'warranty',
        'presence',
    ];
}