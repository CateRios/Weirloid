<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weirloid</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}"/>
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
//Conectar con la db
/*$host = "localhost";
$database = "weirloid";
$user = "root";
$pass = "";

$connection = mysqli_connect($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
    die(mysqli_connect_error()); //die=exit
}*/
?>
<!-- Header -->
@include("general.header")
<article class="ordersList">
    <section id="order">
        <article onclick="">
            <img id="imageList" src="{{asset('img/featured_product.jpg')}}" >
            <h1>Nº orden</h1>
            <h1>Estado</h1>
        </article>
    </section>
    <section class="paginacion">
        <ul>
            <?php
            /*$sql ="SELECT * FROM ";
            $result = mysqli_query($connection, $sql);

            $total_registros= mysqli_num_rows($result);
            $total_paginas= ceil($total_registros/$por_pagina);*/
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
