<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}"><span class="text-warning">⚡ Electro</span>Hub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link{{ request()->routeIs('search') ? ' active' : '' }}" href="{{ route('search') }}">Search</a></li>
                <li class="nav-item"><a class="nav-link{{ request()->routeIs('products.*') ? ' active' : '' }}" href="{{ route('products.index') }}">Categories</a></li>
                @auth
                    <li class="nav-item"><a class="nav-link{{ request()->routeIs('account.index') ? ' active' : '' }}" href="{{ route('account.index') }}">My Account</a></li>
                    <li class="nav-item mt-2 mt-lg-0">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm ms-lg-2">🚪 Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link{{ request()->routeIs('login') || request()->routeIs('register') ? ' active' : '' }}" href="{{ route('login') }}">Login / Register</a></li>
                @endauth
                <li class="nav-item mt-2 mt-lg-0">
                    <a class="btn btn-warning btn-sm ms-lg-3 fw-bold" href="{{ route('cart.index') }}">
                        🛒 Cart ({{ app(\App\Services\CartService::class)->count() }})
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
