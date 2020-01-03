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
        return redirect()->to('/messagesList');
    }
    static function getMessages()
    {
        $user = Auth::user();
        $messages = Message::where('userId', $user->id)->get();

        foreach ($messages as $item) {
            $id = $item->id;
            $title = $item->title;


            echo " <!-- Message Card -->
                <a href='messageDetail$id'>
                <section id='message'>
                <article>
                    <h1>$title</h1>
                    </article>";


            echo "</section></a>";
        }
    }
    public function showDetails($id){

        $message = Message::find($id);

        return view('messageDetail', ['item'=>$message]);
    }
}
