<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable =[
        'name' , 'address' , 'phone' , 'email' , 'payment-method' , 'price'
    ];

    public $table;
}
