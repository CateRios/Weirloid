<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;

class ClothesDetailController extends Controller
{
    public function clothesDetail(){
        return view('clothesDetail');
    }

    

    public function showDetails($id){
        
        $product = Product::find($id);
        if($product->modified != 0){ //Local
            $product->image = base64_decode($product->image);
        }else{ //Seed
           $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded; 
        }
        $product['categoryColor'] = "#802A90";

        return view('clothesDetail', ['product'=>$product]);
    }


}

?>