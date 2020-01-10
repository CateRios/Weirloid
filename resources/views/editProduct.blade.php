<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-4">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/editProduct.css') }}" />

    <!-- Scripts -->
    @include('general.scripts')

</head>

<body>

    <!-- Header -->
    @include('general.header')

    <div class='editProduct'>
        <h1>Editar producto</h1>
            <form method='post' action='saveProductChanges' enctype="multipart/form-data">
            {{ csrf_field() }}
                <!--Nombre-->
                <div class="form-group row" style='margin-top: 1%'>
                    <label for="productName" class="col-md-4 col-form-label text-md-right" style="padding: 1%">{{ __('Nombre') }}</label>

                    <div class="col-md-4">
                        <input type="text" class="form-control input-myform" id="productName" name="productName" value="{{$product->name}}" required>
                    </div>
                </div>
                <!--Descripción-->
                <div class="form-group row">
                    <label for="productDescription" class="col-md-4 col-form-label text-md-right" style="padding: 1%">{{ __('Descripción') }}</label>

                    <div class="col-md-4">
                        <textarea class="form-control input-myform" id="productDescription" name="productDescription" cols="200" rows="6" required>{{$product->description}}</textarea>
                    </div>
                </div>
                <!--Imagen-->
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" style="padding: 1%">Seleccionar Imagen</label>
                    <div class="col-md-8">
                    <label for="productImage" class="inputImageLabel col-md-6 col-form-label text-md-center" style="margin-top: 1%">Elegir un archivo  <i class="fas fa-file-upload"></i></label>
                        <input type="file" class="inputImage" id="productImage" name="productImage" required>
                    </div>
                </div>
                <!--Clase-->
                <div class="form-group row">
                    <label for="productClass" class="col-md-4 col-form-label text-md-right" style="padding: 1%">{{ __('Clase') }}</label>

                    <div class="col-md-4">
                        <input type="text" class="form-control input-myform" id="productClass" name="productClass" value="{{$product->class}}" required>
                    </div>
                </div>
                <!--Tipo-->
                <div class="form-group row">
                    <label for="productType" class="col-md-4 col-form-label text-md-right" style="padding: 1%">{{ __('Tipo') }}</label>

                    <div class="col-md-4">
                        <input type="text" class="form-control input-myform" id="productType" name="productType" value="{{$product->type}}" required>
                    </div>
                </div>
                <!--Categoría-->
                <div class="form-group row">
                    <label for="productCategory" class="col-md-4 col-form-label text-md-right" style="padding: 1%">{{ __('Categoría') }}</label>

                    <div class="col-md-4">
                        <input type="text" class="form-control input-myform" id="productCategory" name="productCategory" value="{{$product->category}}" required>
                    </div>
                </div>
                <!--Precio-->
                <div class="form-group row">
                    <label for="productPrice" class="col-md-4 col-form-label text-md-right" style="padding: 1%">{{ __('Precio') }}</label>

                    <div class="col-md-4">
                        <input type="text" class="form-control input-myform" id="productPrice" name="productPrice" value="{{$product->price}}" required>
                    </div>
                </div>
                <!--Stock-->
                <div class="form-group row">
                    <label for="productStock" class="col-md-4 col-form-label text-md-right" style="padding: 1%">{{ __('Stock') }}</label>

                    <div class="col-md-4">
                        <input type="text" class="form-control input-myform" id="productStock" name="productStock" value="{{$product->stock}}" required>
                    </div>
                </div>
                <!--Valoración-->
                <div class="form-group row">
                    <label for="productScore" class="col-md-4 col-form-label text-md-right" style="padding: 1%">{{ __('Valoración') }}</label>

                    <div class="col-md-4">
                        <input type="text" class="form-control input-myform" id="productScore" name="productScore" value="{{$product->score}}" required>
                    </div>
                </div>
                @if($product->class == 'Electrónica')
                <!--Modelo-->
                <div class="form-group row">
                    <label for="productModel" class="col-md-4 col-form-label text-md-right" style="padding: 1%">{{ __('Modelo') }}</label>
                    <div class="col-md-4">
                        @if($product->model != null)
                        <input type="text" class="form-control input-myform" id="productModel" name="productModel" value="{{$product->model}}" required>
                        @else
                        <input type="text" class="form-control input-myform" id="productModel" name="productModel" placeholder="Añada los modelos" required>
                        @endif
                    </div>
                </div>
                @endif
                @if($product->class == 'Ropa')
                <!--Talla-->
                <div class="form-group row">
                    <label for="productSize" class="col-md-4 col-form-label text-md-right" style="padding: 1%; margin-top: 1%">{{ __('Talla') }}</label>
                    <div class="col-md-4">
                        @if($product->size != null)
                        <input type="text" class="form-control input-myform" id="productSize" name="productSize" value="{{$product->size}}" required>
                        @else 
                        <input type="text" class="form-control input-myform" id="productSize" name="productSize" placeholder="Añada la talla" required>
                        @endif
                    </div>
                </div>
                @endif
                @if($product->class == 'Manga y cómics')
                <!--Autor-->
                <div class="form-group row">
                    <label for="productAuthor" class="col-md-4 col-form-label text-md-right" style="padding: 1%; margin-top: 1%">{{ __('Descripción') }}</label>
                    <div class="col-md-4">
                        @if($product->autor != null)
                        <input type="text" class="form-control input-myform" id="productAuthor" name="productAuthor" value="{{$product->author}}" required>
                        @else
                        <input type="text" class="form-control input-myform" id="productAuthor" name="productAuthor" placeholder="Añada un autor" required>
                        @endif
                    </div>
                </div>
                @endif
                <!--Destacado-->
                <div class="form-group row">
                    <label for="productFeatured" class="col-md-4 col-form-label text-md-right" style="padding: 1%; margin-top: 1%">{{ __('Destacado') }}</label>

                    <div class="col-md-4">
                        <input type="text" class="form-control input-myform" id="productFeatured" name="productFeatured" value="{{$product->featured}}" required>
                    </div>
                </div>
                <!--ID-->
                <input type="hidden" id="productId" name="productId" value="{{$product->id}}" required>

                <br><br>

                    <div class="form-group row mb-0">
                        <div class="col-md-10">
                            <button type="submit" class="myform-button" style="text-transform: none">
                                {{ __('Guardar cambios') }}
                            </button>
                        </div>
                    </div>

            </form>
    </div>

</body>

