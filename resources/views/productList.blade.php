<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}" />
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
                <form name='form' id='filterForm' action='searchProductList' method='post' enctype="multipart/form-data">
                {{ csrf_field() }}
                <!-- Clase -->
                    <section>
                        <p>Clase</p>
                        <label class="radio">Figuras y Pop's<input type="radio" name="class" value="Figuras y Pop's"><span class="checkmark"></span></label><br>
                        <label class="radio">Manga y cómics<input type="radio" name="class" value="Manga y cómics"><span class="checkmark"></span></label><br>
                        <label class="radio">Electrónica<input type="radio" name="class" value="Electrónica"><span class="checkmark"></span></label><br>
                        <label class="radio">Ropa<input type="radio" name="class" value="Ropa"><span class="checkmark"></span></label><br>
                    </section>
                    <!--Apply filters-->
                    <section><input type='submit' name='submitFilters' value='Aplicar filtros'></section>
                </form>
            </section>

            <!-- -Product List -->
            <section class="catalog-products-section col-md-10">
                <!-- New Products -->
                <div class="section">

                    <!-- All Products -->
                    <div class="section" id="section-div">

                        <!-- Header-->
                        <h2>Lista de productos de Weirloid</h2>

                        <!-- List of products -->
                        <div class="productsBackground">
                            <div id="productsDiv" class="card-columns productList">
                                {{\App\Http\Controllers\ProductListController::getProductList()}}
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