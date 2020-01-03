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
<?php
$por_pagina = 3;
if(isset($_GET['pagina'])){
    $pagina = $_GET['pagina'];
}else{
    $pagina = 1;
}
$empieza = ($pagina -1 ) * $por_pagina;
?>
    <!-- Header -->
    @include("general.header")
<section>
    <a href="newMessage"> <button class="newMessageButton"><label>Nuevo mensaje</label></button></a>
</section>
    <article class="messagesList">
        <section id="message">
            <article onclick="">
                <h1>Remitente mensaje</h1>
                <h2>Asunto mensaje</h2>
            </article>
        </section>
        <section class="paginacion">
            <ul>
                <?php
                $total_paginas=1;
                echo "<li><a href='messagesList?pagina=1'>".'Primera '."</a></li>";
                for($i=1;$i<=$total_paginas;$i++){
                    echo "<li><a href='messagesList?pagina=".$i."'>".$i."</a></li>";
                }
                echo "<li><a href='messagesList?pagina=$total_paginas'>".'Última '."</a></li>";
                ?>
            </ul>
        </section>

    </article>
    <!-- Footer -->
    @include('general.footer')
</body>
</html>
