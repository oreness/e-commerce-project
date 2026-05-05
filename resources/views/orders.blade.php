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
                    <h6 class="fw-bold mb-0">{{ Auth::user()->name }}</h6>
                    <p class="text-muted small">{{ Auth::user()->email }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{ url('/account') }}" class="text-decoration-none text-dark">👤 My Account</a></li>
                    <li class="list-group-item bg-light"><a href="{{ url('/orders') }}" class="text-decoration-none fw-bold text-dark">📦 My Orders</a></li>
                    <li class="list-group-item"><a href="{{ url('/wishlist') }}" class="text-decoration-none text-dark">♡ Wishlist</a></li>
                    <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">📍 Addresses</a></li>
                    <li class="list-group-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link text-danger text-decoration-none p-0 w-100 text-start">🚪 Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-9">
            <h2 class="fw-bold mb-4">My Orders</h2>

            @forelse($orders as $order)
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                            <div>
                                <h6 class="fw-bold mb-0">Order #{{ $order->order_number }}</h6>
                                <p class="text-muted small mb-0">Placed: {{ $order->created_at->format('F j, Y') }}</p>
                            </div>
                            <span class="badge bg-{{ in_array($order->status, ['new', 'confirmed'], true) ? 'success' : ($order->status === 'processing' ? 'primary' : 'secondary') }} fs-6 px-3 py-2 text-uppercase">{{ $order->status }}</span>
                        </div>

                        @foreach($order->items as $item)
                            <div class="d-flex align-items-center mb-3">
                                @php($product = $item->product)
                                <img src="{{ $product?->primary_image_url ?? 'https://placehold.co/50x50/e9ecef/495057?text=Item' }}" class="rounded me-2" alt="{{ $product?->name ?? 'Product' }}" style="width:50px;height:50px;object-fit:cover;">
                                <span class="small">{{ $product?->name ?? 'Unknown product' }} × {{ $item->quantity }}</span>
                                <span class="ms-auto small fw-bold">€{{ number_format($item->unit_price * $item->quantity, 2) }}</span>
                            </div>
                        @endforeach

                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <span class="fw-bold">Total: €{{ number_format($order->total_price, 2) }}</span>
                            <button class="btn btn-dark btn-sm" disabled>Reorder</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card shadow-sm border-0">
                    <div class="card-body p-5 text-center">
                        <h4 class="fw-bold mb-2">No orders yet</h4>
                        <p class="text-muted mb-4">When you place your first order, it will appear here.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-dark">Start Shopping</a>
                    </div>
                </div>
            @endforelse
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
