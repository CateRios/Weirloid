<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class MangaDetailController extends Controller
{
    public function popDetail(){
        return view('popDetail');
    }

    

    public function showDetails($id){
        
        $product = Product::find($id);

        return view('mangaDetail', ['item'=>$product]);
    }


}

?>