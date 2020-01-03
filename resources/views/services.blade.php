<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/services.css') }}" />

    <!-- Scripts -->
    @include('general.scripts')

</head>

<body>

<!-- Header -->
@include('general.header')

@if((session()->exists('error_code')))
    <script>document.getElementById('cliente').click();</script>
    <?php session()->forget('error_code');?>
@endif

<!-- Tarjetas -->
<div class="card-deck" style="margin: 9.5% 5%">
    <div class="card service-card">
        <i class="fas fa-wallet service-icon"></i>
        <div class="card-body service-card-body">
            <h5 class="card-title">Calidad y precio</h5>
            <p class="card-text texto">Precios muy competitivos en más de 100 artículos.</p>
        </div>
    </div>
    <div class="card service-card">
        <i class="fas fa-dolly-flatbed service-icon"></i>
        <div class="card-body service-card-body">
            <h5 class="card-title">Canarias</h5>
            <p class="card-text texto">Realizamos envios a las 7 islas.</p>
        </div>
    </div>
    <div class="card service-card">
        <i class="fab fa-cc-paypal service-icon"></i>
        <div class="card-body service-card-body">
            <h5 class="card-title">Pagos seguros</h5>
            <p class="card-text texto">Paga sin problemas a través de PayPal.</p>
        </div>
    </div>
    <div class="card service-card">
        <i class="fas fa-user-shield service-icon"></i>
        <div class="card-body service-card-body">
            <h5 class="card-title">Compra con confianza</h5>
            <p class="card-text texto">Nuestra Protección del Comprador protege tu compra de principio a fin.</p>
        </div>
    </div>
    <div class="card service-card">
        <i class="fas fa-headset service-icon"></i>
        <div class="card-body service-card-body">
            <h5 class="card-title">Centro de ayuda 24/7</h5>
            <p class="card-text texto">Asistencia continua para que compres sin problemas.</p>
        </div>
    </div>
</div>

<!-- Footer -->
@include('general.footer')

</body>
</html>
