<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class list_role extends Model
{
    //

    function roles(){
        return $this->belongsToMany(role::class,'list_role_role' ,'role_id' );
    }

    function list_roles(){
        return $this->hasMany(list_role::class,'parent_id');
    }

}
