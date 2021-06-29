<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    //
    function saveMessage(Request $req){

        $message = new Message;
        $message -> username =$req->input('username');
        $message -> message=$req->input('userMessage');
        $message->save();

        return $message;

    }

    function list(){

        return $messages = Message::orderBy('id', 'DESC')->take(3)->get();

    }
}
