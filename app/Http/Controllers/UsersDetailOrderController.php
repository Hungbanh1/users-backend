<?php

namespace App\Http\Controllers;

use App\Detail_order;
use Illuminate\Http\Request;

class UsersDetailOrderController extends Controller
{
    //

    function read(){
        $detailorder = Detail_order::find(3)
        ->order;

        dd($detailorder);
    }
}
