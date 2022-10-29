<?php

namespace App\Http\Controllers;

use App\Detail_order;
use App\Order;
use Illuminate\Http\Request;

class UsersOrderController extends Controller
{
    //

    function read(){
        $order = Order::find(2)
        ->detail_order;
        $name = Detail_order::find(3)
        ->order;
        // dd($order);

       dd ($name);
    }
}
