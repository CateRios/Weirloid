<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Weirloid</title>
    <link rel="stylesheet" href="stylesheet.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 320,
            step: 5,
            values: [20, 300],
            slide: function( event, ui ) {
            var delay = function() {
                var handleIndex = $(ui.handle).index();
                var label = handleIndex == 1 ? '#min' : '#max';
                $(label).html(ui.value + '€').position({
                    my: 'center top',
                    at: 'center bottom',
                    of: ui.handle,
                    offset: "0, 0"
                    });
                };
                    
                    // wait for the ui.handle to set its position
                    setTimeout(delay, 5);
            }
            });

        $('#min').html($('#slider-range').slider('values', 0) + '€').position({
            my: 'center top',
            at: 'center bottom',
            of: $('#slider-range span:eq(0)'),
            offset: "0, 10"
        });

        $('#max').html($('#slider-range').slider('values', 1) + '€').position({
            my: 'center top',
            at: 'center bottom',
            of: $('#slider-range span:eq(1)'),
            offset: "0, 10"
        });

        });
  </script>
</head>

<header>
    <nav class='catalog-nav-bar'>
        <ul>
            <?php //mantener link como acivo -> jquery?>
            <li><a href='' class='pops'>Figuras y Pop's</a></li>
            <li><a href='' class='manga'>Manga y cómics</a></li>
            <li><a a href='' class='electronics'>Electrónica</a></li>
            <li><a a href='' class='clothes'>Ropa</a></li>
        </ul>

        <ul>
            <li><a>Ofertas</a></li>
            <li><a>Top Ventas</a></li>
        </ul>

        <form>
            <input type='search' name='search' value='  Escribe aquí...'>
        </form>


        <?php //el carrito de las narices ?>
    </nav>

    
</header>

<body class='content'>

    <aside class='filters'>
        <div id='title'><h4>Filtrar por</h4></div>

        <form>
         <section>   
            <p>Tipo</p>
            <label class='radio'>Pops<input type="radio" name="type" value="pop"><span class="checkmark"></span></label><br>
            <label class='radio'>Figuras<input type="radio" name="type" value="figure"><span class="checkmark"></span></label><br>
            <label class='radio'>Amiibo<input type="radio" name="type" value="amiibo"><span class="checkmark"></span></label><br>
        </section>

        <section>
            <p>Categoría</p>
            <label class='radio'>Disney<input type="radio" name="category" value="disney"><span class="checkmark"></span></label><br>
            <label class='radio'>Marvel<input type="radio" name="category" value="marvel"><span class="checkmark"></span></label><br>
            <label class='radio'>DC cómics<input type="radio" name="category" value="dc"><span class="checkmark"></span></label><br>
            <label class='radio'>Anime y manga<input type="radio" name="category" value="anime"><span class="checkmark"></span></label><br>
            <label class='radio'>Series y películas<input type="radio" name="category" value="series"><span class="checkmark"></span></label><br>
        </section>

        <section>
        <p>Precio</p>
        <div id="slider-range"></div>
        <div id="min"></div>
        <div id="max"></div>
        </section>

        <section>
            <p>Valoración</p>
            <label class='radio'>1 estrella o más<input type="radio" name="assets" value="1"><span class="checkmark"></span></label><br>
            <label class='radio'>2 estrellas o más<input type="radio" name="assets" value="2"><span class="checkmark"></span></label><br>
            <label class='radio'>3 estrellas o más<input type="radio" name="assets" value="3"><span class="checkmark"></span></label><br>
            <label class='radio'>4 estrellas o más<input type="radio" name="assets" value="4"><span class="checkmark"></span></label><br>
            <label class='radio'>5 estrellas<input type="radio" name="assets" value="5"><span class="checkmark"></span></label><br>
        </section>
    </form>

    </aside>

</body>
