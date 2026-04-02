<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <li class="nav-item mt-2 mt-lg-0"><a class="btn btn-warning btn-sm ms-lg-3 fw-bold" href="{{ url('/cart') }}">🛒 Cart (2)</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-5">
    <div class="mb-4">
        <h1 class="fw-bold">Your Shopping Cart</h1>
        <p class="text-muted">Review your selected items before proceeding to checkout.</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <h4 class="mb-3">Items in Cart</h4>

            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body">
                    <div class="row align-items-center g-3">
                        <div class="col-auto">
                            <img src="https://placehold.co/80x80/e9ecef/495057?text=Img" alt="Product 1" class="rounded">
                        </div>
                        <div class="col">
                            <h5 class="mb-0 fw-bold">Pro Gaming Mouse</h5>
                            <p class="text-muted small mb-0">Ergonomic RGB mouse</p>
                        </div>
                        <div class="col-auto">
                            <div class="input-group input-group-sm" style="width: 120px;">
                                <button class="btn btn-outline-secondary" type="button">-</button>
                                <input type="number" class="form-control text-center" value="1" min="1">
                                <button class="btn btn-outline-secondary" type="button">+</button>
                            </div>
                        </div>
                        <div class="col-auto text-end" style="width: 90px;">
                            <span class="fw-bold fs-5">€15.00</span>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-sm btn-outline-danger" title="Remove item">
                                🗑️
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body">
                    <div class="row align-items-center g-3">
                        <div class="col-auto">
                            <img src="https://placehold.co/80x80/e9ecef/495057?text=Img" alt="Product 2" class="rounded">
                        </div>
                        <div class="col">
                            <h5 class="mb-0 fw-bold">Mechanical Keyboard</h5>
                            <p class="text-muted small mb-0">Blue switches, TKL</p>
                        </div>
                        <div class="col-auto">
                            <div class="input-group input-group-sm" style="width: 120px;">
                                <button class="btn btn-outline-secondary" type="button">-</button>
                                <input type="number" class="form-control text-center" value="1" min="1">
                                <button class="btn btn-outline-secondary" type="button">+</button>
                            </div>
                        </div>
                        <div class="col-auto text-end" style="width: 90px;">
                            <span class="fw-bold fs-5">€20.00</span>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-sm btn-outline-danger" title="Remove item">
                                🗑️
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 bg-white">
                <div class="card-body p-4">
                    <h4 class="mb-4">Order Summary</h4>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal</span>
                        <span class="fw-bold">€35.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Shipping</span>
                        <span class="text-muted">Calculated at checkout</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold fs-5">Total Price</span>
                        <span class="fw-bold fs-5 text-primary">€35.00</span>
                    </div>
                    <a href="{{ url('/checkout') }}" class="btn btn-dark w-100 py-2 fw-bold">Proceed to Checkout</a>
                </div>
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
