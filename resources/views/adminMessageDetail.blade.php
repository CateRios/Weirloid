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
<?php
$title = $item->title;
$content = $item->content;
$id = $item->id;

?>
<article class="messagesList">
    <section id="message">
        <article onclick="">
            <h1>Asunto: <?=$title?></h1>
        </article>
    </section>
    <br>
    <section id="messageContent">
        <p>
            Mensaje:
            <?=$content?>
        </p>
    </section>
    <br>
    <section id="messageAnswer" >
        <p>
            <form action='answer' method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            Respuesta:
            <br>
            <input type="hidden" value="<?=$id?>" name="id">
            <textarea name="message" cols="200" rows="6" required></textarea>
            <input type="submit" value="Enviar" class="newMessageButton">
            </form>
        </p>
    </section>
</article>
<!-- Footer -->
@include('general.footer')
</body>
</html>
