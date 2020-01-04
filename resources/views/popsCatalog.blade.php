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
            max: 300,
            step: 5,
            values: [0, 300],
            slide: function( event, ui ) {
                $("#minPrice").val(ui.values[ 0 ]);
                $("#maxPrice").val(ui.values[ 1 ]);

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
                    setTimeout(delay, 100);
                    $('form').submit();
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

    $(document).ready(function() { 
    $('input').change(function(){
        $('form').submit();
    });
    });

  </script>

    
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
        <form name='form' id='form' action='submitFilters' method='post' enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- Type -->
         <section>   
            <p>Tipo</p>
            <label class="radio">Pops<input type="radio" name="type" value="pop"><span class="checkmark"></span></label><br>
            <label class="radio">Figuras<input type="radio" name="type" value="figure"><span class="checkmark"></span></label><br>
            <label class="radio">Amiibo<input type="radio" name="type" value="amiibo"><span class="checkmark"></span></label><br>
        </section>

        <!-- Category -->
        <section>
            <p>Categoría</p>
            <label class="radio">Disney<input type="radio" name="category" value="disney"><span class="checkmark"></span></label><br>
            <label class="radio">Marvel<input type="radio" name="category" value="marvel"><span class="checkmark"></span></label><br>
            <label class="radio">DC cómics<input type="radio" name="category" value="dc"><span class="checkmark"></span></label><br>
            <label class="radio">Anime y manga<input type="radio" name="category" value="anime"><span class="checkmark"></span></label><br>
            <label class="radio">Series y películas<input type="radio" name="category" value="series"><span class="checkmark"></span></label><br>
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
        </form>
    </section>

    <!-- -Products -->
    <section class="catalog-products-section col-md-8 offset-md-1">
        <!-- New Products -->
        <div class="section">

            <!-- Header-->
            <h2>Nuevos</h2>

            <!-- List of products -->
            <div class="productsBackground">
                <div class="card-columns productList">
                    <!-- Product Card -->
                    <div class="card productCard">
                        <a href="popDetail"><img class="card-img-top productCard-image" src="{{asset('img/new_product.png')}}" alt="Card image"></a>
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
