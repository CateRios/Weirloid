<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Order;
use App\Order_Detail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersListController extends Controller
{
    static function getOrders()
    {

        $user = Auth::user();
        $orders = Order::where('id_user', $user->id)->where('state',"Paid")->get();
        foreach ($orders as $item) {
            $id = $item->id;
            $date = $item->created_at;
            echo " <!-- Message Card -->
                <a href='orderDetail$id'>
                <section id='order'>
                <article>
                    <h1>Pedido número: $id</h1>
                    <h1>Fecha: $date</h1>
                    </article>";


            echo "</section></a>";
        }
    }

    public function callDetails($id)
    {

        $orderDetails = Order_Detail::where('id_order', $id)->get();

        return view('orderDetail', ['item' => $id]);
    }

    static function getDetail($id)
    {
        $order = Order::where('id', $id)->first();
        $orderDetails = Order_Detail::where('id_order', $id)->get();
        $id = $order->id;
        $date = $order->created_at;
        $total = $order->total;
        //$date=$orderDetails->create_at;
        echo "    <!-- Data -->
    <div class=\"section floated\">


        <section class=\"data-section\">
            <article>
                <h1>Identificador del pedido</h1>
                <p>
                ";
        echo $id;
        echo "    </p></article>
            <article>
                <h1>Fecha pedido</h1>
                <p>
                ";
        echo $date;
        echo "</p>
            </article>
            <article>
                <h1>Total</h1>
                <p>";
            echo $total."€";
        echo "</p>
            </article>
        </section>
    </div>
</section>
";
        echo "<section id='productDetail'>";
        foreach ($orderDetails as $item) {
            $idProduct = $item->id_product;
            $orderDetails = Product::where('id', $idProduct)->first();
            $name = $orderDetails->name;
            $category = $orderDetails->class;
            $price = $orderDetails->price;
            $image = $orderDetails->image;
            ?>
            <!-- -Detail -->
            <section class="detail row">
                <!-- Image-->
                <div class="md-3">
                    <!-- Product Card -->
                    <div class="card productCard">
                        <img class="card-img-top productCard-image" src="<?= $image ?>"
                             alt="Card image">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 productCard-category"><?= $category ?></h6>
                            <h5 class="card-title productCard-name"><?= $name ?></h5>
                        </div>
                    </div>
                </div>
            </section>

            <?php
        }
        echo "</section>";
    }
}
