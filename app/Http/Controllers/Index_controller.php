<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Index_controller extends Controller
{
    static function getProfile(){

        // Obtenemos el usuario actual
        $user = Auth::user();

        //Obtenemos su perfil
        $profile = Profile::where('user_id',$user->id)->first();

        return view('partials.userShortProfile')->with('profile', $profile);
    }

}
