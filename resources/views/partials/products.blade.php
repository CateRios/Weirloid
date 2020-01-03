@foreach($products as $product)

    <!-- Product Card -->
    <div class="card productCard">
        <img class="card-img-top productCard-image" src="{{asset('img/featured_product.jpg')}}" alt="Card image">
        <div class="productCard-price">
            <h4 class="card-title">{{$product->price}} €</h4>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 productCard-category">{{$product->category}}</h6>
            <h5 class="card-title productCard-name">{{$product->name}}</h5>

            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>

            @for ($i = 1; $i <= $product->score; $i++)
                <span class="fa fa-star checked"></span>
            @endfor

            @for ($i = $product->score; $i < 6; $i++)
                <span class="fa fa-star"></span>
            @endfor

        </div>
    </div>

@endforeach

<!-- Paginator -->
{{ $products->links() }}
