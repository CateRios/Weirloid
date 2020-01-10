<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;

class popDetailController extends Controller
{
    public function popDetail(){
        return view('popDetail');
    }

    

    public function showDetails($id){
        
        $product = Product::find($id);
        $product['categoryColor'] = "#ED1C24";

        return view('popDetail', ['product'=>$product]);
    }


}

?>