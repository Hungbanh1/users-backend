<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $fillable = [
        'name_role' , 'desc_role' , 'list_role' ,
    ];

    function list_roles(){
        return $this->belongsToMany(list_role::class,'list_role_role','role_id');

    }

    function user(){
        return $this->hasMany('App\User' , 'permission');
        //khóa ngoại permission


    }
    
}
