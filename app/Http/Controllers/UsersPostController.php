<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

class UsersPostController extends Controller
{
    //
    function post(){

        $posts = Posts::paginate(4);
        return view('users.post.list' , compact('posts'));
    
    }

    function detail($slug){
        // echo $slug;
        $post = Posts::where('slug' , 'LIKE' , "%$slug%")->get();

        // dd($post);


        return view('users.post.detail_post' , compact('post'));

    }
}
