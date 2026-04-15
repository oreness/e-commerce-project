<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<x-storefront-navbar />

<main class="container my-5">
    <div class="mb-4">
        <h1 class="fw-bold">♡ My Wishlist</h1>
        <p class="text-muted">Items you've saved for later. <span class="fw-bold text-dark">3 items</span></p>
    </div>

    <div class="row g-4">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="position-relative">
                    <img src="https://placehold.co/400x280/e9ecef/495057?text=Laptop" class="card-img-top" alt="Pro Gaming X">
                    <button class="btn btn-sm btn-light border position-absolute top-0 end-0 m-2" onclick="removeWishlist(this)" title="Remove">✕</button>
                </div>
                <div class="card-body d-flex flex-column">
                    <p class="text-muted small mb-1">ASUS</p>
                    <h5 class="fw-bold">Pro Gaming X</h5>
                    <div class="text-warning small mb-2">★★★★☆</div>
                    <p class="text-primary fw-bold fs-5 mt-auto mb-3">€1,299.00</p>
                    <div class="d-flex gap-2">
                        <a href="{{ url('/product-detail') }}" class="btn btn-outline-dark btn-sm flex-fill">View</a>
                        <button class="btn btn-dark btn-sm flex-fill" onclick="window.location.href='{{ url('/cart') }}'">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="position-relative">
                    <img src="https://placehold.co/400x280/e9ecef/495057?text=Monitor" class="card-img-top" alt="Monitor">
                    <button class="btn btn-sm btn-light border position-absolute top-0 end-0 m-2" onclick="removeWishlist(this)" title="Remove">✕</button>
                    <span class="badge bg-danger position-absolute top-0 start-0 m-2">Low Stock</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <p class="text-muted small mb-1">LG</p>
                    <h5 class="fw-bold">27" 4K Gaming Monitor</h5>
                    <div class="text-warning small mb-2">★★★★★</div>
                    <p class="text-primary fw-bold fs-5 mt-auto mb-3">€349.00</p>
                    <div class="d-flex gap-2">
                        <a href="{{ url('/product-detail') }}" class="btn btn-outline-dark btn-sm flex-fill">View</a>
                        <button class="btn btn-dark btn-sm flex-fill" onclick="window.location.href='{{ url('/cart') }}'">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="position-relative">
                    <img src="https://placehold.co/400x280/e9ecef/495057?text=Headset" class="card-img-top" alt="Headset" style="opacity:0.6;">
                    <button class="btn btn-sm btn-light border position-absolute top-0 end-0 m-2" onclick="removeWishlist(this)" title="Remove">✕</button>
                    <span class="badge bg-secondary position-absolute top-0 start-0 m-2">Out of Stock</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <p class="text-muted small mb-1">HyperX</p>
                    <h5 class="fw-bold">Gaming Headset Pro</h5>
                    <div class="text-warning small mb-2">★★★☆☆</div>
                    <p class="text-muted fw-bold fs-5 mt-auto mb-3">€79.00</p>
                    <div class="d-flex gap-2">
                        <a href="{{ url('/product-detail') }}" class="btn btn-outline-dark btn-sm flex-fill">View</a>
                        <button class="btn btn-secondary btn-sm flex-fill" disabled>Out of Stock</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 text-end">
        <button class="btn btn-dark px-4" onclick="window.location.href='{{ url('/cart') }}'">Add All to Cart</button>
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
    function removeWishlist(btn) {
        btn.closest('.col-md-6').remove();
    }
</script>
</body>
</html>
