<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersPageController extends Controller
{
    //
    function list(){
        return view('users.page.list');
        // return "ok";
    }
}
