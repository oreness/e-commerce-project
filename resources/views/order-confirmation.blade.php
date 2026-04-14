<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .checkmark-circle {
            width: 80px; height: 80px;
            background: #198754;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 1rem;
            animation: pop 0.4s cubic-bezier(.36,2,.55,.88);
        }
        @keyframes pop {
            0% { transform: scale(0); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

@include('partials.navbar')

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
            <div class="checkmark-circle text-white">✓</div>
            <h1 class="fw-bold mb-2">Order Confirmed!</h1>
            <p class="text-muted mb-4">Thank you for your purchase. Your order has been placed and is being processed.</p>

            <div class="card shadow-sm border-0 mb-4 text-start">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0">Order #EH-20260323-8472</h5>
                        <span class="badge bg-success">Confirmed</span>
                    </div>
                    <p class="text-muted small mb-3">Placed on March 23, 2026 · Estimated delivery: March 27–29, 2026</p>
                    <hr>

                    <div class="d-flex align-items-center mb-3">
                        <img src="https://placehold.co/60x60/e9ecef/495057?text=Img" class="rounded me-3" alt="Mouse">
                        <div class="flex-grow-1">
                            <strong>Pro Gaming Mouse</strong>
                            <div class="text-muted small">Qty: 1</div>
                        </div>
                        <span class="fw-bold">€15.00</span>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <img src="https://placehold.co/60x60/e9ecef/495057?text=Img" class="rounded me-3" alt="Keyboard">
                        <div class="flex-grow-1">
                            <strong>Mechanical Keyboard</strong>
                            <div class="text-muted small">Qty: 1</div>
                        </div>
                        <span class="fw-bold">€20.00</span>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between mb-1">
                        <span>Subtotal</span><span>€35.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span>Shipping</span><span class="text-success">Free</span>
                    </div>
                    <div class="d-flex justify-content-between fw-bold fs-5 mt-2">
                        <span>Total</span><span class="text-primary">€35.00</span>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4 text-start">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Delivery Information</h6>
                    <div class="row text-muted small">
                        <div class="col-sm-6 mb-2">
                            <strong class="text-dark">Ship to</strong><br>
                            John Doe<br>
                            Hlavná 1, Bratislava 811 01<br>
                            Slovakia
                        </div>
                        <div class="col-sm-6 mb-2">
                            <strong class="text-dark">Payment</strong><br>
                            Visa •••• 4242<br><br>
                            <strong class="text-dark">Shipping</strong><br>
                            Standard (3–5 business days)
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-3 justify-content-center">
                <a href="{{ url('/orders') }}" class="btn btn-dark px-4">View My Orders</a>
                <a href="{{ url('/') }}" class="btn btn-outline-dark px-4">Continue Shopping</a>
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
