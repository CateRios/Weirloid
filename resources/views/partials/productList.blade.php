@foreach($products as $product)

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

        <ul class="list-group list-group-flush">
            <li class="list-group-item">Stock disponible: {{$product->stock}}</li>
            <li class="list-group-item">Fecha de creación: {{$product->created_at}}</li>
            <li class="list-group-item">Última modificación: {{$product->updated_at}}</li>
        </ul>
        <div class="card-body">
            <a href="editProduct{{$product->id}}" class="card-link">Editar</a>
            <a href="deleteProduct{{$product->id}}" class="card-link">Eliminar</a>
        </div>
    </div>

@endforeach

{{$products->links('general.paginator')}}