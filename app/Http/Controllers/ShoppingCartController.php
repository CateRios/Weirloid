<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class ShoppingCartController extends Controller
{
    public function shoppingCart(){
        return view('shoppingCart');
    }
    
    public function addToCart(Request $request){

        $id = $request->id;
        $quantity = $request->quantity;
        $product = Product::find($id);
        $name = $product->name;
        $price = $product->price;

        if(session()->exists('cart')){

            $cartProducts = session()->get('cart');

            if(array_key_exists($id, $cartProducts)){

                $cartProducts[$id]['quantity'] = $quantity;

            }else{

                $item = array('id' => $id,
                'quantity' => $quantity);
                $cartProducts[$id] = $item;
            }

            session()->put('cart', $cartProducts);

        }else{

            $products = array();
            $item = array('id' =>$id,
            'quantity' => $quantity);
            $product[$id] = $item;

            session(['cart' => $products]);
        }

        return redirect()->back();

    }

    public function getCartProducts(){

        if(session()->exists('cart')){

            $cartProducts = session()->get('cart');

            $HTMLProducts = "";

            foreach($cartProducts as $item){

                $totalPrice = $cartProducts['price']* $cartProducts['quantity'];

                $name = $cartProducts['name'];
                $quantity = $cartProducts['quantity'];
                $price = $cartProducts['price'];

                echo "
                <tr id='items'>
                <td>$name</td>
                <td>$quantity></td>
                <td>$price €</td>
                </tr>";
            }

        }

    }

    

}

?>