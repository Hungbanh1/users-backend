<?php

namespace App\Http\Controllers;

use App\Cat_title;
use App\Info_products;
use App\product_thumbs;
use App\Products;
use App\show_product;
use App\Zoom_products;
use Illuminate\Http\Request;

class UsersProductController extends Controller
{
    //

    public function __construct(){

    }


    public function list($cat_title){
        $products = Products::where('cat_title' , $cat_title)
        ->get();

        // dd($cat_title);
        
        // dd($products);

    //     $cat_title = cat_title::find($cat_id)
    //     ->where('cat_id' , $cat_id)
    //    ->first();

        // return $cat_title->cat_title;
        
        

     


        return view('users.product.list' , compact('products' , 'cat_title'));
        // return "ok";
    }

    // public function detail($cat_id,$id,$slug,Request $request){
    public function detail($cat_title,$slug){

        
  
        $inf_products = Info_products::where('cat_title', $cat_title)
        ->first();

        $product_content = product_thumbs::where('cat_title', $cat_title)
       
        ->first();

        $products = Products::where('slug','LIKE' ,"%$slug%")

        ->get();

        // dd($products->product_name);

        foreach($products as $item){
            
        }
     

        $zoom_products = Zoom_products::where('cat_title', $cat_title)
        ->first();
        



        return view('users.product.detail_product' , compact('inf_products' , 'item' , 'zoom_products' , 'product_content'));
    }

    function chitiet($cat_title,$slug){
       
        $inf_products = Info_products::where('cat_title', $cat_title)
        ->first();

        $product_content = product_thumbs::where('cat_title', $cat_title)
       
        ->first();

        $products = Products::where('slug','LIKE' ,"%$slug%")

        ->get();

        // dd($products->product_name);

        foreach($products as $item){
            
        }
     

        $zoom_products = Zoom_products::where('cat_title', $cat_title)
        ->first();
        



        return view('users.product.detail_product' , compact('inf_products' , 'item' , 'zoom_products' , 'product_content'));
    }

    public function sort(Request $request,$cat_title){
        // return $cat_title;
        $sort = $request->input('select');
        // return $sort;
        if($sort == 'A-Z'){
            $products = Products::where('cat_title', $cat_title)->orderBy('product_name','desc')
            ->get();
        }
        // return $products;
        else if($sort == 'Z-A'){
            $products = Products::where('cat_title' , $cat_title)->orderBy('product_name','asc')
            ->get();
        }
        else if($sort == 'high-low'){
            $products = Products::where('cat_title' , $cat_title)->orderBy('price','desc')->get();
        }
        
        else if($sort == 'low-high'){
            $products = Products::where('cat_title' , $cat_title)->orderBy('price','asc')->get();
        }
        else{
            return "ok";
        }
    //     $cat_title = cat_title::find($cat_id)
    //     ->where('cat_id',$cat_id)
    //    ->first();

        return view('users.product.list' , compact('products' , 'cat_title'));

        
    }

    function mail(){
        return view('users.mail.mail');
    }

    
    function show(){
        $products = show_product::all();
        // dd($products);

        return view('users.product.show' , compact('products'));
    }
}
