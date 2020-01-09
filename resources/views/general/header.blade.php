<header class="header">

    @if(\Illuminate\Support\Facades\Auth::user()->email == 'admin')

        @include('general.adminTopNavBar')

    @else

        @include('general.topNavBar')

    @endif

    <script>activeLink()</script>

</header>

