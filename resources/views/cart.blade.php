<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

@include('partials.navbar')

<main class="container my-5">
    <div class="mb-4">
        <h1 class="fw-bold">Your Shopping Cart</h1>
        <p class="text-muted">Review your selected items before proceeding to checkout.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($items->isEmpty())
        <div class="text-center py-5">
            <p class="text-muted fs-5">Your cart is empty.</p>
            <a href="{{ route('products.index') }}" class="btn btn-dark px-5">Shop Now</a>
        </div>
    @else
    <div class="row g-4">
        <div class="col-lg-8">
            <h4 class="mb-3">Items in Cart</h4>

            @foreach($items as $item)
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body">
                    <div class="row align-items-center g-3">
                        <div class="col-auto">
                            <img src="{{ $item->product->imageUrl() }}" alt="{{ $item->product->name }}" class="rounded" style="width:80px;height:80px;object-fit:cover;">
                        </div>
                        <div class="col">
                            <h5 class="mb-0 fw-bold">
                                <a href="{{ route('products.show', $item->product->slug) }}" class="text-dark text-decoration-none">{{ $item->product->name }}</a>
                            </h5>
                            <p class="text-muted small mb-0">€{{ number_format($item->product->price, 2) }} each</p>
                        </div>
                        <div class="col-auto">
                            <form method="POST" action="{{ route('cart.update') }}" class="d-flex align-items-center gap-1">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                <div class="input-group input-group-sm" style="width:120px;">
                                    <button class="btn btn-outline-secondary" type="button"
                                            onclick="let i=this.nextElementSibling; i.value=Math.max(1,parseInt(i.value)-1);">−</button>
                                    <input type="number" name="quantity" class="form-control text-center"
                                           value="{{ $item->quantity }}" min="1" max="99">
                                    <button class="btn btn-outline-secondary" type="button"
                                            onclick="let i=this.previousElementSibling; i.value=Math.min(99,parseInt(i.value)+1);">+</button>
                                </div>
                                <button class="btn btn-sm btn-outline-primary ms-1" title="Update">↺</button>
                            </form>
                        </div>
                        <div class="col-auto text-end" style="min-width:90px;">
                            <span class="fw-bold fs-5">€{{ number_format($item->subtotal, 2) }}</span>
                        </div>
                        <div class="col-auto">
                            <form method="POST" action="{{ route('cart.remove') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                <button class="btn btn-sm btn-outline-danger" title="Remove item">🗑️</button>
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
                        <span class="text-muted">Calculated at checkout</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold fs-5">Total</span>
                        <span class="fw-bold fs-5 text-primary">€{{ number_format($total, 2) }}</span>
                    </div>
                    <a href="{{ route('checkout.index') }}" class="btn btn-dark w-100 py-2 fw-bold">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
    @endif
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
