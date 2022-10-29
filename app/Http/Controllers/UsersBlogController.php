<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersBlogController extends Controller
{
    //

    function list(){
        // return "ok";
        return view('users.blog.list');
    }
}
