<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}"><span class="text-warning">⚡ Electro</span>Hub</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link" href="{{ url('/search') }}">Search</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Categories</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item mt-2 mt-lg-0"><a class="btn btn-warning btn-sm ms-lg-3 fw-bold" href="{{ url('/cart') }}">🛒 Cart (0)</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-auto py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="text-center mb-4">
                <h1 class="fw-bold">Login</h1>
                <p class="text-muted">Access your ElectroHub account</p>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold small">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="you@email.com" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold small">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 fw-bold py-2">Login</button>
                    </form>
                    <div class="text-center mt-4">
                        <p class="mb-0 small">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container">
        <p class="mb-0 text-muted small">&copy; 2026 ElectroHub</p>
    </div>
</footer>
</body>
</html>
