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
        <div class="col-lg-8">
            <h2 class="text-center fw-bold mb-5">Checkout</h2>

            <div class="card shadow-sm border-0 mb-4 p-4">
                <h3 class="fw-bold text-center mb-4">Delivery Details</h3>
                <form>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Name</label>
                            <input type="text" class="form-control bg-light" placeholder="Enter your name">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Address</label>
                            <input type="text" class="form-control bg-light" placeholder="Enter your address">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">City</label>
                            <input type="text" class="form-control bg-light" placeholder="Enter your city">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-dark px-5">Next</button>
                    </div>
                </form>
            </div>

            <div class="card shadow-sm border-0 mb-4 p-4">
                <h3 class="fw-bold mb-4">Shipping Method</h3>
                <div class="d-flex gap-3 mb-4">
                    <button class="btn btn-outline-dark flex-fill">Standard</button>
                    <button class="btn btn-light border flex-fill text-muted">Express</button>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-dark px-5">Continue</button>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4 p-4">
                <h3 class="fw-bold mb-4">Payment Method</h3>
                <div class="d-flex gap-3 mb-4">
                    <button class="btn btn-outline-dark flex-fill">Card</button>
                    <button class="btn btn-light border flex-fill text-muted">PayPal</button>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-dark px-5">Proceed to Payment</button>
                </div>
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
