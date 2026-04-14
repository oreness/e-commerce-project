<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroHub - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}"><span class="text-warning">⚡ Electro</span>Hub</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link" href="{{ url('/search') }}">Search</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Categories</a></li>

                {{-- CAMBIO AQUÍ: Lógica de autenticación --}}
                @guest
                    {{-- Si el usuario NO está logueado --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endguest

                @auth
                    {{-- Si el usuario YA está logueado --}}
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/account') }}">My Account</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-white border-0" style="text-decoration: none; padding: 0 1rem;">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth

                <li class="nav-item mt-2 mt-lg-0">
                    <a class="btn btn-warning btn-sm ms-lg-3 fw-bold" href="{{ url('/cart') }}">🛒 Cart (0)</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <section class="p-5 text-center bg-white border-bottom">
        <div class="container py-5">
            <h1 class="display-4 fw-bold">Spring Tech Sale! 🌸</h1>
            <p class="lead text-muted">Up to 40% off on premium laptops and accessories.</p>
            <a href="{{ url('/products') }}" class="btn btn-dark btn-lg mt-3">Shop Now</a>
        </div>
    </section>

    <section class="container my-5">
        <h2 class="h3 mb-4 text-center">Shop by Category</h2>
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <a href="{{ url('/products') }}" class="text-decoration-none text-dark">
                    <div class="p-4 bg-white shadow-sm rounded border"><h5>💻 Laptops</h5></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ url('/products') }}" class="text-decoration-none text-dark">
                    <div class="p-4 bg-white shadow-sm rounded border"><h5>🖱️ Accessories</h5></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ url('/products') }}" class="text-decoration-none text-dark">
                    <div class="p-4 bg-white shadow-sm rounded border"><h5>🖥️ Monitors</h5></div>
                </a>
            </div>
        </div>
    </section>
</main>

<footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container">
        <p class="mb-2">About Us | <a href="{{ url('/contact') }}" class="text-white text-decoration-none">Contact</a></p>
        <p class="mb-0 text-muted small">&copy; 2026 ElectroHub</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
