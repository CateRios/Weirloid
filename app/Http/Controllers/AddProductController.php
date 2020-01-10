<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;

class AddProductController extends Controller
{
    public function addProduct(){
        return view('addProduct');
    }

    public function insertProductToDatabase(Request $request){

        $product = new Product();

        //Información recibida
        if($request->productName != null){
            $product->name = $request->productName;
        }

        if($request->productDescription != null){
            $product->description = $request->productDescription;
        }

        if($request->productClass != null){
            $product->class = $request->productClass;
        }

        if($request->productType != null){
            $product->type = $request->productType;
        }

        if($request->productCategory!= null){
            $product->category = $request->productCategory;
        }

        if($request->productPrice != null){
            $product->price = $request->productPrice;
        }

        if($request->productScore != null){
            $product->score = $request->productScore;
        }

        if($request->productStock!= null){
            $product->stock = $request->productStock;
        }

        if($request->productFeatured != null){
            $product->featured = $request->productFeatured;
        }
        
        //Campos que pueden ser null
        if($request->productModel != null){
            $product->model = $request->productModel;
        }

        if($request->productSize != null){
            $product->size = $request->productSize;
        }

        if($request->productAuthor != null){
            $product->author = $request->productAuthor;
        }

        //Imagen
        $photo=$request->file('productImage');
        if($photo != null){
            $imageResize = Image::make($photo)->resize(400, 400);
            $image = base64_encode($imageResize->encode('data-url'));
            $product->image = $image;
        }

        //Local
        $product->modified = 1;

        $product->save();

        return redirect()->to('productList');
        
    }

    

}

?>