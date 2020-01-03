<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    static function createMessage(Request $request){
        $user = Auth::user();
        $user_id=$user->id;
        $title = $request->title;
        $content = $request->message;
        $message = new Message();
        $message->userId=$user_id;
        $message->title=$title;
        $message->content=$content;
        $message->save();

    }
}
