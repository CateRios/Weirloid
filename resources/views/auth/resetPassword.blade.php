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

    <script>
        function sleep(milliseconds) {
            var start = new Date().getTime();
            for (var i = 0; i < 1e7; i++) {
                if ((new Date().getTime() - start) > milliseconds){
                    break;
                }
            }
        }
    </script>

</head>

<body>

<div class="container" style="margin-top: 10%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset contraseña') }}</div>

                <div class="card-body">

                    <!-- Mensaje alerta -->
                    @if ($message = session()->get('resetPassword_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! $message !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if ($message = session()->get('resetPassword_error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {!! $message !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php session()->forget('resetPassword_error');?>
                    @endif

                    <!-- Formulario -->
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" id="token" name="token" value="{{$token}}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="margin-top: 1%">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control input-myform" id="email" name="email" value="{{$email}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="margin-top: 1%">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control input-myform" id="password" name="password" minlength="8" maxlength="15" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$+" required>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="checkPassword" class="col-md-4 col-form-label text-md-right" style="margin-top: 1%">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control input-myform" id="password_confirmation" name="password_confirmation" minlength="8" maxlength="15" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$+" required>
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="myform-button @if(session()->exists('resetPassword_success')) disabled @endif" style="text-transform: none">
                                    {{ __('Confirmar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session()->exists('resetPassword_success'))
    <script>
        sleep(10000);
        window.location.href = "http://weirloid.test";
    </script>
    <?php session()->forget('resetPassword_success');?>
@endif

</body>
</html>
