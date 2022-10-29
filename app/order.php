<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    protected $fillable = [
        'name' , 'email' , 'phone' , 'address' , 'num_order' , ' total',
    ];

    function detail_order(){
        // tạo mối qh vs bảng detail_order

      
        return $this->hasMany('App\detail_order');

    }
}
