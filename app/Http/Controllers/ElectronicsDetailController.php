<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class ElectronicsDetailController extends Controller
{
    public function electronicssDetail(){
        return view('electronicsDetail');
    }

    

    public function showDetails($id){
        
        $product = Product::find($id);

        return view('electronicsDetail', ['item'=>$product]);
    }


}

?>