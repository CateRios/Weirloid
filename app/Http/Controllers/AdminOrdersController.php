<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Order_Detail;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\Auth;

class AdminOrdersController extends Controller
{
    static function getOrders()
    {
        $orders = Order::orderBy('id','DESC')->get();
        foreach ($orders as $item) {
            $id = $item->id;
            $userId=$item->id_user;
            echo " <!-- Message Card -->
                <a href='orderDetail$id'>
                <section id='order'>
                <article>
                    <h1>Pedido número: $id</h1>
                    <h1>Usuario número: $userId</h1>
                    </article>";


            echo "</section></a>";
        }
    }
}
