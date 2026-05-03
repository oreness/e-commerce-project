<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

@include('partials.navbar')

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
            <div class="display-1 mb-3">✅</div>
            <h1 class="fw-bold mb-2">Order Confirmed!</h1>
            <p class="text-muted mb-4">Thank you, <strong>{{ $order->name }}</strong>! Your order <strong>#{{ $order->id }}</strong> has been placed successfully.</p>

            <div class="card shadow-sm border-0 text-start mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Order Details</h5>
                    <table class="table table-sm table-borderless">
                        <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product_name }} × {{ $item->quantity }}</td>
                            <td class="text-end fw-bold">€{{ number_format($item->unit_price * $item->quantity, 2) }}</td>
                        </tr>
                        @endforeach
                        <tr class="border-top">
                            <td class="fw-bold">Shipping</td>
                            <td class="text-end">{{ $order->shipping_method === 'express' ? '€9.99' : 'Free' }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold fs-5">Total</td>
                            <td class="text-end fw-bold fs-5 text-primary">€{{ number_format($order->total, 2) }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <hr>
                    <div class="row g-2 text-muted small">
                        <div class="col-6"><strong>Ship to:</strong><br>{{ $order->address }}, {{ $order->city }}</div>
                        <div class="col-6"><strong>Payment:</strong><br>{{ ucfirst($order->payment_method) }}</div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-3 justify-content-center">
                <a href="{{ route('products.index') }}" class="btn btn-dark px-4">Continue Shopping</a>
                @auth
                <a href="{{ route('orders.index') }}" class="btn btn-outline-dark px-4">My Orders</a>
                @endauth
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
