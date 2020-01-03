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
<section>
    <a href="newMessage"> <button class="newMessageButton"><label>Nuevo mensaje</label></button></a>
</section>
    <article class="messagesList">
                {{\App\Http\Controllers\MessagesController::getMessages()}}

    </article>
    <!-- Footer -->
    @include('general.footer')
</body>
</html>
