<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-ui-polish-styles />
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<x-storefront-navbar />

<main class="container my-5">
    <div class="mb-4">
        <h1 class="fw-bold page-title">Your Shopping Cart</h1>
        <p class="text-muted">Review your selected items before proceeding to checkout.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show soft-enter" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(count($cart) > 0)
        <div class="row g-4">
            <div class="col-lg-8">
                <h4 class="mb-3">Items in Cart</h4>

                @foreach($cart as $id => $details)
                    <div class="card shadow-sm border-0 mb-3">
                        <div class="card-body">
                            <div class="row align-items-center g-3">
                                <div class="col-auto">
                                    <img src="{{ $details['image'] ?? 'https://placehold.co/80x80?text=No+Image' }}" alt="{{ $details['name'] }}" class="rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                </div>
                                <div class="col">
                                    <h5 class="mb-0 fw-bold">{{ $details['name'] }}</h5>
                                    <p class="text-muted small mb-0">Unit Price: €{{ number_format($details['price'], 2) }}</p>
                                </div>
                                <div class="col-auto">
                                    <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center gap-2">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control form-control-sm" style="width: 90px;">
                                        <button type="submit" class="btn btn-sm btn-outline-dark">Update</button>
                                    </form>
                                </div>
                                <div class="col-auto text-end" style="width: 110px;">
                                    <span class="fw-bold fs-5">€{{ number_format($details['price'] * $details['quantity'], 2) }}</span>
                                </div>
                                <div class="col-auto">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Remove item">🗑️</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 bg-white">
                    <div class="card-body p-4">
                        <h4 class="mb-4">Order Summary</h4>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Subtotal</span>
                            <span class="fw-bold">€{{ number_format($total, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Shipping</span>
                            <span class="text-success fw-bold">FREE</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold fs-5">Total Price</span>
                            <span class="fw-bold fs-5 text-primary">€{{ number_format($total, 2) }}</span>
                        </div>
                        <a href="{{ url('/checkout') }}" class="btn btn-dark w-100 py-2 fw-bold">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5 shadow-sm bg-white rounded">
            <h3>Your cart is empty 🛒</h3>
            <p class="text-muted">Looks like you haven't added anything yet.</p>
            <a href="{{ url('/products') }}" class="btn btn-warning fw-bold">Browse Products</a>
        </div>
    @endif
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
