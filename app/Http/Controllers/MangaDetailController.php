<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;

class MangaDetailController extends Controller
{
    public function popDetail(){
        return view('popDetail');
    }

    

    public function showDetails($id){
        
        $product = Product::find($id);
        $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded;
        $product['categoryColor'] = "#F99D1C";

        return view('mangaDetail', ['product'=>$product]);
    }


}

?>