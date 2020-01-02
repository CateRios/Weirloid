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

                $id =$item->id;
                $name = $item->name;
                $model = $item->model;
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
                    <h4 class="card-title"><?=$price?> €</h4>
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

            <form action='addProduct' method='post'>
            {{ csrf_field() }}
            <section class="data-section">
                <article>
                    <h1>Descripción</h1>
                    <p><?=$description?></p>
                </article>
                <article>
                    <h1>Modelo</h1>
                    <?php 
                    for($i=0;$i<strlen($model);$i++)
                    {
                        if(strcmp($model[$i], ',')){
                            $tmp = $model[$i];
                            echo "<label class='radio' id='model'>$tmp<input type='radio' name='size' value='$tmp'><span class='checkmark'></span></label>";
                        }
                        
                    }?>
                </article>
                <article>
                    <h1>Cantidad</h1>
                    <input type="number" value="1" name="quantity" min="1" max="<?=$stock?>" class="quantity-input"></button>
                </article>
                <input type="hidden" value="<?=$id?>" name="id">
            </section>
            <button type="submit" class="button-submit">
                Lista de deseos <i class="fas fa-heart"></i> 
            </button>
            <button type="submit" class="button-submit" name="addToCart">
                Añadir al carrito <i class="fas fa-shopping-cart"></i> 
            </button>
            </form>
        </div>
    </section>


<!-- Footer -->
@include('general.footer')

</body>
</html>
