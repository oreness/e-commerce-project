<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

@include('partials.navbar')

<main class="container my-5">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <div class="input-group shadow-sm">
                <input type="text" id="searchInput" class="form-control form-control-lg" placeholder="Search for laptops, accessories, monitors..." value="gaming">
                <button class="btn btn-dark px-4 fw-bold" onclick="doSearch()">🔍 Search</button>
            </div>
            <div class="d-flex gap-2 mt-2 flex-wrap">
                <span class="text-muted small">Popular:</span>
                <a href="#" class="badge bg-white text-dark border text-decoration-none small">Gaming Laptop</a>
                <a href="#" class="badge bg-white text-dark border text-decoration-none small">Mechanical Keyboard</a>
                <a href="#" class="badge bg-white text-dark border text-decoration-none small">4K Monitor</a>
                <a href="#" class="badge bg-white text-dark border text-decoration-none small">RTX 4070</a>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <aside class="col-lg-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white fw-bold">⚙️ Filters</div>
                <div class="card-body">
                    <h6 class="fw-bold">Category</h6>
                    <div class="form-check mb-1"><input class="form-check-input" type="checkbox" checked id="c1"><label class="form-check-label small" for="c1">Laptops (8)</label></div>
                    <div class="form-check mb-1"><input class="form-check-input" type="checkbox" id="c2"><label class="form-check-label small" for="c2">Accessories (4)</label></div>
                    <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="c3"><label class="form-check-label small" for="c3">Monitors (2)</label></div>

                    <h6 class="fw-bold">Price Range</h6>
                    <div class="d-flex gap-2 mb-3">
                        <input type="number" class="form-control form-control-sm" placeholder="Min €">
                        <input type="number" class="form-control form-control-sm" placeholder="Max €">
                    </div>

                    <h6 class="fw-bold">Brand</h6>
                    <div class="form-check mb-1"><input class="form-check-input" type="checkbox" id="b1"><label class="form-check-label small" for="b1">ASUS</label></div>
                    <div class="form-check mb-1"><input class="form-check-input" type="checkbox" id="b2"><label class="form-check-label small" for="b2">Lenovo</label></div>
                    <div class="form-check mb-3"><input class="form-check-input" type="checkbox" id="b3"><label class="form-check-label small" for="b3">MSI</label></div>

                    <h6 class="fw-bold">Rating</h6>
                    <div class="form-check mb-1"><input class="form-check-input" type="radio" name="rating" id="r4"><label class="form-check-label small" for="r4">★★★★☆ & up</label></div>
                    <div class="form-check mb-3"><input class="form-check-input" type="radio" name="rating" id="r3"><label class="form-check-label small" for="r3">★★★☆☆ & up</label></div>

                    <button class="btn btn-outline-dark btn-sm w-100">Apply Filters</button>
                    <button class="btn btn-link btn-sm w-100 text-muted">Clear All</button>
                </div>
            </div>
        </aside>

        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <span class="text-muted">14 results for <strong>"gaming"</strong></span>
                <select class="form-select w-auto shadow-sm">
                    <option>Sort: Relevance</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Best Rated</option>
                    <option>Newest</option>
                </select>
            </div>

            <div class="row g-4">
                <article class="col-md-6 col-xl-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://placehold.co/400x280/e9ecef/495057?text=Gaming+Laptop" class="card-img-top" alt="Pro Gaming X">
                        <div class="card-body d-flex flex-column">
                            <p class="text-muted small mb-1">ASUS</p>
                            <h5 class="card-title fw-bold">Pro Gaming X</h5>
                            <div class="text-warning small mb-2">★★★★☆ <span class="text-muted">(128)</span></div>
                            <p class="card-text fs-5 text-primary fw-bold mt-auto">€1,299</p>
                            <a href="{{ url('/product-detail') }}" class="btn btn-dark w-100 btn-sm mt-1">View Product</a>
                        </div>
                    </div>
                </article>

                <article class="col-md-6 col-xl-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="position-relative">
                            <img src="https://placehold.co/400x280/e9ecef/495057?text=Gaming+Mouse" class="card-img-top" alt="Gaming Mouse">
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2">Sale</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <p class="text-muted small mb-1">Razer</p>
                            <h5 class="card-title fw-bold">Pro Gaming Mouse</h5>
                            <div class="text-warning small mb-2">★★★★★ <span class="text-muted">(74)</span></div>
                            <div class="mt-auto">
                                <span class="text-muted text-decoration-line-through small me-2">€20.00</span>
                                <span class="fs-5 text-primary fw-bold">€15.00</span>
                            </div>
                            <a href="{{ url('/product-detail') }}" class="btn btn-dark w-100 btn-sm mt-1">View Product</a>
                        </div>
                    </div>
                </article>

                <article class="col-md-6 col-xl-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://placehold.co/400x280/e9ecef/495057?text=Keyboard" class="card-img-top" alt="Keyboard">
                        <div class="card-body d-flex flex-column">
                            <p class="text-muted small mb-1">SteelSeries</p>
                            <h5 class="card-title fw-bold">Mechanical Keyboard</h5>
                            <div class="text-warning small mb-2">★★★★☆ <span class="text-muted">(56)</span></div>
                            <p class="card-text fs-5 text-primary fw-bold mt-auto">€20.00</p>
                            <a href="{{ url('/product-detail') }}" class="btn btn-dark w-100 btn-sm mt-1">View Product</a>
                        </div>
                    </div>
                </article>

                <article class="col-md-6 col-xl-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://placehold.co/400x280/e9ecef/495057?text=Monitor" class="card-img-top" alt="Monitor">
                        <div class="card-body d-flex flex-column">
                            <p class="text-muted small mb-1">LG</p>
                            <h5 class="card-title fw-bold">27" Gaming Monitor</h5>
                            <div class="text-warning small mb-2">★★★★★ <span class="text-muted">(212)</span></div>
                            <p class="card-text fs-5 text-primary fw-bold mt-auto">€349.00</p>
                            <a href="{{ url('/product-detail') }}" class="btn btn-dark w-100 btn-sm mt-1">View Product</a>
                        </div>
                    </div>
                </article>

                <article class="col-md-6 col-xl-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://placehold.co/400x280/e9ecef/495057?text=Headset" class="card-img-top" alt="Headset">
                        <div class="card-body d-flex flex-column">
                            <p class="text-muted small mb-1">HyperX</p>
                            <h5 class="card-title fw-bold">Gaming Headset Pro</h5>
                            <div class="text-warning small mb-2">★★★☆☆ <span class="text-muted">(33)</span></div>
                            <p class="card-text fs-5 text-primary fw-bold mt-auto">€79.00</p>
                            <a href="{{ url('/product-detail') }}" class="btn btn-dark w-100 btn-sm mt-1">View Product</a>
                        </div>
                    </div>
                </article>

                <article class="col-md-6 col-xl-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="https://placehold.co/400x280/e9ecef/495057?text=Laptop+2" class="card-img-top" alt="Laptop 2">
                        <div class="card-body d-flex flex-column">
                            <p class="text-muted small mb-1">MSI</p>
                            <h5 class="card-title fw-bold">MSI Titan GT77</h5>
                            <div class="text-warning small mb-2">★★★★☆ <span class="text-muted">(41)</span></div>
                            <p class="card-text fs-5 text-primary fw-bold mt-auto">€2,199.00</p>
                            <a href="{{ url('/product-detail') }}" class="btn btn-dark w-100 btn-sm mt-1">View Product</a>
                        </div>
                    </div>
                </article>
            </div>

            <nav class="mt-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
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
<script>
    function doSearch() {
        const val = document.getElementById('searchInput').value.trim();
        if (val) alert('Searching for: ' + val);
    }
    document.getElementById('searchInput').addEventListener('keydown', e => {
        if (e.key === 'Enter') doSearch();
    });
</script>
</body>
</html>
