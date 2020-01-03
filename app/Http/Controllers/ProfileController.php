<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
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
    public function setProfile(Request $request){
        $name=$request->name;
        $email=$request->email;
        $phone=$request->phone;
        $address=$request->address;
        $photo=$request->file('photo');
        Image::make($photo)->resize(350,350);
        $image=base64_encode(file_get_contents($photo));
        $user = Auth::user();
        $user->name= $name;
        $user->email=$email;
        $user->save();
        $profile = Profile::where('user_id',$user->id)->first();
        $profile->phone=$phone;
        $profile->address=$address;
        $profile->name=$name;
        $profile->photo=$image;
        $profile->save();
        return view('profile');
    }

}
