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
  <script>
 
  </script>
    
</head>


<body>

    <!-- Header -->
    @include('general.header')
    
    <!-- Categories navbar-->    
    <nav class="catalog-nav-bar">
        <ul>
            <?php //mantener link como acivo -> jquery?>
            <li><a href="popsCatalog" class="pops" name="navpops">Figuras y Pop's</a></li>
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
                    <h1>Descripción</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit, sed do eiusmod tempor 
                        incididunt ut labore et dolore magna aliqua.</p>
                </article>
                <article>
                    <h1>Cantidad</h1>
                </article>
            </section>
            <form>
                <input type="submit" name="wishList" value="Lista de deseos">
                <input type="submit" name="addToCart" value="Añadir al carrito">
            </form>
        </div>
    </section>


    <!-- -Products -->
    <section class="sub">
        <!-- New Products -->
        <div class="section">

            <!-- Header-->
            <h2>Productos relacionados</h2>

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
    </section>

  
</body>
</html>
