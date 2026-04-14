<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}"><span class="text-warning">⚡ Electro</span>Hub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link{{ request()->is('search') ? ' active' : '' }}" href="{{ url('/search') }}">Search</a></li>
                <li class="nav-item"><a class="nav-link{{ request()->is('products') ? ' active' : '' }}" href="{{ url('/products') }}">Categories</a></li>
                @auth
                    <li class="nav-item"><a class="nav-link{{ request()->is('account') ? ' active' : '' }}" href="{{ url('/account') }}">My Account</a></li>
                    <li class="nav-item mt-2 mt-lg-0">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm ms-lg-2">🚪 Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link{{ request()->is('login') || request()->is('register') ? ' active' : '' }}" href="{{ route('login') }}">Login / Register</a></li>
                @endauth
                <li class="nav-item mt-2 mt-lg-0"><a class="btn btn-warning btn-sm ms-lg-3 fw-bold" href="{{ url('/cart') }}">🛒 Cart (0)</a></li>
            </ul>
        </div>
    </div>
</nav>
