<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'product_name' , 'product_thumb' , 'product_content' , 'product_desc' , 'price' , 'cat_title',
    ];
}
