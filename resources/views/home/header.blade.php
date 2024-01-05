<header class="header-abso">

    <img class="logo" src="assests/images/logosmalll.png" alt="logo">

    <nav>
        <ul class="nav_links">
            <li><a href="/services">Services</a></li>
            <li><a href="/about-us">About Us</a></li>
            <li><a href="/blog">Blog</a></li>

            @if (Route::has('login'))
                @auth
                    <li> <x-app-layout>

                        </x-app-layout> </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Sign Up </a></li>
                @endauth

        </ul>

    </nav>
    @endif
    <a class="cta" href="/contact"><button>Contact</button></a>

</header>
