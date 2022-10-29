<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class UsersContactController extends Controller
{
    //

    function contact(){
        // return "ok";
        $contact = Contact::all()
        ->first();

        return view('users.contact.contact' , compact('contact'));
    }
}
