<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;

class popsCatalogController extends Controller
{
    public function popsCatalog(){
        return view('popsCatalog');
    }

    public static function getProducts(){

        $products= Product::where('class', "Figuras y Pop's")->paginate(8);
        
        foreach($products as $product){

            // Cambiamos el tamaño de la imagen
            if($product->modified != 0){ //Local
                $product->image = base64_decode($product->image);
            }else{ //Seed
               $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded; 
            }
            $product['categoryColor'] = "#ED1C24";
            $product['categoryDetailLink'] = "http://weirloid.test/popDetail".$product->id;
        }

        return view('partials.products')->with('products', $products);
    }

    public static function getNewProducts(){

        $products= DB::table('product')
        ->where('class','=', "Figuras y Pop's")
        ->orderBy('created_at', 'DESC')
        ->take(4)
        ->get();
        
        foreach($products as $product){

            // Cambiamos el tamaño de la imagen
            if($product->modified != 0){ //Local
                $product->image = base64_decode($product->image);
            }else{ //Seed
               $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded; 
            }
            $product->categoryColor = "#ED1C24";
            $product->categoryDetailLink = "http://weirloid.test/popDetail".$product->id;
        }

        return view('partials.newProducts')->with('products', $products);
    }

    public static function filterProducts(Request $request){

        //Valores por defecto
        $class="Figuras y Pop's";
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
        ->paginate(8);;

        foreach($products as $product){

            // Cambiamos el tamaño de la imagen
            if($product->modified != 0){ //Local
                $product->image = base64_decode($product->image);
            }else{ //Seed
               $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded; 
            }
            $product->categoryColor = "#ED1C24";
            $product->categoryDetailLink = "http://weirloid.test/popDetail".$product->id;
        }

        return view('searchResults')->with('products', $products);
    }

    

}

?>