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
    <?php
    if($item->answer != null){
        $answer=$item->answer
    ?>
    <section id="messageContent">
        <p>
            Respuesta:
            <?=$answer?>
        </p>
    </section>
    <?php
    }
    ?>
</article>
<!-- Footer -->
@include('general.footer')
</body>
</html>
