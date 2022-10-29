<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsersMailController extends Controller
{
    //
    function sendmail(Request $request){
        Mail::to($request->input('email'))->send(new ConfirmMail);
        return redirect('success/show');
    }
}
