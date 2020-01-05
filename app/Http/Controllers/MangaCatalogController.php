<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;

class MangaCatalogController extends Controller
{
    public function mangaCatalog(){
        return view('mangaCatalog');
    }
    
    public static function getProducts(){

        $products= Product::where('class', "Manga y cómics")->get();

        foreach($products as $product){

            // Cambiamos el tamaño de la imagen
            $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded;
            $product['categoryColor'] = "#F99D1C";
            $product['categoryDetailLink'] = "http://weirloid.test/mangaDetail".$product->id;
        }

        return view('partials.products')->with('products', $products);
    }

    public static function getNewProducts(){


        $products= DB::table('product')
        ->where('class','=', "Manga y cómics")
        ->orderBy('created_at', 'DESC')
        ->take(4)
        ->get();
        
        foreach($products as $product){

            // Cambiamos el tamaño de la imagen
            $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded;
            $product->categoryColor = "#F99D1C";
            $product->categoryDetailLink = "http://weirloid.test/mangaDetail".$product->id;
        }

        return view('partials.products')->with('products', $products);
    }

    public static function filterProducts(Request $request){

        //Valores por defecto
        $class="Manga y cómics";
        $genre= '%';
        $type = '%';
        $score = '1';
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;

        //Valores enviados por la vista
        if($request->type != null){
            $type = $request->type;
        }
        if($request->genre != null){
            $genre = $request->genre;
        }
        if($request->score != null){
            $score = $request->score;
        }

        //Filtrar productos
        $products = DB::table('product')
        ->where('class', '=', $class)
        ->where('type', 'like', $type)
        ->where('category', 'like', $genre)
        ->where('score', '>=', $score)
        ->where('price', '>', $minPrice)
        ->where('price', '<', $maxPrice)
        ->get();

        foreach($products as $product){

            // Cambiamos el tamaño de la imagen
            $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded;
            $product->categoryColor = "#F99D1C";
            $product->categoryDetailLink = "http://weirloid.test/mangaDetail".$product->id;
        }

        return view('searchResults')->with('products', $products);
    }



    

}

?>