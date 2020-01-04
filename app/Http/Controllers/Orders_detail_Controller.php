<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class Orders_detail_Controller extends Controller
{
    function createOrderDetail($id_order){
        //Obtenemos el array de productos del carrito
        $cartProducts = session()->get('cart');

        foreach ($cartProducts as $cartProduct){

            $product = $cartProduct;

            $order_detail = new Order_detail;
            $order_detail->id_order = $id_order;
            $order_detail->id_product = $product['id_product'];
            $order_detail->quantity = $product['quantity'];
            $order_detail->discount = 0 ;
            $order_detail->save();

        }

    }

    function getOrderDetail($id_order){

        $orders_detail = Order_detail::where('id_order',$id_order)->get();

        $html = "
                   <tr>
                        <td class='orderTable-productTitle'>ID Producto</td>
                        <td class='orderTable-productTitle'>Precio</td>
                        <td class='orderTable-productTitle'>Cantidad</td>
                        <td class='orderTable-productTitle'>Descuento</td>
                   </tr>
                ";

        foreach ($orders_detail as $order_detail){

            $product = Product::where('id', $order_detail->id_product)->first();

            $html = $html.
                "
                    <tr>
                        <td class='orderTable-productContent'>$order_detail->id_product</td>
                        <td class='orderTable-productContent'>$product->price</td>
                        <td class='orderTable-productContent'>$order_detail->quantity</td>
                        <td class='orderTable-productContent'>$order_detail->discount</td>
                    </tr>
                ";

        }

        return $html;
    }
}
