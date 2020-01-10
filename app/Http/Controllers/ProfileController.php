<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{    static function getName(){

    // Obtenemos el usuario actual
    $user = Auth::user();
    if(Profile::where('user_id',$user->id)->exists()) {
        $profile = Profile::where('user_id', $user->id)->first();
        $name = $profile->name;
    }else{
        $name = $user->name;
    }
    return $name;
}
    static function getAddress(){

        // Obtenemos el usuario actual
        $user = Auth::user();
        //Obtenemos su perfil
        if(Profile::where('user_id',$user->id)->exists()){
            $profile = Profile::where('user_id',$user->id)->first();
            $address = $profile->address;
        }else{
            $address = "";
        }
        return $address;
    }
    static function getPhone(){

        // Obtenemos el usuario actual
        $user = Auth::user();
        //Obtenemos su perfil
        if(Profile::where('user_id',$user->id)->exists()) {
            $profile = Profile::where('user_id', $user->id)->first();
            $phone = $profile->phone;
        }else{
            $phone="";
        }
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
        if(Profile::where('user_id',$user->id)->exists()) {
            $profile = Profile::where('user_id', $user->id)->first();
            if ($profile->photo != null) {
                $photo = base64_decode($profile->photo);
            } elseif ($profile->photo == null) {
                $photo = asset('img/dummy_user_picture.jpg');
            }
        }else{
            $photo = asset('img/dummy_user_picture.jpg');
        }
        return $photo;
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
    }
    public function setProfile(Request $request){
        $data=$request->all();
        $name=$request->name;
        $email=$request->email;
        $phone=$request->phone;
        $address=$request->address;
        $photo=$request->file('photo');
        $user = Auth::user();
        if($name!=null){
            $user->name= $name;
        }
        if($email!=null){
            //if($this->validator($data)->fails()){
            //}else{
                $user->email=$email;
            //}
        }
        $user->save();
        if(Profile::where('user_id',$user->id)->exists()){
            $profile = Profile::where('user_id',$user->id)->first();
        }
        else {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }
        if($phone!=null){
            $profile->phone=$phone;
        }
        if($address!=null){
            $profile->address=$address;
        }
        if($name!=null) {
            $profile->name = $name;
        }
        if($photo!=null) {
            $imageResize = Image::make($photo)->resize(300, 300);
            $image = base64_encode($imageResize->encode('data-url')->encoded);
            $profile->photo = $image;
        }
        $profile->save();

        return redirect()->to('/profile');
    }

    public function logout(){

        // Cerramos la sesión
        Auth::logout();

        return redirect()->to('/');
    }

}
