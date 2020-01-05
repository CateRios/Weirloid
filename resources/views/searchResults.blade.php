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
    <!-- -Products -->
    <section class="catalog-products-section">
        <!-- New Products -->
        <div class="section">


            <!-- All Products -->
            <div class="section" id="section-div">

                <!-- Header-->
                <h2>Resultados de la búsqueda</h2>

                    <!-- List of products -->
                    <div class="productsBackground">
                        <div id="productsDiv" class="card-columns productList">
                        @foreach($products as $product)

                            <!-- Product Card -->
                            <div class="card productCard" onclick="location.href = '{{$product->categoryDetailLink}}';">
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
                            @endforeach
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
