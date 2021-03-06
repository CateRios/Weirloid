<!-- The Modal -->
<div class="modal signModal" id="signModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <br>
                <img class="signModal-img" src="{{asset('img/logo.png')}}">
                <br><br>

                <!-- Mensaje alerta -->
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
                <form class="myform" name="signForm" id="signForm" action="#" method="POST">
                {{ csrf_field() }}

                    <!-- Sign In / Sign Up options -->
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-myform active">
                                <input type="radio" name="options" id="option1" autocomplete="off" value="0"  checked> INICIAR SESIÓN
                            </label>
                            <label class="btn btn-myform">
                                <input type="radio" name="options" id="option2" autocomplete="off" value="1"> REGÍSTRATE
                            </label>
                        </div>

                    <br><br>

                    <!-- Email y contraseña -->
                    <input type="email" class="form-control input-myform" id="email" name="email" placeholder="name@example.com" pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" required>
                    <input type="password" class="form-control input-myform" id="password" name="password" placeholder="Contraseña" minlength="8" maxlength="15" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$+" required>

                    <p class = "termsAndPolicies">Al crear una cuenta estás aceptando el <a href="#">Acepto los términos y condiciones de Weirloid.test</a> y <a href="#">Política de Privacidad</a></p>

                    <button class="myform-button" type="button" onclick="signFormSend()">Enviar</button>

                </form>

                <br>

                <!-- Link para recuperar contraseña -->
                <a class="forgotPassword" href="{{url('forgotPassword')}}">¿Has olvidado tu contraseña?</a>

                <br><br>

                <!-- Otros accesos rápidos -->
                <div class="otherAccess">
                    <p>Acceso rápido con:</p>

                    <div class="social-navbar">
                        <a class="google" style="pointer-events: none" href="{{ url('login/google') }}"><i class="fab fa-google"></i></a>
                        <a class="facebook" style="pointer-events: none" href="{{ url('login/facebook') }}"><i class="fab fa-facebook-square"></i></a>
                        <a class="instragram" style="pointer-events: none" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="twitter" style="pointer-events: none" href="{{ url('login/twitter') }}"><i class="fab fa-twitter"></i></a>
                        <a class="pinterest" style="pointer-events: none" href="#"><i class="fab fa-pinterest"></i></a>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
