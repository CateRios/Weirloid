<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;

class ElectronicsCatalogController extends Controller
{
    public function electronicsCatalog(){
        return view('electronicsCatalog');
    }
    
    public static function getProducts(){

        $products= Product::where('class', "Electrónica")->get();
        
        foreach($products as $product){
           // Cambiamos el tamaño de la imagen
           $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded;
           $product['categoryColor'] = "#008FD5";
            $product['categoryDetailLink'] = "http://weirloid.test/electronicsDetail".$product->id;
       }

       return view('partials.products')->with('products', $products);
    }

    public static function filterProducts(Request $request){

        //Valores por defecto
        $class="Electrónica";
        $category= '%';
        $type = '%';
        $score = '1';
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;

        //Valores enviados por la vista
        if($request->type != null){
            $type = $request->type;
        }
        if($request->category != null){
            $category = $request->category;
        }
        if($request->score != null){
            $score = $request->score;
        }

        //Filtrar productos
        $products = DB::table('product')
        ->where('class', '=', $class)
        ->where('type', 'like', $type)
        ->where('category', 'like', $category)
        ->where('score', '>=', $score)
        ->where('price', '>', $minPrice)
        ->where('price', '<', $maxPrice)
        ->get();

        foreach($products as $product){

            // Cambiamos el tamaño de la imagen
            $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded;
            $product->categoryColor = "#008FD5";
            $product->categoryDetailLink = "http://weirloid.test/electronicsDetail".$product->id;
        }

        return view('searchResults')->with('products', $products);
    }


    

}

?>