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

<button class="editProfileButton"><label><i class="fas fa-pencil-alt"></i> EDITAR PERFIL </label></button>
<article class="profile">
    <a id="border"><img id="userImg" src="{{asset('img/sheldon.jpg')}}"></a>
</article>
<article class="buttons">
    <li>
        <button class="profileButton"><i class="fas fa-shopping-basket"></i><label>MIS PEDIDOS </label></button>
        <button class="profileButton"><i class="far fa-comment-alt"></i><label>MENSAJES </label></button>
        <button class="profileButton"><i class="fas fa-heart"></i><label>FAVORITOS </label></button>
    </li>
</article>
<article class="userInfo">
    <h1 id="name">Sheldon Cooper</h1>
    <article id="personalData">
        <li><h1>Datos Personales</h1></li>
        <div id="info">
            <table>
                <tr>
                    <td><h1>Email:</h1></td>
                    <td><h2 id="data">diversionconbanderas@mail.com</h2></td>
                </tr>
                <tr>
                    <td><h1>Contacto:</h1></td>
                    <td><h2 id="data">+73 314159269</h2></td>
                </tr>
            </table>

        </div>
    </article>
    <article id="personalData">
        <li><h1>Direcciones</h1></li>
        <div id="direction">
            <table>
                <tr>
                    <td><i class="fas fa-home"></i></td>
                    <td><h2 id="data">South Madison Avenue, 215, 4ºA</h2></td>
                </tr>
            </table>
        </div>
    </article>
</article>
<!-- Footer -->
@include('general.footer')

</body>
</html>
