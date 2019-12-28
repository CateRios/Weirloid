<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}"/>

</head>
<body>

<!-- Header -->
@include("general.header")
<article class="messagesList">
    <section id="message">
        <article onclick="">
            <h1>Remitente mensaje</h1>
            <h2>Asunto mensaje</h2>
        </article>
    </section>
    <br>
    <section id="messageContent">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore
            magna
            enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat.
            Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum.
        </p>
    </section>
</article>
<!-- Footer -->
@include('general.footer')
</body>
</html>
