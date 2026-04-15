<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-ui-polish-styles />
</head>
<body class="bg-light">

<x-storefront-navbar />

<main class="container my-5">
    <div class="mb-4">
        <h1 class="fw-bold page-title">Our Catalog</h1>
        @if(request('search'))
            <p class="text-muted mb-1">Results for: "<strong>{{ request('search') }}</strong>"</p>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show soft-enter" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('products.index') }}" method="GET" class="row g-2 mb-4">
        <div class="col-lg-8">
            <input type="text" name="search" class="form-control" placeholder="Search products by name or description" value="{{ request('search') }}">
        </div>
        <div class="col-lg-4 d-grid">
            <button type="submit" class="btn btn-dark">Search catalog</button>
        </div>
    </form>

    <div class="row">
        <aside class="col-lg-3 mb-4">
            <form action="{{ route('products.index') }}" method="GET" class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white fw-bold">⚙️ Filters</div>
                <div class="card-body">
                    <input type="hidden" name="search" value="{{ request('search') }}">

                    <h6 class="fw-bold">Brand</h6>
                    <select name="brand" class="form-select form-select-sm mb-3">
                        <option value="">All Brands</option>
                        <option value="Asus" {{ request('brand') == 'Asus' ? 'selected' : '' }}>Asus</option>
                        <option value="Lenovo" {{ request('brand') == 'Lenovo' ? 'selected' : '' }}>Lenovo</option>
                        <option value="MSI" {{ request('brand') == 'MSI' ? 'selected' : '' }}>MSI</option>
                    </select>

                    <h6 class="fw-bold">Price Range</h6>
                    <div class="d-flex gap-2 mb-3">
                        <input type="number" name="min_price" class="form-control form-control-sm" placeholder="Min €" value="{{ request('min_price') }}">
                        <input type="number" name="max_price" class="form-control form-control-sm" placeholder="Max €" value="{{ request('max_price') }}">
                    </div>

                    <h6 class="fw-bold">Sort By</h6>
                    <select name="sort" class="form-select form-select-sm mb-3">
                        <option value="">Relevance</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>

                    <button type="submit" class="btn btn-dark btn-sm w-100 mb-2">Apply Filters</button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm w-100">Clear All</a>
                </div>
            </form>
        </aside>

        <div class="col-lg-9">
            <div class="row g-4">
                @forelse($products as $product)
                    <article class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ $product->image_url ?? 'https://placehold.co/400x300?text=Product' }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">
                                    <a href="{{ route('product.show', $product->id) }}" class="text-dark text-decoration-none">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <p class="text-muted small mb-1">{{ $product->brand }}</p>
                                <p class="card-text fs-5 text-primary fw-bold mt-auto">€{{ number_format($product->price, 2) }}</p>

                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-dark w-100">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-12 text-center py-5">
                        <h3 class="text-muted">No products found.</h3>
                    </div>
                @endforelse
            </div>

            <div class="mt-5 d-flex justify-content-center">
                {{ $products->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</main>

<footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container">
        <p class="mb-0 text-muted small">&copy; 2026 ElectroHub</p>
    </div>
</footer>

</body>
</html>
