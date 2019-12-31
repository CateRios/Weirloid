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
        $('#more').change(function(){
        $('#quantity').text("2");
    });
  </script>

    
</head>


<body>

    <!-- Header -->
    @include('general.header')
    
    <!--Nav bar -->
    @include('general.catalognav')

    <!-- -Detail -->
    <section class="detail row">
        <!-- Image-->
        <div class="section col-md-3 offset-md-3">

        <?php

            use Intervention\Image\ImageManagerStatic as Image;

            $id =$item->id;
            $name = $item->name;
            $price = $item->price;
            $category = $item->class;
            $img = $item->image;
            $score = $item->score;
            $description = $item->description;
            $stock = $item->stock;
        ?>

            <!-- Product Card -->
            <div class="card productCard">
                <img class="card-img-top productCard-image" src="{{base64_decode(<?=$item->image?>)}}" alt="<?=$name?>">
                <div class="productCard-price">
                    <h4 class="card-title"><?=$price?>€</h4>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 productCard-category"><?=$category?></h6>
                    <h5 class="card-title productCard-name"><?=$name?></h5>

                <!--Stars-->
                    <?php
                        $i=1;
                        for($i=1; $i <= $score; $i++){
                            echo "<span class='fa fa-star checked'></span>";
                        }
                        while($i <=5){
                            echo "<span class='fa fa-star'></span>";
                            $i++;
                        }
                    ?>
                </div>
            </div>
        </div>

        <!-- Data -->
        <div class="section col-md-3">

            
            <section class="data-section">
                <article>
                    <h1>Descripción</h1>
                    <p><?=$description?></p>
                </article>
                <article>
                    <h1>Cantidad</h1>
                    <input type="number" value="1" id="quantity" min="1" max="<?=$stock?>" class="quantity-input"></button>
                </article>
            </section>
            <button type="submit" class="button-submit">
                Lista de deseos <i class="fas fa-heart"></i> 
            </button>
            <button type="submit" class="button-submit">
                Añadir al carrito <i class="fas fa-shopping-cart"></i> 
            </button>
        </div>
    </section>


    <!-- -Products -->
    <section class="product-section">
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

<!-- Footer -->
@include('general.footer')

</body>
</html>
