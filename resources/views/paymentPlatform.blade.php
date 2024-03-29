<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/paymentPlatform.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />

    <!-- Scripts -->
    @include('general.scripts')

</head>
<body>
<!-- Header -->
@include('general.header')

<article class="resume">
    <h1>Resumen del pedido</h1>
    <section class="cart">
        <form class="w3-container w3-display-middle w3-card-4 w3-padding-16" method="POST" id="payment-form"
              action='paypal'>
            {{ csrf_field() }}
        <table>
            <tr>
                <th id="column-name">Total</th>
                <td id="column-name"></td>
            </tr>
            <tr>
                <td></td>
                <td>{{\App\Http\Controllers\ShoppingCartController::getTotal()}} €</td>
            </tr>
        </table>
            <input type="hidden" value="{{\App\Http\Controllers\ShoppingCartController::getTotal()}}" name="amount">
            <input type="submit" class="button" value="PAGO SEGURO CON PAYPAL">
        </form>
    </section>
</article>
<article class="info">
    <h1>Información de envío</h1>
    <form>
        <table class="table-responsive">
            <tr>
                <td></td>
                <th>Contacto</th>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><input id="input" type="text" placeholder="Nombre completo"></td>
                <td><input id="input" type="tel" pattern="[0-9]{9}" placeholder="Móvil"></td>
            </tr>
            <tr>
                <td></td>
                <th>Dirección</th>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><input id="input" type="text" placeholder="Calle"></td>
                <td><input id="input" type="text" placeholder="Número, bloque, piso..."></td>
            </tr>
            <tr>
                <td></td>
                <td><select id="input" name="">
                        <option value="IC">Islas Canarias</option>
                    </select></td>
                <td><select id="input" name="island">
                        <option value="GC">Gran Canaria</option>
                        <option value="TF">Tenerife</option>
                        <option value="FTV">Fuerteventura</option>
                        <option value="LNZ">Lanzarote</option>
                        <option value="LG">La Gomera</option>
                        <option value="EH">El Hierro</option>
                        <option value="LP">La Palma</option>
                    </select></td>
            </tr>
            <tr>
                <td></td>
                <td><input id=input type="text" placeholder="Código postal"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="button" value="CONFIRMAR"></td>
            </tr>
        </table>

    </form>
</article>
<!-- Footer -->
@include('general.footer')

</body>
</html>
