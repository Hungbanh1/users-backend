<?php

namespace App\Http\Controllers;

use App\order;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active' => 'dashboard']);
            return $next($request);
        });
    }
    

    function show(Request $request){
        $order = order::orderBy('updated_at' , 'desc')->paginate(7);
        $count_processing = order::where('format',  'LIKE' , '%Đang xử lý%')->count();
        $count_being_transported = order::where('format',  'LIKE' , '%Đang vận chuyển%')->count();
        $count_success = order::where('format',  'LIKE' , '%Đã giao hàng%')->count();
        $count_cancel = order::where('format',  'LIKE' , '%Hủy đơn hàng%')->count();



        $count = [$count_processing,$count_being_transported,$count_success,$count_cancel];

        
        
   
        return view('admin.dashboard' , compact('order' ,'count'));
     
    }
}
