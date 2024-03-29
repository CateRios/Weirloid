<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />

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

<!-- Carousel -->
<div id="homeCarousel" class="carousel slide carousel-fade homeCarousel" data-ride="carousel">

    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block w-100 carouselImg" src="http://k31.kn3.net/taringa/E/2/E/7/8/9/jammfusy/F58.png"
                 alt="First slide" style="min-height: 650px">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 carouselImg" src="https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/styles/main_element/public/media/image/2019/08/funko-pops-exclusivos-son-casi-imposibles-conseguir.jpg?itok=rnSM1yOt"
                 alt="Second slide" style="min-height: 650px">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 carouselImg" src="http://cdn5.upsocl.com/wp-content/uploads/2017/02/portada-257.jpg"
                 alt="Third slide" style="min-height: 650px">
        </div>
    </div>

    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#homeCarousel" data-slide-to="1"></li>
        <li data-target="#homeCarousel" data-slide-to="2"></li>
    </ol>

    <!--Controls-->
    <a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

    <!--Button-->
    <div class="carousel-caption d-none d-md-block caption">
        <a class="carouselButton" href="catalog" role="button">Empezar <i class="fa fa-angle-right" aria-hidden="true"></i></a>
    </div>

</div>

<!-- Featured Products -->
<div class="section" style="margin-bottom: 9%;: ">

    <!-- Header-->
    <h2>Productos destacados</h2>

    <!-- List of products -->
    <div class="productsBackground">

        <div class="card-columns productList">

            {{\App\Http\Controllers\Index_controller::getFeaturedProducts()}}

    </div>
</div>

</div>

<!-- Footer -->
 @include('general.footer')

</body>
</html>
