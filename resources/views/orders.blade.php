<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

@include('partials.navbar')

<main class="container my-5">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 text-center">
                    <div class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width:60px;height:60px;font-size:1.5rem;">👤</div>
                    <h6 class="fw-bold mb-0">{{ auth()->user()->name }}</h6>
                    <p class="text-muted small">{{ auth()->user()->email }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{ route('account.index') }}" class="text-decoration-none text-dark">👤 My Account</a></li>
                    <li class="list-group-item bg-light"><a href="{{ route('orders.index') }}" class="text-decoration-none fw-bold text-dark">📦 My Orders</a></li>
                    <li class="list-group-item"><a href="{{ route('wishlist.index') }}" class="text-decoration-none text-dark">♡ Wishlist</a></li>
                    <li class="list-group-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 text-decoration-none text-danger">🚪 Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-9">
            <h2 class="fw-bold mb-4">My Orders</h2>

            @if($orders->isEmpty())
                <div class="alert alert-info">You haven't placed any orders yet. <a href="{{ route('products.index') }}">Start shopping</a></div>
            @else
                @foreach($orders as $order)
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <span class="fw-bold">Order #{{ $order->id }}</span>
                        <span class="text-muted small">{{ $order->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-sm table-borderless mb-2">
                                <tbody>
                                @foreach($order->items as $item)
                                <tr>
                                    <td>{{ $item->product_name }} × {{ $item->quantity }}</td>
                                    <td class="text-end">€{{ number_format($item->unit_price * $item->quantity, 2) }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between border-top pt-2">
                            <span class="text-muted small">{{ ucfirst($order->shipping_method) }} · {{ ucfirst($order->payment_method) }}</span>
                            <span class="fw-bold text-primary">Total: €{{ number_format($order->total, 2) }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
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
</body>
</html>
