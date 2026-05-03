<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

@include('partials.navbar')

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h2 class="text-center fw-bold mb-5">Checkout</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('checkout.store') }}">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-7">

                        <div class="card shadow-sm border-0 mb-4 p-4">
                            <h5 class="fw-bold mb-4">Delivery Details</h5>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label fw-bold small">Full Name *</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                           value="{{ old('name', $user?->name) }}" placeholder="Enter your full name" required>
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small">Email *</label>
                                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                           value="{{ old('email', $user?->email) }}" placeholder="Enter your email" required>
                                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small">Address *</label>
                                    <input type="text" name="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                           value="{{ old('address') }}" placeholder="Street address" required>
                                    @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small">City *</label>
                                    <input type="text" name="city" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                           value="{{ old('city') }}" placeholder="City" required>
                                    @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="card shadow-sm border-0 mb-4 p-4">
                            <h5 class="fw-bold mb-3">Shipping Method</h5>
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="form-check border rounded p-3">
                                        <input class="form-check-input" type="radio" name="shipping_method" id="ship_standard" value="standard" {{ old('shipping_method', 'standard') === 'standard' ? 'checked' : '' }}>
                                        <label class="form-check-label w-100" for="ship_standard">
                                            <strong>Standard</strong><br><span class="text-muted small">3–5 days · Free</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check border rounded p-3">
                                        <input class="form-check-input" type="radio" name="shipping_method" id="ship_express" value="express" {{ old('shipping_method') === 'express' ? 'checked' : '' }}>
                                        <label class="form-check-label w-100" for="ship_express">
                                            <strong>Express</strong><br><span class="text-muted small">1–2 days · €9.99</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @error('shipping_method')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="card shadow-sm border-0 mb-4 p-4">
                            <h5 class="fw-bold mb-3">Payment Method</h5>
                            <div class="row g-3">
                                <div class="col-4">
                                    <div class="form-check border rounded p-3">
                                        <input class="form-check-input" type="radio" name="payment_method" id="pay_card" value="card" {{ old('payment_method', 'card') === 'card' ? 'checked' : '' }}>
                                        <label class="form-check-label w-100" for="pay_card"><strong>Card</strong></label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check border rounded p-3">
                                        <input class="form-check-input" type="radio" name="payment_method" id="pay_paypal" value="paypal" {{ old('payment_method') === 'paypal' ? 'checked' : '' }}>
                                        <label class="form-check-label w-100" for="pay_paypal"><strong>PayPal</strong></label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check border rounded p-3">
                                        <input class="form-check-input" type="radio" name="payment_method" id="pay_cash" value="cash" {{ old('payment_method') === 'cash' ? 'checked' : '' }}>
                                        <label class="form-check-label w-100" for="pay_cash"><strong>Cash</strong></label>
                                    </div>
                                </div>
                            </div>
                            @error('payment_method')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="card shadow-sm border-0 p-4 sticky-top" style="top:1rem;">
                            <h5 class="fw-bold mb-3">Order Summary</h5>
                            @foreach($items as $item)
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted small">{{ $item->product->name }} × {{ $item->quantity }}</span>
                                <span class="fw-bold small">€{{ number_format($item->subtotal, 2) }}</span>
                            </div>
                            @endforeach
                            <hr>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal</span>
                                <span>€{{ number_format($total, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Shipping</span>
                                <span id="shippingCost">Free</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                                <span>Total</span>
                                <span id="totalDisplay">€{{ number_format($total, 2) }}</span>
                            </div>
                            <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
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
    const subtotal = {{ $total }};
    document.querySelectorAll('input[name="shipping_method"]').forEach(r => {
        r.addEventListener('change', function() {
            const extra = this.value === 'express' ? 9.99 : 0;
            document.getElementById('shippingCost').textContent = extra ? '€9.99' : 'Free';
            document.getElementById('totalDisplay').textContent = '€' + (subtotal + extra).toFixed(2);
        });
    });
</script>
</body>
</html>
