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
                <a href='adminMessageDetail$id'>
                <section id='message'>
                <article>
                    <h1>$title</h1>
                    <h2>$userName</h2>
                    <h3>Pendiente</h3>
                    </article>";
                echo "</section></a>";
            } else {
                echo " <!-- Message Card -->
                <a href='adminMessageDetail$id'>
                <section id='message'>
                <article>
                    <h1>$title</h1>
                    <h2>$userName</h2>
                    </article>";
                echo "</section></a>";
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
}
