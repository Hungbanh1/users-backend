<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class demos extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'name_role' , 'desc_role' , 'list_role' ,
    ];
}
