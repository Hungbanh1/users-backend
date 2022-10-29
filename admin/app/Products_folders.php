<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products_folders extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'folder_name' , 'folder_parent' , 'slug',
    ];
}
