<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Mail\Message;

class EmailController extends Controller
{
    #-------------------------------------------------------------------------#
                                    ##--- SEND MESSAGE EMAIL ---##
    #-------------------------------------------------------------------------#

    public function sendMessage(Request $req) {
        $req->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);

        $data = $req->all();

        Mail::to('allayar151819@gmail.com')->send(new Message($data));

        return redirect()->back()->with(['msg'=>'Send Message!']);
    }
}
