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
        <form name='form' id='filterForm' action='searchCatalog' method='post' enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- Price range -->
        <section>
        <p>Precio</p>
        <div id="slider-range"></div>
        <div id="min"></div>
        <div id="max"></div>
        <input type="hidden" value="0" name="minPrice" id="minPrice">
        <input type="hidden" value="300" name="maxPrice" id="maxPrice">
        </section>

        <!-- score -->
        <section>
            <p>Valoración</p>
            <label class="radio">1 estrella o más<input type="radio" name="score" value="1"><span class="checkmark"></span></label><br>
            <label class="radio">2 estrellas o más<input type="radio" name="score" value="2"><span class="checkmark"></span></label><br>
            <label class="radio">3 estrellas o más<input type="radio" name="score" value="3"><span class="checkmark"></span></label><br>
            <label class="radio">4 estrellas o más<input type="radio" name="score" value="4"><span class="checkmark"></span></label><br>
            <label class="radio">5 estrellas<input type="radio" name="score" value="5"><span class="checkmark"></span></label><br>
        </section>
        <!--Apply filters-->
        <section><input type='submit' name='submitFilters' value='Aplicar filtros'></section>
        </form>
    </section>

    <!-- -Products -->
    <section class="catalog-products-section col-md-9">
        <!-- New Products -->
        <div class="section">

            <!-- All Products -->
            <div class="section" id="section-div">

                <!-- Header-->
                <h2>Todos los productos</h2>

                    <!-- List of products -->
                    <div class="productsBackground">
                        <div id="productsDiv" class="card-columns productList">
                            {{\App\Http\Controllers\CatalogController::getProducts()}}
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
