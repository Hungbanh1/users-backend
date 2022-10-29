<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class UsersCartController extends Controller
{
    //

    function show()
    {
        return view('users.cart.show');
    }


    function add($id)
    {

        // Cart::add($id, "Product {$id}", 1, 9.99);

        $products = Products::find($id);

        // dd($products->cat_title);
        // return $products;
        // cart::destroy();

        $cart_add = Cart::add([
            'id' => $products->id,
            'name' => $products->product_name,
            'qty' => 1,
            'price' => $products->price,
           
            'options' => [
                'thumb' => $products->product_thumb,
                'cat_title' =>$products->cat_title,
                'slug' => $products->slug,
                'id' => $products->id,
                'cat_id' => $products->cat_id,
                'code' =>$products->code,
            ]
        ]);


        // $cart_add = Cart::add();
        $list_cart = Cart::content();




        $total = Cart::total();


        // return "thêm sản phẩm có id {$id} vào giỏ hàng";
        // return redirect('cart/ok')
        return redirect('gio-hang/gio-hang-cua-ban');
        // return redirect('http://localhost/laravelpro/unimart/users/san-pham/1/6?iphone-11-red');

    }

    function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect('gio-hang/gio-hang-cua-ban');

    }

    function destroy()
    {
        Cart::destroy();
        return redirect('gio-hang/gio-hang-cua-ban');

    }

    function update(Request $request)
    {
        // Cart::update();
        // dd(Cart::content());

        $data = $request->get('num-order');
        // dd($data);
        foreach ($data as $k => $v) {
            Cart::update($k, $v);
        }


        return redirect('gio-hang/gio-hang-cua-ban');
       

    }

    public function ajax(Request $request, $suffix = 'VNĐ')
    {
        $id = $request->input('id');
        // dd($id);
        $qty = $request->input('qty');

        Cart::update($id ,$qty);

        foreach(Cart::content() as $item)
        {
            $sub_total =number_format($item->total) ;
        }
        $order_num = Cart::count();

        $total = Cart::total();

        $data = [
            'sub_total' => $sub_total.$suffix,
            'total' => $total.$suffix,
            'order_num' => $order_num,
        ];

        return view('users.cart.ajax',compact('data'));
    }
}
