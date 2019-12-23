<!-- The Modal -->
<div class="modal signModal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <br>
                <img class="signModal-img" src="{{asset('img/logo.png')}}">
                <br><br>

                <!-- Mensaje alerta -->
                @if ($message = session()->get('sign_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {!! $message !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php session()->forget('sign_success');?>
                @endif
                @if ($message = session()->get('sign_error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {!! $message !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php session()->forget('sign_error');?>
                @endif

                <!-- Formulario -->
                <form class="signForm" name="signForm" action="#" method="POST">
                    @csrf

                    <!-- Sign In / Sign Up options -->
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" style="margin-bottom: 0.75%">
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option1" autocomplete="off" value="0" checked> Público
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" id="option2" autocomplete="off" value="1"> Privado
                        </label>
                    </div>

                    <br><br>

                    <!-- Email y contraseña -->
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" required>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" minlength="8" maxlength="15" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$+" required>
                    <br>
                    <button type="submit">Enviar</button>

                </form>

            </div>

        </div>
    </div>
</div>
