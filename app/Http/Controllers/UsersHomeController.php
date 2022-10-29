<?php

namespace App\Http\Controllers;

use App\Mix_products;
use Illuminate\Http\Request;

class UsersHomeController extends Controller
{
    //

    function show(){
        $mix_products = Mix_products::all();

        
    }
}
