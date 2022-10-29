<?php

namespace App\Http\Controllers;

use App\Mix_products;
use App\Products;
use Illuminate\Http\Request;

class UsersKeywordController extends Controller
{
    //

    function keyword(Request $request){
            $keyword = $request->input('keyword');
            return $keyword;

            // $keyword = '';
            if($request->input('keyword')){
                $keyword = $request->input('keyword');
            }
            $products = Products::where('product_name' , 'LIKE' , "%$keyword%");
            $mix_products = Mix_products::where('product_name' , 'LIKE' , "%$keyword%");
        
            // return view('welcome' , compact('products' ,'mix_products'));
            // dd($products);
    }
}
