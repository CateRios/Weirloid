<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class ElectronicsDetailController extends Controller
{
    public function showDetails($id){
        
        $product = Product::find($id);
        $product['categoryColor'] = "#008FD5";

        return view('electronicsDetail', ['product'=>$product]);
    }


}

?>