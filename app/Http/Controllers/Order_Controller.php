<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;

class Order_Controller extends Controller
{
    function createOrder($amount){
        // Miramos si existe la variable sesión
        //if (session()->exists('cart')) {

            // Obtenemos el ID del usuario
            $user = Auth::user();
            $id_user = $user->id;

            // Insertamos la orden
            $order = new Order;
            $order->id_user = $id_user;
            $order->total = $amount;
            $order->state = "Unpaid";
            $order->save();

            //Buscamos el ID de la orden recien creada
            $orders = Order::where([['id_user',$id_user],['total',$amount]])->get();
            foreach ($orders as $order){
                $id_order = $order->id;

                // Creamos los detalle de la orden
                (new Orders_detail_controller)->createOrderDetail($id_order);
            }


            return $id_order;
        //}
    }

    static function getAllOrders(){

        $orders = Order::paginate(3);

        if(count($orders) != 0){
            return view('partials.adminOrdersList')->with('orders', $orders );
        } else {
            return "No hay ordenes registrados.";
        }

    }
}
