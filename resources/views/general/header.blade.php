<header class="header">

    @if(Auth::check() && Auth::user()->email == 'admin')

        @include('general.adminTopNavBar')

    @else

        @include('general.topNavBar')

    @endif

    <script>activeLink()</script>

</header>

