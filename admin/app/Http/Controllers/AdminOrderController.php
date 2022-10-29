<?php

namespace App\Http\Controllers;

use App\order;
use App\detail_order;
use App\Product;
use App\role;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //

    function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active' => 'order']);
            return $next($request);
        });
    }
    function list(Request $request){
        // $order 
        $order = order::all();
        $count_processing = order::where('format',  'LIKE' , '%Đang xử lý%')->count();
        $count_being_transported = order::where('format',  'LIKE' , '%Đang vận chuyển%')->count();
        $count_success = order::where('format',  'LIKE' , '%Đã giao hàng%')->count();
        $count_cancel = order::where('format',  'LIKE' , '%Hủy đơn hàng%')->count();

        $count = [$count_processing,$count_being_transported,$count_success,$count_cancel];

        $list_act = [
            'processing' => "Đang xử lý",
            'being_transported' => 'Đang vận chuyển',
            'successful'=> 'Đã giao thành công',
            'cancel' => "Hủy đơn hàng"
        ];

        $status = $request->input('status');

        // dd($status);
        if($status == 'processing'){
            $order = Order::where('format',  'LIKE' , '%Đang xử lý%')->paginate(3);
        }
        elseif($status == 'being_transported'){
            $order = order::where('format',  'LIKE' , '%Đang vận chuyển%')->paginate(3);
        }
        elseif($status == 'cancel'){
            $order = order::where('format',  'LIKE' , '%Hủy đơn hàng%')->paginate(3);
        }
        else{
            $order = order::where('format',  'LIKE' , '%Đã giao hàng%')->paginate(3);
            $order = order::paginate(6);
 

        }
      



        return view('admin.order.list' , compact('order' , 'count' , 'list_act' , 'status'));
    }
    

    function detail_order($id){
        // return $id;
        $order = order::find($id);

        $detail_order = order::find($id)
        ->detail_order;

        $test = order::find(1)
        ->detail_order;
        // dd($test);

        // dd($detail_order);

        // $detail_order = detail_order::find($id);
        // dd($detail_order);
        $list_act = [
            'processing' => "Đang xử lý",
            'being_transported' => 'Đang vận chuyển',
            'successful'=> 'Đã giao thành công',
            'cancel' => "Hủy đơn hàng"
        ];
        return view('admin.order.detail_order' , compact('order' , 'list_act' , 'detail_order'));
    }

   public function action(Request $request , $id){
        // return $id;
        $act = $request->input('act');
        if($act == 'processing'){
            $act = "Đang xử lý";
        }
        elseif($act == 'being_transported'){
            $act = 'Đang vận chuyển';
        }
        elseif($act == 'successful'){
            $act = "Đã giao hàng";
        }
        else{
            $act = "Hủy đơn hàng";
        }

        $order = Order::find($id);

        $order->format = $act;
        $order->save();
        return redirect('dashboard')->with('status' , 'Đã cập nhật thành công');

    }

    function update(Request $request){
        $list_check = $request->input('list_check');
        $act = $request->input('act');
        // return $act;
        // dd($list_check);
        $order = Order::find($list_check);

        foreach($list_check as $item){

        }

        // dd($order);
     
        if($list_check){
           
            if(!empty($list_check)){
                $act = $request->input('act');
                // dd($act);

                if($act == 'processing'){
                    $act = "Đang xử lý";

                    Order::whereIn('id',$list_check)
                    ->update([
                        'format' => $act,
                    ]);

                    // Product::where('id' , $list_check)
                    // ->update();
                



            
                    return redirect('admin/order/list')->with('status' ,'Đã cập nhật đơn hàng thành công !!!');
                }
                if($act == 'being_transported'){

                    // $order = Order::find($list_check);
                //    return $order;
                    $act = "Đang vận chuyển";
                    Order::whereIn('id' , $list_check)
                    ->update([
                        'format' => $act,
                    ]);
             
                    return redirect('admin/order/list')->with('status' ,'Đã cập nhật đơn hàng thành công !!!');


                }

                if($act == 'successful'){

                    // $order = Order::find($list_check);
                    $act = "Đã giao hàng";

                    Order::whereIn('id',$list_check)
                    ->update([
                        'format' => $act,
                    ]);
 
             
                    return redirect('admin/order/list')->with('status' ,'Đã cập nhật đơn hàng thành công !!!');


                }
                if($act == 'cancel'){

                    // $order = Order::find($list_check);
                    $act = "Hủy đơn hàng";
                    
                    Order::whereIn('id',$list_check)
                    ->update([
                        'format' => $act,
                    ]);
 
             
                    return redirect('admin/order/list')->with('status' ,'Đã cập nhật đơn hàng thành công !!!');


                }
                return redirect('admin/order/list')->with('status' ,'Bạn phải chọn 1 trong những thao tác trên');
                
            }
           
        }
        else{
            return redirect('admin/order/list')->with('status' ,'Mời bạn chọn lại !!!');
        }

    }
}   
