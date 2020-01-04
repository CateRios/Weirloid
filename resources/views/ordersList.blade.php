<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}"/>

    <!-- Scripts -->
    @include('general.scripts')
</head>
<body>
<!-- Header -->
@include("general.header")
<article class="ordersList">
    {{App\Http\Controllers\OrdersListController::getOrders()}}
    <!--<section id="order">
        <article onclick="">
            <img id="imageList" src="{{asset('img/featured_product.jpg')}}" >
            <h1>Nº orden</h1>
            <h1>Estado</h1>
        </article>
    </section>-->
</article>
<!-- Footer -->
@include('general.footer')
</body>
</html>
