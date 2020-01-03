<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class ClothesDetailController extends Controller
{
    public function clothesDetail(){
        return view('clothesDetail');
    }

    

    public function showDetails($id){
        
        $product = Product::find($id);

        return view('clothesDetail', ['item'=>$product]);
    }


}

?>