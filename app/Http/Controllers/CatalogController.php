<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;

class CatalogController extends Controller
{
    public function catalog(){
        return view('catalog');
    }

    public static function getProducts(){

        $products= Product::all();
        
        foreach($products as $product){

            // Cambiamos el tamaño de la imagen
            $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded;

            // Añadimos el color según la categoría
             switch ($product->class){

                case "Figuras y Pop's":
                    $product['categoryColor'] = "#ED1C24";
                    $product['categoryDetailLink'] = "http://weirloid.test/popDetail".$product->id;
                    break;

                case "Manga y Comics":
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

    public static function filterProducts(Request $request){

        //Valores por defecto
        $score = '1';
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;

        //Valores enviados por la vista
        if($request->score != null){
            $score = $request->score;
        }

        //Filtrar productos
        $products = DB::table('product')
        ->where('score', '>=', $score)
        ->where('price', '>', $minPrice)
        ->where('price', '<', $maxPrice)
        ->get();

        foreach($products as $product){

            // Cambiamos el tamaño de la imagen
            $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded;

            switch ($product->class){

                case "Figuras y Pop's":
                    $product->categoryColor = "#ED1C24";
                    $product->categoryDetailLink = "http://weirloid.test/popDetail".$product->id;
                    break;

                case "Manga y cómics":
                    $product->categoryColor = "#F99D1C";
                    $product->categoryDetailLink = "http://weirloid.test/mangaDetail".$product->id;
                    break;

                case "Electrónica":
                    $product->categoryColor = "#008FD5";
                    $product->categoryDetailLink = "http://weirloid.test/electronicsDetail".$product->id;
                    break;

                case "Ropa":
                    $product->categoryColor = "#802A90";
                    $product->categoryDetailLink = "http://weirloid.test/clothesDetail".$product->id;
                    break;

            }
        }

        return view('searchResults')->with('products', $products);
    }

    

}

?>