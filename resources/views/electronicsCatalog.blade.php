<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weirloid</title>
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="/resources/demos/style.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>

    <!-- Scripts -->
    @include('general.scripts')
    
</head>

<body>

    <!-- Header -->
    @include('general.header')
    
    <!--Nav bar -->
    @include('general.catalognav')

    <div class="row">
    <!-- Filters -->
    <section class="filters col-md-3">
        <div id="title"><h4>Filtrar por</h4></div>
        <form name='form' id='filterForm' action='searchElectronics' method='post' enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- Type -->
         <section>   
            <p>Tipo</p>
            <label class="radio">Carcasas<input type="radio" name="type" value="case"><span class="checkmark"></span></label><br>
            <label class="radio">Fundas<input type="radio" name="type" value="sheat"><span class="checkmark"></span></label><br>
            <label class="radio">Almacenamiento<input type="radio" name="type" value="storage"><span class="checkmark"></span></label><br>
            <label class="radio">Periféricos<input type="radio" name="type" value="peripheral"><span class="checkmark"></span></label><br>
        </section>

        <!-- Category -->
        <section>
            <p>Categoría</p>
            <label class="radio">Móvil<input type="radio" name="category" value="mobile"><span class="checkmark"></span></label><br>
            <label class="radio">Tablet<input type="radio" name="category" value="tablet"><span class="checkmark"></span></label><br>
            <label class="radio">PC y portátil<input type="radio" name="category" value="computer"><span class="checkmark"></span></label><br>
        </section>

        <!-- Price range -->
        <section>
        <p>Precio</p>
        <div id="slider-range"></div>
        <div id="min"></div>
        <div id="max"></div>
        <input type="hidden" value="0" name="minPrice" id="minPrice">
        <input type="hidden" value="300" name="maxPrice" id="maxPrice">
        </section>

        <!-- Score -->
        <section>
            <p>Valoración</p>
            <label class="radio">1 estrella o más<input type="radio" name="score" value="1"><span class="checkmark"></span></label><br>
            <label class="radio">2 estrellas o más<input type="radio" name="score" value="2"><span class="checkmark"></span></label><br>
            <label class="radio">3 estrellas o más<input type="radio" name="score" value="3"><span class="checkmark"></span></label><br>
            <label class="radio">4 estrellas o más<input type="radio" name="score" value="4"><span class="checkmark"></span></label><br>
            <label class="radio">5 estrellas<input type="radio" name="score" value="5"><span class="checkmark"></span></label><br>
        </section>
        </form>
    </section>

    <!-- -Products -->
    <section class="catalog-products-section offset-md-1 col-md-8">
        <!-- New Products -->
        <div class="section">

            <!-- Header-->
            <h2>Nuevos</h2>

            <!-- List of products -->
            <div class="productsBackground">
                <div class="card-columns productList">
                    <!-- Product Card -->
                    <div class="card productCard">
                        <img class="card-img-top productCard-image" src="{{asset('img/new_product.png')}}" alt="Card image">
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

            <!-- All Products -->
            <div class="section" id="section-div">

                <!-- Header-->
                <h2>Todos los productos</h2>

                    <!-- List of products -->
                    <div class="productsBackground">

                        <div class="card-columns productList">
                            <?php 
                                echo $products; 
                            ?>  
                        </div>
                    </div>
            </div>
        </div>
    </section>
    </div>

<!-- Footer -->
@include('general.footer')
  
</body>
</html>
