<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error-code {
            font-size: 8rem;
            font-weight: 900;
            line-height: 1;
            color: #dee2e6;
            letter-spacing: -4px;
        }
        .plug-anim {
            animation: float 3s ease-in-out infinite;
            font-size: 4rem;
            display: inline-block;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}"><span class="text-warning">⚡ Electro</span>Hub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link" href="{{ url('/search') }}">Search</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login / Register</a></li>
                <li class="nav-item mt-2 mt-lg-0"><a class="btn btn-warning btn-sm ms-lg-3 fw-bold" href="{{ url('/cart') }}">🛒 Cart (0)</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-auto py-5 text-center">
    <div class="plug-anim mb-3">🔌</div>
    <div class="error-code mb-2">404</div>
    <h1 class="fw-bold mb-2">Page Not Found</h1>
    <p class="text-muted mb-4 lead">Looks like this page got unplugged. Let's get you back on track.</p>

    <div class="d-flex gap-3 justify-content-center flex-wrap mb-5">
        <a href="{{ url('/') }}" class="btn btn-dark btn-lg px-4">🏠 Go Home</a>
        <a href="{{ url('/search') }}" class="btn btn-outline-dark btn-lg px-4">🔍 Search Products</a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h5 class="fw-bold mb-3">Popular Categories</h5>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ url('/products') }}" class="btn btn-light border shadow-sm">💻 Laptops</a>
                <a href="{{ url('/products') }}" class="btn btn-light border shadow-sm">🖱️ Accessories</a>
                <a href="{{ url('/products') }}" class="btn btn-light border shadow-sm">🖥️ Monitors</a>
                <a href="{{ url('/products') }}" class="btn btn-light border shadow-sm">🎮 Gaming</a>
            </div>
        </div>
    </div>
</main>

<footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container">
        <p class="mb-2">About Us | Contact</p>
        <p class="mb-0 text-muted small">&copy; 2026 ElectroHub</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
