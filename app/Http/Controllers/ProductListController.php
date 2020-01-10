<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Intervention\Image\ImageManagerStatic as Image;

class ProductListController extends Controller
{
    public function productList(){
        return view('productList');
    }

    public static function getProductList(){

        $products= Product::where('class', 'like', '%')->paginate(8);
        
        foreach($products as $product){

            // Cambiamos el tamaño de la imagen
            if($product->modified != 0){ //Local
                $product->image = base64_decode($product->image);
            }else{ //Seed
               $product->image = Image::make($product->image)->resize(400,400)->encode('data-url')->encoded; 
            }

            switch ($product->class){

                case "Figuras y Pop's":
                    $product->categoryColor = "#ED1C24";
                    $product->categoryDetailLink = "http://weirloid.test/popDetail".$product->id;
                    break;

                case "Manga y cómics":
                    $product->categoryColor = "#F99D1C";
                    $product->categoryDetailLink = "http://weirloid.test/mangaDetail".$product->id;
                    break;

                case "Electrónica":
                    $product->categoryColor = "#008FD5";
                    $product->categoryDetailLink = "http://weirloid.test/electronicsDetail".$product->id;
                    break;

                case "Ropa":
                    $product->categoryColor = "#802A90";
                    $product->categoryDetailLink = "http://weirloid.test/clothesDetail".$product->id;
                    break;

            }
        }

        return view('partials.productList')->with('products', $products);
    }

    public function editProduct($id){

        $product = Product::find($id);

        return view('editProduct', ['product' => $product]);

    }

    public function deleteProduct($id){

        Product::where('id', $id)->delete();

        return redirect()->back(); 
        
    }

    public function saveProductChanges(Request $request){

        $product = Product::find($request->productId);

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