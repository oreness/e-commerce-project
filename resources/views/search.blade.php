<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-ui-polish-styles />
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<x-storefront-navbar />

<main class="container my-5">
    <div class="row justify-content-center mb-4">
        <div class="col-lg-8 text-center">
            <h1 class="fw-bold mb-3 page-title">Search the catalog</h1>
            <p class="text-muted">Search by product name or description, then refine results on the catalog page.</p>
            <form action="{{ route('search') }}" method="GET" class="input-group shadow-sm mt-4">
                <input type="text" name="search" class="form-control form-control-lg" placeholder="Search for a product name..." value="{{ request('search') }}">
                <button class="btn btn-dark px-4 fw-bold" type="submit">🔍 Search</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show soft-enter" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(request('search'))
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <span class="text-muted">Showing {{ $products->total() }} result(s) for <strong>"{{ request('search') }}"</strong></span>
            <a href="{{ route('search') }}" class="btn btn-outline-secondary btn-sm">Clear search</a>
        </div>

        <div class="row g-4">
            @forelse($products as $product)
                <article class="col-md-6 col-xl-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ $product->image_url ?? 'https://placehold.co/400x300?text=Product' }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <p class="text-muted small mb-1">{{ $product->brand }}</p>
                            <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                            <p class="card-text text-muted small">{{ \Illuminate\Support\Str::limit($product->description, 80) }}</p>
                            <p class="card-text fs-5 text-primary fw-bold mt-auto">€{{ number_format($product->price, 2) }}</p>
                            <div class="d-flex gap-2">
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-dark w-100 btn-sm">View Product</a>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-100">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-dark w-100 btn-sm">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-12 text-center py-5">
                    <h3 class="text-muted">No products matched your search.</h3>
                </div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $products->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @else
        <div class="row g-4 justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h3 class="fw-bold mb-3">Popular searches</h3>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('search', ['search' => 'gaming']) }}" class="badge bg-white text-dark border text-decoration-none p-2">Gaming laptop</a>
                            <a href="{{ route('search', ['search' => 'monitor']) }}" class="badge bg-white text-dark border text-decoration-none p-2">Monitor</a>
                            <a href="{{ route('search', ['search' => 'keyboard']) }}" class="badge bg-white text-dark border text-decoration-none p-2">Keyboard</a>
                            <a href="{{ route('search', ['search' => 'asus']) }}" class="badge bg-white text-dark border text-decoration-none p-2">Asus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
