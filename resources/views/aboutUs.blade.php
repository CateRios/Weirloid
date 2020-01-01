<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/aboutUs.css') }}" />

    <!-- Scripts -->
    @include('general.scripts')

</head>

<body>

<!-- Header -->
 @include('general.header')

<!-- Descripción de la empresa -->
<div class="container">
    <h1>WEIRLOID ENTERPRISE</h1>
    <p class="texto">"Un Weirloid para gobernarlos a todos. Un Weirloid para encontrarlos, un Weirloid para atraerlos a todos y atarlos en el lado oscuro de lo friki." Este proyecto es un página de venta de mechandising online, pero no cualquiera está preparado para este código que nunca tiene fallos, simplemente desarrolla características aleatorias. Aquí podrás encontrar cómics, mangas, figuras, coleccionables y ropa entre otros para que siempre seas tú mismo... A menos que puedas ser Batman, es mejor ser Batman.</p>
    <p class="texto">Weirloid surgió de tres estudiantes que <em>CASI</em> igual que los caballos del hipódromo van a lograr terminar la carrera. Una asignatura y una idea. Canarias, tenemos un problema. Menos de dos meses... Certeza de muerte, mínima esperanza de éxito, ¿a qué esperamos?</p>
</div>

<!-- Tarjetas con las fundadoras -->
<div class="card-deck" style="margin: 3% 15%">
    <div class="card contact-card">
        <img class="card-img-top" src="{{asset('img/cristina.png')}}" alt="Cristina">
        <div class="card-body contact-card-body">
            <h5 class="card-title">Cristina de las Nieves Montesdeoca Flores</h5>
            <p class="card-text texto">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
    </div>
    <div class="card contact-card">
        <img class="card-img-top" src="{{asset('img/caterina.png')}}" alt="Caterina">
        <div class="card-body contact-card-body">
            <h5 class="card-title">Caterina Rios Bolaños</h5>
            <p class="card-text texto">This card has supporting text below as a natural lead-in to additional content.</p>
        </div>
    </div>
    <div class="card contact-card">
        <img class="card-img-top" src="{{asset('img/yguanira.png')}}" alt="Yguanira">
        <div class="card-body contact-card-body">
            <h5 class="card-title">Yguanira del Pino Vega Vega</h5>
            <p class="card-text texto">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        </div>
    </div>
</div>

<!-- Footer -->
 @include('general.footer')

</body>
</html>
