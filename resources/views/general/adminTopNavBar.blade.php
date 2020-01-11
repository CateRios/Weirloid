<nav class="navbar navbar-expand-md mynavbar">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav">
            <span class="navbar-toggler-icon toggler-icon">
                <i class="fas fa-bars"></i>
            </span>
    </button>

    <div class="navbar-collapse collapse dual-nav order-2 order-md-1 justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item cel">
                <a class="nav-link" id="headerLink1" href="admin">Home</a>
            </li>
            <li class="nav-item cel">
                <a class="nav-link" id="headerLink2" href="adminUsersList">Usuarios</a>
            </li>
            <li class="nav-item cel">
                <a class="nav-link" id="headerLink3" href="productList">Productos</a>
            </li>
        </ul>
    </div>

    <a href="#" class="navbar-brand mx-auto order-0 order-md-2 p-2">
        <img class="header-logo header-nav" src="{{asset('img/logo_complete.png')}}" alt="Logo Weirloid">
    </a>

    <div class="navbar-collapse collapse dual-nav order-3 order-md-3">
        <ul class="navbar-nav">
            <li class="nav-item cel">
                <a class="nav-link header-nav" id="headerLink4" href="adminOrdersList">Órdenes</a>
            </li>
            <li class="nav-item cel">
                <a class="nav-link header-nav" id="headerLink5" href="adminMessagesList">Mensajes</a>
                {{\App\Http\Controllers\AdminMessagesController::getNumberNoAnswer()}}
            </li>
            <li class='nav-item cel' style="position: absolute; margin-top: 0.7%;right: 4%">

                <a class="user_shortName" id='name' href="logout">{{Auth::user()->name}}</a>

            </li>

        </ul>
    </div>

</nav>
