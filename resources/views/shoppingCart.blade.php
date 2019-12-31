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

</head>

<body>

    <!-- Header -->
        @include("general.header")
    
    <!--Nav bar -->
    @include('general.catalognav')

<section class="cart">
    <h1>MI CARRITO</h1>
    <table>
    <tr id="column-name">
        <th>Artículo</th>
        <th>Cantidad</th>
        <th>Precio</th>
    </tr>
    <tr id="items">
        <td>Figura Flash Edición Limitada</td>
        <td>1</td>
        <td>150€</td>
    </tr>
    <tr id="items">
        <td>Camiseta Flash  Edición Limitada</td>
        <td>1</td>
        <td>95€</td>
    </tr>
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
    <button><label>PAGAR AHORA</label></button>
</section>

<!-- Footer -->
@include("general.footer")

    
</body>