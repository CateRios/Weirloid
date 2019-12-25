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

    <script>
        $( function() {
            $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 320,
            step: 5,
            values: [20, 300],
            slide: function( event, ui ) {
            var delay = function() {
                var handleIndex = $(ui.handle).index();
                var label = handleIndex == 1 ? "#min" : "#max";
                $(label).html(ui.value + "€").position({
                    my: "center top",
                    at: "center bottom",
                    of: ui.handle,
                    offset: "0, 0"
                    });
                };
                    
                    // wait for the ui.handle to set its position
                    setTimeout(delay, 5);
            }
            });

        $("#min").html($("#slider-range").slider("values", 0) + "€").position({
            my: "center top",
            at: "center bottom",
            of: $("#slider-range span:eq(0)"),
            offset: "0, 10"
        });

        $("#max").html($("#slider-range").slider("values", 1) + "€").position({
            my: "center top",
            at: "center bottom",
            of: $("#slider-range span:eq(1)"),
            offset: "0, 10"
        });

        });
  </script>
    
</head>

<body>

    <!-- Header -->
    @include('general.header')
    
    <!-- Categories navbar-->    
    <nav class="catalog-nav-bar">
        <ul>
            <?php //mantener link como acivo -> jquery?>
            <li><a href="popsCatalog" class="pops">Figuras y Pop's</a></li>
            <li><a href="mangaCatalog" class="manga">Manga y cómics</a></li>
            <li><a a href="electronicsCatalog" class="electronics">Electrónica</a></li>
            <li><a a href="clothesCatalog" class="clothes">Ropa</a></li>
        </ul>

        <ul>
            <li><a href="">Ofertas</a></li>
            <li><a href="">Top Ventas</a></li>
        </ul>

        <form>
            <input type="search" name="search" value="  Escribe aquí...">
        </form>


        <?php //el carrito de las narices ?>
    </nav>

    <div class="row">
    <!-- Filters -->
    <section class="filters col-md-3">
        <div id="title"><h4>Filtrar por</h4></div>
        <form>
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
        </section>

        <!-- Assets -->
        <section>
            <p>Valoración</p>
            <label class="radio">1 estrella o más<input type="radio" name="assets" value="1"><span class="checkmark"></span></label><br>
            <label class="radio">2 estrellas o más<input type="radio" name="assets" value="2"><span class="checkmark"></span></label><br>
            <label class="radio">3 estrellas o más<input type="radio" name="assets" value="3"><span class="checkmark"></span></label><br>
            <label class="radio">4 estrellas o más<input type="radio" name="assets" value="4"><span class="checkmark"></span></label><br>
            <label class="radio">5 estrellas<input type="radio" name="assets" value="5"><span class="checkmark"></span></label><br>
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
        </div>
    </section>
    </div>

<!-- Footer -->
@include('general.footer')
  
</body>
</html>
