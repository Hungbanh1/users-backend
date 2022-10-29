<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class list_role_role extends Model
{
    //
    public $table = "list_role_role";

    protected $fillable = [
        'role_id' , 'list_role_id' 
    ];
}
