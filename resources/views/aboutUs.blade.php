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
            <p class="card-text texto">Nuestra pequeña linda mascota es una niña con muchas ideas de niña de 3 años a la que le encanta
                el rosa, finge no ser una friki pero no tan al fondo se puede ver un anime o un drama coreano en una tarde y ella tan
                contenta. En el trabajo ella ha sido la encargada de la creación del perfil y todas sus funciones ya que "la gente
                puede elegir como se ve en una página web" y las funciones del pago.</p>
        </div>
    </div>
    <div class="card contact-card">
        <img class="card-img-top" src="{{asset('img/caterina.png')}}" alt="Caterina">
        <div class="card-body contact-card-body">
            <h5 class="card-title">Caterina Rios Bolaños</h5>
            <p class="card-text texto">Caterina es la mas friki de las tres no solo por la cantidad de animes que se puede ver si no
            tambien porque el contenido de estos suelen ser demasiado random para el gusto de la gente normal. De cara al trabajo
            realizado ella ha sido la encargada de la búsqueda de los objetos del catálogo y de la implementación de este.</p>
        </div>
    </div>
    <div class="card contact-card">
        <img class="card-img-top" src="{{asset('img/yguanira.png')}}" alt="Yguanira">
        <div class="card-body contact-card-body">
            <h5 class="card-title">Yguanira del Pino Vega Vega</h5>
            <p class="card-text texto">La líder de los frikis que ha hecho que las otras dos nos introdujéramos en el mundo  friki con
                animes que nos recomendaba poco a poco. Además es la creadora de la idea y de este diseño tan hermoso de la pagina web
                junto con el proceso de inicio de sesión y la creación del usuario.</p>
        </div>
    </div>
</div>

<!-- Footer -->
 @include('general.footer')

</body>
</html>
