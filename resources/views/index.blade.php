<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />

    <!-- Scripts -->
    @include('general.scripts')

</head>

<body>

<!-- Header -->
 @include('general.header')

<!-- Carousel -->
<div id="homeCarousel" class="carousel slide carousel-fade homeCarousel" data-ride="carousel">

    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block w-100 carouselImg" src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg"
                 alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 carouselImg" src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg"
                 alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 carouselImg" src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg"
                 alt="Third slide">
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
        <a class="carouselButton" href="#" role="button">Empezar <i class="fa fa-angle-right" aria-hidden="true"></i></a>
    </div>

</div>

<!-- Featured Products -->
<div class="section">

    <!-- Header-->
    <h2>Productos destacados</h2>

    <!-- List of products -->
    <div class="productsBackground">

        <div class="card-columns productList">

        <!-- Product Card -->
        <div class="card productCard">
            <img class="card-img-top productCard-image" src="{{asset('img/featured_product.jpg')}}" alt="Card image">
            <div class="productCard-price">
                <h4 class="card-title">--- €</h4>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle mb-2 productCard-category">[Categoría]</h6>
                <h5 class="card-title productCard-name">[Nombre del producto]</h5>

                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>

    </div>
</div>

</div>

<!-- Footer -->
 @include('general.footer')

</body>
</html>
