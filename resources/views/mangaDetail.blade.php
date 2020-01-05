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

           <!-- Product Card -->
            <div class="card productCard">
                <img class="card-img-top productCard-image" src="{{$product->image}}" alt="Card image">
                <div class="productCard-price">
                    <h4 class="card-title" style="background-color: {{$product->categoryColor}}">{{$product->price}} €</h4>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 productCard-category" style="color: {{$product->categoryColor}}">{{$product->class}}</h6>
                    <h5 class="card-title productCard-name">{{$product->name}}</h5>

                    @for ($i = 1; $i <= $product->score; $i++)
                        <span class="fa fa-star checked"></span>
                    @endfor

                    @for ($i = $product->score; $i < 5; $i++)
                        <span class="fa fa-star"></span>
                    @endfor

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
                    <p>{{$product->description}}</p>
                </article>
                <article>
                    <h1>Autor</h1>
                    <p>{{$product->author}}</p>
                </article>
                <article>
                    <h1>Cantidad</h1>
                    @if ($product->stock >= 1)
                        <input type='number' value='1' name='quantity' min='1' max='{{$product->stock}}' class='quantity-input'></button>
                    @else
                        <p>No hay stock suficiente</p>
                    @endif
                </article>
                <input type="hidden" value="{{$product->id}}" name="id">
            </section>
            <button type="submit" class="button-submit">
                Lista de deseos <i class="fas fa-heart"></i> 
            </button>
                @if($product->stock >= 1)
                    <button type="submit" class="button-submit" name="addToCart">
                        Añadir al carrito <i class="fas fa-shopping-cart"></i> 
                    </button>
                @endif
            </form>
        </div>
        </div>
    </section>


    
<!-- Footer -->
@include('general.footer')

</body>
</html>
