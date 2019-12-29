<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/productDetail.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}" />

    <!-- Scripts -->
    @include('general.scripts')

</head>


<body>

<!-- Header -->
@include('general.header')


<!-- -Detail -->
<section class="detail row">
    <!-- Image-->
    <div class="section col-md-3 offset-md-3">
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

    <!-- Data -->
    <div class="section col-md-3">


        <section class="data-section">
            <article>
                <h1>Identificador del pedido</h1>
                <p>Nº Identificador</p>
            </article>
            <article>
                <h1>Fecha pedido</h1>
                <p>Fecha realización del pedido</p>
            </article>
            <article>
                <h1>Fecha entrega</h1>
                <p>Fecha orientativa de llegada pedido</p>
            </article>
            <article>
                <h1>Estado</h1>
                <p>Estado actual del pedido</p>
            </article>
        </section>
    </div>
</section>

<!-- Footer -->
@include('general.footer')

</body>
</html>
