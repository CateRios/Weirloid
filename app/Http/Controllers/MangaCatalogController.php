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
    
    public static function showProducts(){

        $products= Product::where('class', "Manga y cómics")->get();

        foreach($products as $item){
            $id =$item->id;
            $name = $item->name;
            $price = $item->price;
            $category = $item->class;
            $score = $item->score;
            $img= base64_decode($item->image);

               echo" <!-- Product Card -->
                <div class='card productCard'>
                    <a href='mangaDetail$id'><img class='card-img-top productCard-image' src='$img' alt='$name'></a>
                    <div class='productCard-price'>
                        <h4 class='card-title'>$price €</h4>
                    </div>
                    <div class='card-body'>
                        <h6 class='card-subtitle mb-2 productCard-category'>$category</h6>
                        <h5 class='card-title productCard-name'>$name</h5>";


                $i=1;
                for($i=1; $i <= $score; $i++){
                    echo "<span class='fa fa-star checked'></span>";
                }
                while($i <=5){
                    echo "<span class='fa fa-star'></span>";
                    $i++;
                }


                echo "</div></div>" ;
        }
    }

    

}

?>