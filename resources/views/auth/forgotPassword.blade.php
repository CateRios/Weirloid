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

<div class="container" style="margin-top: 10%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset contraseña') }}</div>

                <div class="card-body">

                    <!-- Mensaje alerta -->
                    @if ($message = session()->get('forgotPassword_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! $message !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php session()->forget('forgotPassword_success');?>
                    @endif
                    @if ($message = session()->get('forgotPassword_error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {!! $message !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php session()->forget('forgotPassword_error');?>
                    @endif

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="margin-top: 1%">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control input-myform" id="email" name="email" placeholder="name@example.com" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="myform-button" style="text-transform: none">
                                    {{ __('Enviar email de recuperación') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
