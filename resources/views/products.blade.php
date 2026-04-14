<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptops - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

@include('partials.navbar')

<main class="container my-5">

    <div class="mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/products') }}">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laptops</li>
            </ol>
        </nav>
        <h1 class="fw-bold">Gaming Laptops</h1>
    </div>

    <div class="row">
        <aside class="col-lg-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white fw-bold">⚙️ Filters</div>
                <div class="card-body">
                    <h6 class="fw-bold">Brand</h6>
                    <label>
                        <input type="checkbox" class="form-check-input">
                    </label>
                    Asus
                    <div class="form-check mb-3"><label>
                            <input type="checkbox" class="form-check-input">
                        </label> <label>Lenovo</label></div>

                    <h6 class="fw-bold">Max Price</h6>
                    <label>
                        <input type="range" class="form-range mb-3" min="0" max="2000" step="100">
                    </label>

                    <h6 class="fw-bold">Color</h6>
                    <label>
                        <select class="form-select form-select-sm mb-3">
                            <option>All Colors</option>
                            <option>Black</option>
                            <option>Silver</option>
                        </select>
                    </label>

                    <button class="btn btn-outline-dark btn-sm w-100">Apply Filters</button>
                </div>
            </div>
        </aside>

        <div class="col-lg-9">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Showing 12 results</span>
                <label>
                    <select class="form-select w-auto shadow-sm">
                        <option selected>Sort by: Relevance</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                    </select>
                </label>
            </div>

            <div class="row g-4">
                <article class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://placehold.co/400x300/e9ecef/495057?text=Laptop" class="card-img-top" alt="Laptop">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">
                                <a href="{{ url('/product-detail') }}" class="text-dark text-decoration-none">Pro Gaming X</a>
                            </h5>
                            <p class="card-text fs-5 text-primary fw-bold mt-auto">€1299</p>
                            <button class="btn btn-dark w-100" onclick="window.location.href='{{ url('/cart') }}'">Add to Cart</button>
                        </div>
                    </div>
                </article>
            </div>

            <nav class="mt-5" aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>

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
