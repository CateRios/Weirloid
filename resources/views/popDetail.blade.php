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
    
    <!--Nav bar -->
    @include('general.catalognav')

    <!-- -Detail -->
    <section class="detail row">
        <!-- Image-->
        <div class="section col-md-3 offset-md-3">

        <?php

            $id =$item->id;
            $name = $item->name;
            $price = $item->price;
            $category = $item->class;
            $score = $item->score;
            $description = $item->description;
            $stock = $item->stock;
            $img =base64_decode($item->image);

        ?>

            <!-- Product Card -->
            <div class="card productCard">
                <img class="card-img-top productCard-image" id="<?=$id?>" src="<?=$img?>" alt="<?=$name?>">
                <div class="productCard-price">
                    <h4 class="card-title"><?=$price?>€</h4>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 productCard-category"><?=$category?></h6>
                    

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

            <form action='addProduct' method='post'>
            {{ csrf_field() }}
            <section class="data-section">
                <article>
                    <h1>Descripción</h1>
                    <p><?=$description?></p>
                </article>
                <article>
                    <h1>Cantidad</h1>
                    <?php
                    if($stock >= 1){
                        echo "<input type='number' value='1' name='quantity' min='1' max='$stock' class='quantity-input'></button>";
                    }else{
                        echo "<p>No hay stock suficiente</p>";
                    }
                    ?>
                </article>
                <input type="hidden" value="<?=$id?>" name="id">
            </section>
            <button type="submit" class="button-submit">
                Lista de deseos <i class="fas fa-heart"></i> 
            </button>

            <?php
                if($stock >= 1){
                ?>
                    <button type="submit" class="button-submit" name="addToCart">
                        Añadir al carrito <i class="fas fa-shopping-cart"></i> 
                    </button>
                <?php
                }
            ?>
            </form>
        </div>
    </section>

<!-- Footer -->
@include('general.footer')

</body>
</html>
