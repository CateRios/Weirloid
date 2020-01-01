<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />

    <!-- Scripts -->
    @include('general.scripts')

</head>

<body>

<!-- Header -->
 @include('general.header')


<div class="container" style="margin: 6.2% auto">
    <div class="row justify-content-center">

        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Contacta con nosotros') }}</div>

                <div class="card-body">

                    <!-- Mensaje alerta -->
                    @if ($message = session()->get('contact_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! $message !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php session()->forget('contact_success');?>
                    @endif
                    @if ($message = session()->get('contact_error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {!! $message !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php session()->forget('contact_error');?>
                @endif

                <!-- Formulario -->
                    <form method="POST" action="contact/email">
                        @csrf

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group row" style="margin-top: 14%">
                                    <label for="email" class="col-md-4 col-form-label text-md-right" style="padding: 1%; margin-top: 1%">{{ __('Nombre completo') }}</label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control input-myform" id="name" name="name" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right" style="padding: 1%; margin-top: 1%">{{ __('Email') }}</label>

                                    <div class="col-md-8">
                                        <input type="email" class="form-control input-myform" id="email" name="email" placeholder="name@example.com" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" required>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <label for="description" class="col-md-4 col-form-label text-md-left" style="padding: 0; margin: 1% 0; ">{{ __('Contenido') }}</label>

                                <textarea class="form-control input-myform" id="description" name="description"  cols="200" rows="6" required></textarea>

                            </div>

                        </div>

                        <br><br>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-5">
                                <button type="submit" class="myform-button" style="text-transform: none">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
 @include('general.footer')

</body>
</html>
