<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

@include('partials.navbar')

<main class="container my-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-5">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm mb-3">
                <img src="{{ $product->imageUrl() }}" class="card-img-top rounded" alt="{{ $product->name }}" style="max-height:400px;object-fit:cover;">
            </div>
        </div>

        <div class="col-lg-6">
            @if($product->stock > 0)
                <span class="badge bg-success mb-2">In Stock ({{ $product->stock }})</span>
            @else
                <span class="badge bg-danger mb-2">Out of Stock</span>
            @endif

            <h1 class="fw-bold mb-1">{{ $product->name }}</h1>
            <p class="text-muted mb-3">Category: <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="text-decoration-none">{{ $product->category->name }}</a></p>

            <h2 class="fw-bold text-primary mb-1">€{{ number_format($product->price, 2) }}</h2>
            <p class="text-muted small mb-4">Incl. VAT. Free shipping on orders over €100.</p>

            @if($product->description)
            <div class="mb-4">
                <h6 class="fw-bold mb-2">Description</h6>
                <p class="text-muted">{{ $product->description }}</p>
            </div>
            @endif

            @if($product->color)
            <div class="mb-4">
                <label class="form-label fw-bold small">Color</label>
                <div>
                    <span class="badge bg-secondary px-3 py-2">{{ $product->color }}</span>
                </div>
            </div>
            @endif

            @if($product->stock > 0)
            <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="d-flex gap-3 mb-3 align-items-center">
                    <div class="input-group" style="max-width:130px;">
                        <button class="btn btn-outline-secondary" type="button" onclick="changeQty(-1)">−</button>
                        <input type="number" id="qty" name="quantity" class="form-control text-center" value="1" min="1" max="{{ $product->stock }}">
                        <button class="btn btn-outline-secondary" type="button" onclick="changeQty(1)">+</button>
                    </div>
                    <button class="btn btn-dark flex-grow-1 fw-bold">🛒 Add to Cart</button>
                </div>
            </form>
            @else
            <button class="btn btn-secondary w-100 mb-3" disabled>Out of Stock</button>
            @endif

            {{-- Remove from cart shortcut (only shown if item is in cart) --}}
            @php
                $cartService = app(\App\Services\CartService::class);
                $inCart = $cartService->items()->firstWhere(fn($i) => $i->product->id === $product->id);
            @endphp
            @if($inCart)
            <form method="POST" action="{{ route('cart.remove') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="btn btn-outline-danger w-100 mb-2">🗑️ Remove from Cart</button>
            </form>
            @endif
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
<script>
    function changeQty(delta) {
        const input = document.getElementById('qty');
        if (!input) return;
        const max = parseInt(input.max) || 99;
        const newVal = Math.min(max, Math.max(1, parseInt(input.value) + delta));
        input.value = newVal;
    }
</script>
</body>
</html>
