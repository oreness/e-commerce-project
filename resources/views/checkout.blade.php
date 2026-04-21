<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-ui-polish-styles />
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<x-storefront-navbar />

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="text-center fw-bold mb-4 page-title">Checkout</h2>

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show soft-enter" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger soft-enter" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="d-flex justify-content-center gap-2 mb-4 flex-wrap soft-enter">
                <span class="badge text-bg-dark p-2">1. Delivery</span>
                <span class="badge text-bg-secondary p-2">2. Shipping</span>
                <span class="badge text-bg-secondary p-2">3. Payment</span>
                <span class="badge text-bg-secondary p-2">4. Confirm</span>
            </div>

            <div class="card shadow-sm border-0 mb-4 p-4">
                <h3 class="fw-bold text-center mb-4">Delivery, Shipping & Payment</h3>
                <form method="POST" action="{{ route('checkout.store') }}">
                    @csrf
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Full Name</label>
                            <input type="text" name="shipping_name" class="form-control bg-light" value="{{ old('shipping_name', auth()->user()->name ?? '') }}" placeholder="Enter full name" required>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label small fw-bold">Address</label>
                            <input type="text" name="shipping_address" class="form-control bg-light" value="{{ old('shipping_address') }}" placeholder="Enter street and number" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-bold">City</label>
                            <input type="text" name="shipping_city" class="form-control bg-light" value="{{ old('shipping_city') }}" placeholder="Enter city" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Shipping Method</label>
                            <select name="shipping_method" class="form-select bg-light" required>
                                <option value="">Choose shipping</option>
                                <option value="standard" {{ old('shipping_method') === 'standard' ? 'selected' : '' }}>Standard</option>
                                <option value="express" {{ old('shipping_method') === 'express' ? 'selected' : '' }}>Express</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Payment Method</label>
                            <select name="payment_method" class="form-select bg-light" required>
                                <option value="">Choose payment</option>
                                <option value="card" {{ old('payment_method') === 'card' ? 'selected' : '' }}>Card</option>
                                <option value="paypal" {{ old('payment_method') === 'paypal' ? 'selected' : '' }}>PayPal</option>
                                <option value="cash_on_delivery" {{ old('payment_method') === 'cash_on_delivery' ? 'selected' : '' }}>Cash on Delivery</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <span class="text-muted">Order total: <strong>€{{ number_format($total ?? 0, 2) }}</strong></span>
                        <button type="submit" class="btn btn-dark px-5">Place Order</button>
                    </div>
                </form>
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
