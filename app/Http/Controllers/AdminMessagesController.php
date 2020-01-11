<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMessagesController extends Controller
{
    static function getMessages()
    {
        $messages = Message::orderBy('id','DESC')->get();

        foreach ($messages as $item) {
            $id = $item->id;
            $title = $item->title;
            $userId= $item->userId;
            $user= User::find($userId);
            $userName=$user->name;
            if ($item->answer == null) {
                //$userId=$user->id;
                echo " <!-- Message Card -->
                
                <section id='message'>
                <article>
                <a id='messageIcon'><i class=\"fas fa-envelope fa-5x\"></i></a>
                <a href='adminMessageDetail$id'>
                    <h1>$title</h1>
                    <h2>$userName</h2>
                    <h3>Pendiente</h3>
                    </a>
                </article>";
                echo "</section>";
            } else {
                echo " <!-- Message Card -->
                <section id='message'>
                <article>
                <a id='messageIcon'><i class=\"fas fa-envelope-open fa-5x\"></i></a>
                    <a href='adminMessageDetail$id'>
                    <h1>$title</h1>
                    <h2>$userName</h2>
                    </a>
                    </article>";
                echo "</section>";
            }
        }
    }
    public function createAnswer(Request $request){
        $id=$request->id;
        $answer=$request->message;
        $message=Message::where('id',$id)->first();
        $message->answer=$answer;
        $message->save();
        return redirect()->to('/adminMessagesList');
    }
    public function showDetails($id){

        $message = Message::find($id);

        return view('adminMessageDetail', ['item'=>$message]);
    }
    public static function getNumberNoAnswer(){

        $noAnswerMessages = Message::where('answer', NULL)->get();
        $number = sizeof($noAnswerMessages);
        return $number;
    }
}
