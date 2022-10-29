<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //

    protected $fillable =[
        'product_name' , 'id' , 'cat_id' ,'name', 'cat_title' , 'product_title' , 'price', 'old_price' , 'code' , 'product_desc',
        'product_thumb' , 'product_content' ,
    ];

   
}

