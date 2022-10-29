<?php

namespace App\Http\Controllers;

use App\Cat_title;
use App\Customer;
use App\Detail_order;
use App\order;
use App\Products;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Mail;

class UsersCheckoutController extends Controller
{
    //

    function store(Request $request){
      
        $request->validate(
            [
                // tạo điều kiện
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                
            ],

            //chú thích key word
            [
                'required' => ':attribute không được để trống !!!',
                'max' => ':attribute có độ dài tối đa :max kí tự !!!',
                'min' => ':attribute có độ dài tối thiểu :min kí tự !!!',
                'confirmed' => 'Xác nhận mật khẩu không thành công , vui lòng check lại !!!'
            ],

            [
                'name' => 'Họ và tên',
                'email' => 'Email',
                'phone' => 'Số điện thoại',
                'address' => 'Địa chỉ',
            ]
        );

      

        $customer = new order;

        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->pay = $request->input('payment-method');

        $customer->code = "HB-".rand();
        $customer->format = "Đang xử lý";


        $customer->num_order = Cart::count();

        $customer->total = Cart::total();

        $name =  $request->input('name');
        $email =  $request->input('email');
        $phone =  $request->input('phone');
        $pay =  $request->input('payment-method');
        // $code = $request->input('code');


        $customer->save();
           
        foreach(Cart::content() as $item){

            DB::table('detail_orders')->insert(
                [
                    'cat_title' => $item->options->cat_title,
                    'product_name' => $item->name,
                    'product_thumb' => $item->options->thumb,
                    'price' => $item->price,
                    'qty' => $item->qty,
                    'sub_total' => $item->total,
                    'order_id'=> $customer->id,
                ],
            );
          
               
        }

        // return "ok";
        Mail::to($request->input('email'))->send(new ConfirmMail);
        // Mail::to('6151071059@st.utc2.edu.vn')->send(new ConfirmMail);

        // return view('success/show');;

        

        $request->session()->put(
            [
                'email' => $email,
                'name' => $name,
                'phone' => $phone,
                'pay'=> $pay,
                'code' =>$customer->code,
           
            ]
        );
        // return ;
        // return redirect()->route('success' , [$email,$name,$phone,$pay]);
        return redirect('chuc-mung-ban-da-dat-hang-thanh-cong');
      
    }
    
   

    function show(Request $request){
        return view('users.checkout.checkout');
    }

    function destroy(){
        Cart::destroy();
        return redirect('/');
    }
}
