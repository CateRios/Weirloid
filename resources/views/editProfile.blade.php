<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}"/>

    <!-- Scripts -->
    @include('general.scripts')
</head>

<body>

<!-- Header -->
@include("general.header")

<form method="post" action='setProfile'>
    {{ csrf_field() }}
    <article class="profile">
        <a id="border">
            <input type="file" id="userImg" name="photo" value=""></a>
    </article>
    <article class="userInfo">
        <input id=name type="text" name="name" value="{{\App\Http\Controllers\ProfileController::getName()}}">
        <article id="personalData">
            <li><h1>Datos Personales</h1></li>

            <div id="info">
                <table>
                    <tr>
                        <td><h1>Email:</h1></td>
                        <td><input id="data" type="text" name="email"
                                   value="{{\App\Http\Controllers\ProfileController::getEmail()}}"></td>
                    </tr>
                    <tr>
                        <td><h1>Contacto:</h1></td>
                        <td><input id="data" type="text" name="phone"
                                   value="{{\App\Http\Controllers\ProfileController::getPhone()}}"></td>
                    </tr>
                </table>
            </div>
        </article>
        <input class="editButton" type="submit" value="TERMINAR">
        <article id="personalData">
            <li><h1>Direcciones</h1></li>
            <div id="direction">
                <table>
                    <tr>
                        <td><i class="fas fa-home"></i></td>
                        <td><input id="data" type="text" name="address"
                                   value="{{\App\Http\Controllers\ProfileController::getAddress()}}"></td>
                    </tr>
                </table>
            </div>
        </article>
    </article>

</form>
<!-- Footer -->
@include('general.footer')

</body>
</html>
