<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class popsCatalogController extends Controller
{
    public function popsCatalog(){
        return view('popsCatalog');
    }
    
    public function redirect(){
        return redirect('/popsCatalog');
    }

    

}

?>