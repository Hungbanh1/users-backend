<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Str;

use App\Mix_products;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;




class UsersSearchController extends Controller
{
    public function searchajax(Request $request , $suffitx = 'VNĐ')
    {

        $keyword = '';
  
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
        }
        $products = Products::where('product_name', 'LIKE', "%$keyword%")->get();
    
   
      
       
        // }
        $data = [
            'product' => $products,
        ];
      


        return view('users.search.searchajax' , compact('data'));

    }
    function search(Request $request){
        // return "ok";
        $keyword = '';
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
        }
        $products = Products::where('product_name', 'LIKE', "%$keyword%")->get();

        return view('users.search.search', compact(('products')));
    }
}
