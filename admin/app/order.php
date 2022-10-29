<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'name' , 'email' , 'phone' , 'address' , 'num_order' , ' total',  'code' ,'format','pay' , 'created_at','update_at'
    ];

    function detail_order(){
        // tạo mối qh vs bảng detail_order

      
        return $this->hasMany('App\detail_order');

    }
}
