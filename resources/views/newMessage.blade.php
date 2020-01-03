<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}"/>

    <!-- Scripts -->
    @include('general.scripts')
</head>
<body>

<!-- Header -->
@include("general.header")
<article class="messagesList">

    <form method="post" action='createMessage' enctype="multipart/form-data">
        {{ csrf_field() }}
        <section id="message">
            <input type="text" name="title" placeholder="Asunto">
        </section>
        <br>
        <section id="messageContent">
            <input type="text" name="message" placeholder="Mensaje">
        </section>
        <input type="submit" value="Enviar" class="newMessageButton">
    </form>
</article>
<!-- Footer -->
@include('general.footer')
</body>
</html>
