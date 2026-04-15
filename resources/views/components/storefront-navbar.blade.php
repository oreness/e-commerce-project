<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}"><span class="text-warning">⚡ Electro</span>Hub</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#storefrontNavbar" aria-controls="storefrontNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="storefrontNavbar">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('search') ? 'active' : '' }}" href="{{ route('search') }}">Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}" href="{{ route('products.index') }}">Categories</a>
                </li>

                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('account.index') ? 'active' : '' }}" href="{{ route('account.index') }}">My Account</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-white border-0" style="text-decoration:none;">Logout</button>
                        </form>
                    </li>
                @endguest

                <li class="nav-item mt-2 mt-lg-0">
                    <a class="btn btn-warning btn-sm ms-lg-3 fw-bold" href="{{ route('cart.index') }}">🛒 Cart ({{ $cartCount ?? 0 }})</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
