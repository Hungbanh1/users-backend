<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'page_title' , 'page_thumb1' ,'page_thumb1', 'page_content' , 'cat_title','slug'
    ];
}
