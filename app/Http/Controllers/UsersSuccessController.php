<?php

namespace App\Http\Controllers;

use App\order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UsersSuccessController extends Controller
{
    //

    function show(Request $request){
        // return "OK";
        $phone_cus = request()->session()->get('phone');
        // return $phone_cus;

        $info_cus = Order::where("phone", $phone_cus)->first();
        // return $info_cus->code;  
        

        $code =  $info_cus->code;
        // return $code;
        // $order = order
        $time = Carbon::now();
        // $code = order::get($id)
        return view('users.success.show' ,compact('time' , 'code') );
    }
}
