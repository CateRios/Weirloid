<header class="header">

    <nav class="navbar navbar-expand-md mynavbar">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav">
            <span class="navbar-toggler-icon toggler-icon">
                <i class="fas fa-bars"></i>
            </span>
        </button>

        <div class="navbar-collapse collapse dual-nav order-2 order-md-1 justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item cel">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item cel">
                    <a class="nav-link" href="#">Catálogo</a>
                </li>
                <li class="nav-item cel">
                    <a class="nav-link" href="#">Servicios</a>
                </li>
            </ul>
        </div>

        <a href="#" class="navbar-brand mx-auto order-0 order-md-2 p-2">
            <img class="header-logo header-nav" src="{{asset('img/logo_complete.png')}}" alt="Logo Weirloid">
        </a>

        <div class="navbar-collapse collapse dual-nav order-3 order-md-3">
            <ul class="navbar-nav">
                <li class="nav-item cel">
                    <a class="nav-link header-nav" href="#">Sobre nosotros</a>
                </li>
                <li class="nav-item cel">
                    <a class="nav-link header-nav" href="#">Contacto</a>
                </li>

                @if(Auth::check())

                    <li class='nav-item cel' style="position: absolute; right: 4%">

                         {{\App\Http\Controllers\Index_controller::getProfile()}}

                    </li>

                @else

                    <li class='nav-item cel'>

                        <a class='nav-link header-nav' id="cliente" data-toggle='modal' data-target='#signModal'>¿Cliente?</a>

                        <!-- Sign In/Up Modal -->
                        @include('partials.signModal')

                    </li>

                @endif

            </ul>
        </div>

    </nav>

</header>

