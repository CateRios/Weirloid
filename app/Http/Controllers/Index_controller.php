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

        if(count($products) != 0){

            foreach ($products as $product){

                // Cambiamos el tamaño de la imagen
                if($product->modified != 0){ //Local
                    $product->image = base64_decode($product->image);
                }else{ //Seed
                   $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded; 
                }

                // Añadimos el color según la categoría
                switch ($product->class){

                    case "Figuras y Pop's":
                        $product['categoryColor'] = "#ED1C24";
                        $product['categoryDetailLink'] = "http://weirloid.test/popDetail".$product->id;
                        break;

                    case "Manga y cómics":
                        $product['categoryColor'] = "#F99D1C";
                        $product['categoryDetailLink'] = "http://weirloid.test/mangaDetail".$product->id;
                        break;

                    case "Electrónica":
                        $product['categoryColor'] = "#008FD5";
                        $product['categoryDetailLink'] = "http://weirloid.test/electronicsDetail".$product->id;
                        break;

                    case "Ropa":
                        $product['categoryColor'] = "#802A90";
                        $product['categoryDetailLink'] = "http://weirloid.test/clothesDetail".$product->id;
                        break;

                }
            }
            return view('partials.products')->with('products', $products);
        }
    }

}
