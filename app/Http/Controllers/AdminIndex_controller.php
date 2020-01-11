<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class AdminIndex_controller extends Controller
{
    static function getGraphic(){

        //Obtenemos los datos de todas las tablas
        $total_users = count(User::where('email','<>','admin')->get());
        $total_products = count(Product::all());
        $total_orders = count(Order::all());
        $total_paid_orders = count(Order::where('state','paid')->get());

        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('horizontalBar')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Usuarios', 'Productos','Órdenes','Pedidos'])
            ->datasets([
                [
                    "label" => "2020",
                    'backgroundColor' => ['rgba(236, 0, 140, 0.2)', 'rgba(237, 28, 36, 0.2)', 'rgba(249, 157, 28, 0.2)', 'rgba(0, 143, 213, 0.2)', 'rgba(128, 42, 144, 0.2)'],
                    'data' => [$total_users, $total_products, $total_orders,$total_paid_orders]
                ]
            ])
            ->options([]);

        return view('partials.graphic', compact('chartjs'));
    }
}
