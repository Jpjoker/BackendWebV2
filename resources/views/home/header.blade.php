<header class="header-abso">

    <img class="logo" href="{{ url('/homepage') }}" src="assests/images/logosmalll.png" alt="logo">

    <nav>
        <ul class="nav_links">
            <li><a href="{{ url('/homepage') }}">Home</a></li>
            <li><a href="{{ url('/services') }}">Services</a></li>
            <li><a href="{{ url('/aboutUs') }}">About Us</a></li>
            <li><a href="{{ url('/blogpage') }}">Blog</a></li>
            <li><a href="{{ route('faq') }}">FAQ</a></li>

            @if (Route::has('login'))
                @auth
                    <li> <x-app-layout>

                        </x-app-layout> </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Sign Up </a></li>
                @endauth

        </ul>
        @endif
    </nav>

    <a class="cta" href="{{ url('/contactpage') }}"><button>Contact</button></a>

</header>
