<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_order extends Model
{
    //

    protected $fillable = [
        'cat_title' , 'product_name' , 'product_thumb' , 'price' , 'qty' , 'sub_total' , 'order_id'
    ];
    function order(){
        return $this->belongsTo('App\order');
    }
}
