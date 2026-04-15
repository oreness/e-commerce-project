<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<x-storefront-navbar />

<main class="container my-5">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 text-center">
                    <div class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width:60px;height:60px;font-size:1.5rem;">👤</div>
                    <h6 class="fw-bold mb-0">John Doe</h6>
                    <p class="text-muted small">john@example.com</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{ url('/account') }}" class="text-decoration-none text-dark">👤 My Account</a></li>
                    <li class="list-group-item bg-light"><a href="{{ url('/orders') }}" class="text-decoration-none fw-bold text-dark">📦 My Orders</a></li>
                    <li class="list-group-item"><a href="{{ url('/wishlist') }}" class="text-decoration-none text-dark">♡ Wishlist</a></li>
                    <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">📍 Addresses</a></li>
                    <li class="list-group-item"><a href="{{ url('/login') }}" class="text-decoration-none text-danger">🚪 Log Out</a></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-9">
            <h2 class="fw-bold mb-4">My Orders</h2>

            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                        <div>
                            <h6 class="fw-bold mb-0">Order #EH-20260323-8472</h6>
                            <p class="text-muted small mb-0">Placed: March 23, 2026</p>
                        </div>
                        <span class="badge bg-success fs-6 px-3 py-2">Confirmed</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <img src="https://placehold.co/50x50/e9ecef/495057?text=M" class="rounded me-2" alt="Mouse">
                        <span class="small">Pro Gaming Mouse × 1</span>
                        <span class="ms-auto small fw-bold">€15.00</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://placehold.co/50x50/e9ecef/495057?text=K" class="rounded me-2" alt="Keyboard">
                        <span class="small">Mechanical Keyboard × 1</span>
                        <span class="ms-auto small fw-bold">€20.00</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                        <span class="fw-bold">Total: €35.00</span>
                        <div class="d-flex gap-2">
                            <a href="{{ url('/order-confirmation') }}" class="btn btn-outline-dark btn-sm">View Details</a>
                            <button class="btn btn-dark btn-sm">Reorder</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                        <div>
                            <h6 class="fw-bold mb-0">Order #EH-20260210-7131</h6>
                            <p class="text-muted small mb-0">Placed: February 10, 2026</p>
                        </div>
                        <span class="badge bg-primary fs-6 px-3 py-2">Delivered</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://placehold.co/50x50/e9ecef/495057?text=L" class="rounded me-2" alt="Laptop">
                        <span class="small">Pro Gaming X Laptop × 1</span>
                        <span class="ms-auto small fw-bold">€1,299.00</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                        <span class="fw-bold">Total: €1,299.00</span>
                        <div class="d-flex gap-2">
                            <a href="{{ url('/order-confirmation') }}" class="btn btn-outline-dark btn-sm">View Details</a>
                            <button class="btn btn-outline-secondary btn-sm">Leave Review</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                        <div>
                            <h6 class="fw-bold mb-0">Order #EH-20260115-5502</h6>
                            <p class="text-muted small mb-0">Placed: January 15, 2026</p>
                        </div>
                        <span class="badge bg-secondary fs-6 px-3 py-2">Cancelled</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://placehold.co/50x50/e9ecef/495057?text=H" class="rounded me-2" alt="Headset">
                        <span class="small text-muted">Gaming Headset Pro × 1</span>
                        <span class="ms-auto small text-muted">€79.00</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                        <span class="text-muted">Total: €79.00</span>
                        <button class="btn btn-dark btn-sm">Reorder</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
