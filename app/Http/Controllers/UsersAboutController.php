<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class UsersAboutController extends Controller
{
    //
    function about(){
        // return "ok";
        $about = About::all()
        ->first();

        return view('users.about.about', compact('about'));
    }
}
