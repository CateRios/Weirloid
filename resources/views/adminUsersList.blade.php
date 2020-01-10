<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/adminUsersList.css') }}" />

    <!-- Scripts -->
    @include('general.scripts')

</head>

<body>

<!-- Header -->
 @include('general.header')

@if((session()->exists('error_code')))
    <script>document.getElementById('cliente').click();</script>
    <?php session()->forget('error_code');?>
@endif

<!-- Users List -->
<div class="container">

    <div class="row">

        <div class="col align-self-center">

            <div class="container-fluid">

                {{\App\Http\Controllers\AdminUsersList_Controller::getAllUsers()}}

            </div>

        </div>

    </div>

</div>

<!-- Footer -->
 @include('general.footer')

</body>
</html>
