<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="{{asset('js/header.js')}}"></script>

<script>

    function signFormSend() {
        var action = $("input[name=options]:checked").val()

        if(action == 0) {
            $('#signForm').attr('action', 'login');
        } else {
            $('#signForm').attr('action', 'register');
        }

        document.signForm.submit();
    }

</script>

<script>
        $( function() {
            $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 300,
            step: 5,
            values: [0, 300],
            slide: function( event, ui ) {
                $("#minPrice").val(ui.values[ 0 ]);
                $("#maxPrice").val(ui.values[ 1 ]);

            var delay = function() {
                var handleIndex = $(ui.handle).index();
                var label = handleIndex == 1 ? "#min" : "#max";
                $(label).html(ui.value + "€").position({
                    my: "center top",
                    at: "center bottom",
                    of: ui.handle,
                    offset: "0, 0"
                    });
                };

                    // wait for the ui.handle to set its position
                    setTimeout(delay, 500);
            }
            });

        $("#min").html($("#slider-range").slider("values", 0) + "€").position({
            my: "center top",
            at: "center bottom",
            of: $("#slider-range span:eq(0)"),
            offset: "0, 10"
        });

        $("#max").html($("#slider-range").slider("values", 1) + "€").position({
            my: "center top",
            at: "center bottom",
            of: $("#slider-range span:eq(1)"),
            offset: "0, 10"
        });

        });
  </script>

