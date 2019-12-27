<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}"/>

</head>

<body>

<!-- Header -->
@include("general.header")
<article class="profile">
    <a id="border"><img id="userImg" src="{{asset('img/sheldon.jpg')}}"></a>
</article>
<form name="post">
<article class="userInfo">
    <input id= name type="text" value="Sheldon Cooper">
    <article id="personalData">
        <li><h1>Datos Personales</h1></li>

        <div id="info">
            <table>
                <tr>
                    <td><h1>Email:</h1></td>
                    <td><input id="data" type="text" value="diversionconbanderas@mail.com"></td>
                </tr>
                <tr>
                    <td><h1>Contacto:</h1></td>
                    <td><input id="data" type="text" value="+73 314159269"></td>
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
                    <td><input id="data" type="text" value="South Madison Avenue, 215, 4ºA"></td>
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
