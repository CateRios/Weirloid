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

        if(session()->exists('cart')){

            //Insert new product
            $cartProducts = session()->get('cart');

            if(array_key_exists($id, $cartProducts)){
                $cartProducts[$id]['quantity'] = $quantity;
            }else{
                $test = array('id' => $id, 'quantity' => $quantity);
                $cartProducts[$id] = $test;
            }
            session()->put('cart', $cartProducts);

        }else{

            //Create products array
            $products = array();

            //Insert product
            $test = array('id' =>$id, 'quantity' => $quantity);
            $products[$id] = $test;

            session(['cart' => $products]);
        }

        return redirect()->back();

    }

    public static function getCartProducts(){

        if(session()->exists('cart')){

            $cartProducts = session()->get('cart');

            $totalPrice = 0;

            $HTMLProducts = "";

            foreach($cartProducts as $item){

                    $products = Product::where('id', $item['id'])->get();

                    foreach($products as $product){

                        $totalPrice = $totalPrice + $product->price * $item['quantity'];

                        $name = $product->name;
                        $quantity = $item['quantity'];
                        $price = $product->price;

                        echo "
                        <tr id='items'>
                        <td>$name</td>
                        <td>$quantity</td>
                        <td>$price €</td>
                        </tr>";

                    }

            }

            echo "
            <tr>
                <td></td>
                <th id='column-name'>Total</th>
                <td id='column-name'></td>
            </tr>
                <tr>
                <td></td>
                <td></td>
                <td>$totalPrice €</td>
            </tr>";

        }

    }

    public static function showCartOnNavBar(){

        if(session()->exists('cart')){

            $cartProducts = session()->get('cart');
            $items_number=count($cartProducts);

            $totalPrice = 0;

            foreach($cartProducts as $item){

                    $products = Product::where('id', $item['id'])->get();

                    foreach($products as $product){

                        $totalPrice = $totalPrice + $product->price * $item['quantity'];

                    }

            }

            echo "
                <div class='cart'><a href='shoppingCart'>
                                <p id='count'><i class='fas fa-shopping-cart'></i> $items_number ITEMS:</p>
                                <p id='total'>$totalPrice €</p>
                        </a></div>
                ";

        }else{

                echo "
                <div class='cart'><a href='#'>
                    <p id='count'><i class='fas fa-shopping-cart'></i> 0 ITEMS</p>
                </a></div>";


        }
    }


}

?>
