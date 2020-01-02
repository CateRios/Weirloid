<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weirloid</title>
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}" />

    <!-- Scripts -->
    @include('general.scripts')

    <script>

        function signFormSend() {
            var action = $("input[name=options]:checked").val()

            if(action == 0) {
                $('#signForm').attr('action', 'login');
            } else {
                $('#signForm').attr('action', 'register');
            }

            document.signForm.submit();
        }

    </script>

</head>

<body>

    <!-- Header -->
        @include("general.header")
    
    <!--Nav bar -->
    @include('general.catalognav')

<section class="shoppingCart">

    <h1>MI CARRITO</h1>
    <table>
    <tr id="column-name">
        <th>Artículo</th>
        <th>Cantidad</th>
        <th>Precio</th>
    </tr>

<?php

    use App\Product;

    if(session()->exists('cart')){

        $cartProducts = session()->get('cart');

        $HTMLProducts = "";

        foreach($cartProducts as $item){

                $products = Product::where('id', $cartProducts['id']->get());

                foreach($products as $product){

                    $totalPrice = $product->price * $cartProducts['quantity'];

                    $name = $product->name;
                    $quantity = $cartProducts['quantity'];
                    $price = $product->price;

                    echo "
                    <tr id='items'>
                    <td>$name</td>
                    <td>$quantity></td>
                    <td>$price €</td>
                    Holi
                    </tr>";

                }
            

            
            
        }

    } 

?>
    <tr>
        <td></td>
        <th id="column-name">Total</th>
        <td id="column-name"></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>245€</td>
    </tr>
    </table>

    @if(Auth::check())
        <a href='paymentPlatform'><button><label>PAGAR AHORA</label></button></a>
    @else
        <div>
            <a data-toggle='modal' data-target='#signModal'><button><label>PAGAR AHORA</label></button></a>
            <!-- Sign In/Up Modal -->
            @include('partials.signModal')
        </div>
    @endif
    
</section>

<!-- Footer -->
@include("general.footer")

    
</body>