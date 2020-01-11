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
            if($item->answer==null){
                $response="No respondido aún";
            }else{
                $response="Respondido";
            }


            echo " <!-- Message Card -->
                
                <section id='message'>
                <article>
                <a id='messageIcon'><i class=\"fas fa-envelope fa-5x\"></i></a>
                <a href='messageDetail$id'>
                    <h1>$title</h1>
                    <h2>$response</h2>
                    </a>
                    </article>";


            echo "</section>";
        }

    }
    public function showDetails($id){

        $message = Message::find($id);

        return view('messageDetail', ['item'=>$message]);
    }

}
