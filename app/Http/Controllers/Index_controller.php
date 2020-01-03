<?php

namespace App\Http\Controllers;

use App\Product;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class Index_controller extends Controller
{
    static function getProfile(){

        // Obtenemos el usuario actual
        $user = Auth::user();

        //Obtenemos su perfil
        $profile = Profile::where('user_id',$user->id)->first();

        return view('partials.userShortProfile')->with('profile', $profile);
    }

    static function getFeaturedProducts(){

        // Obtenemos los productos destacados (Featured = 1)
        $products = Product::where('featured', 1)->paginate(8);

        return view('partials.products')->with('products', $products);
    }

}
