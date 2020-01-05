<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;

class ClothesCatalogController extends Controller
{
    public function clothesCatalog(){
        return view('clothesCatalog');
    }
    
    public static function getProducts(){

        $products= Product::where('class', "Ropa")->get();

        foreach($products as $product){
            
            // Cambiamos el tamaño de la imagen
            $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded;
            $product['categoryColor'] = "#802A90";
            $product['categoryDetailLink'] = "http://weirloid.test/clothesDetail".$product->id;
        }

     return view('partials.products')->with('products', $products);
    }

    public static function filterProducts(Request $request){

        //Valores por defecto
        $class="Ropa";
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

        $HTMLFilteredProducts="";

        foreach($products as $item){
            $id =$item->id;
            $name = substr($item->name, 0, 10) . '...';
            $price = $item->price;
            $category = $item->class;
            $score = $item->score;
            $img= base64_decode($item->image);

               $HTMLFilteredProducts = $HTMLFilteredProducts. " <!-- Product Card -->
                <div class='card productCard'>
                    <a href='popDetail$id'><img class='card-img-top productCard-image' src='$img' alt='$name'></a>
                    <div class='productCard-price'>
                        <h4 class='card-title'>$price €</h4>
                    </div>
                    <div class='card-body'>
                        <h6 class='card-subtitle mb-2 productCard-category'>$category</h6>
                        <h5 class='card-title productCard-name'>$name</h5>";


                $i=1;
                for($i=1; $i <= $score; $i++){
                    $HTMLFilteredProducts = $HTMLFilteredProducts. "<span class='fa fa-star checked'></span>";
                }
                while($i <=5){
                    $HTMLFilteredProducts = $HTMLFilteredProducts. "<span class='fa fa-star'></span>";
                    $i++;
                }


                $HTMLFilteredProducts = $HTMLFilteredProducts. "</div></div>" ;
        }

        return  view('clothesCatalog', ['products' => $HTMLFilteredProducts]);
    }

    

}

?>