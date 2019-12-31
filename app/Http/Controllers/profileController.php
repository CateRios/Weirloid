<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    static function getName(){

        // Obtenemos el usuario actual
        $user = Auth::user();
        $profile = Profile::where('user_id',$user->id)->first();
        $name = $profile->name;

        return $name;
    }
    static function getAddress(){

        // Obtenemos el usuario actual
        $user = Auth::user();
        //Obtenemos su perfil
        $profile = Profile::where('user_id',$user->id)->first();
        $address = $profile->address;
        return $address;
    }
    static function getPhone(){

        // Obtenemos el usuario actual
        $user = Auth::user();
        //Obtenemos su perfil
        $profile = Profile::where('user_id',$user->id)->first();
        $phone = $profile->phone;
        return $phone;
    }
    static function getEmail(){

        // Obtenemos el usuario actual
        $user = Auth::user();

        $email = $user->email;
        return $email;
    }
    static function getPhoto(){

        // Obtenemos el usuario actual
        $user = Auth::user();
        $profile = Profile::where('user_id',$user->id)->first();
        if($profile->photo != null){
            $photo=base64_decode($profile->photo);
        }
        elseif($profile->photo == null) {
            $photo = asset('img/dummy_user_picture.jpg');
        }

        return $photo;
    }

}
