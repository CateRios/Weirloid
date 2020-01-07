<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}" />
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

    <div class="container-fluid">

        <div class="row">
            <!-- Filters -->
            <section class="filters col-md-2">
                <div id="title"><h4>Filtrar por</h4></div>
                <form name='form' id='filterForm' action='searchManga' method='post' enctype="multipart/form-data">
                {{ csrf_field() }}
                <!-- Type -->
                    <section>
                        <p>Tipo</p>
                        <label class="radio">Manga<input type="radio" name="type" value="manga"><span class="checkmark"></span></label><br>
                        <label class="radio">Cómics<input type="radio" name="type" value="comic"><span class="checkmark"></span></label><br>
                        <label class="radio">Novela gráfica<input type="radio" name="type" value="novel"><span class="checkmark"></span></label><br>
                    </section>

                    <!-- Genre -->
                    <section>
                        <p>Género</p>
                        <label class="radio">Acción<input type="radio" name="genre" value="action"><span class="checkmark"></span></label><br>
                        <label class="radio">Comedia<input type="radio" name="genre" value="comedy"><span class="checkmark"></span></label><br>
                        <label class="radio">Drama<input type="radio" name="genre" value="drama"><span class="checkmark"></span></label><br>
                        <label class="radio">Fantasía<input type="radio" name="genre" value="fantasy"><span class="checkmark"></span></label><br>
                        <label class="radio">Misterio<input type="radio" name="genre" value="mistery"><span class="checkmark"></span></label><br>
                        <label class="radio">Romance<input type="radio" name="genre" value="romance"><span class="checkmark"></span></label><br>
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
            <section class="catalog-products-section col-md-10">
                <!-- New Products -->
                <div class="section">

                    <!-- Header-->
                    <h2>Nuevos</h2>

                    <!-- List of products -->
                    <div class="productsBackground">
                        <div class="card-columns productList">
                            {{\App\Http\Controllers\MangaCatalogController::getNewProducts()}}
                        </div>
                    </div>

                    <!-- All Products -->
                    <!-- All Products -->
                    <div class="section" id="section-div">

                        <!-- Header-->
                        <h2>Todos los productos</h2>

                        <!-- List of products -->
                        <div class="productsBackground">
                            <div class="card-columns productList">
                                {{\App\Http\Controllers\MangaCatalogController::getProducts()}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

<!-- Footer -->
@include('general.footer')

</body>
</html>
