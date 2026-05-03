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
            <h2 class="fw-bold text-center mb-4">Search Products</h2>
            <form method="GET" action="{{ route('products.index') }}">
                <div class="input-group input-group-lg shadow-sm">
                    <input type="text" class="form-control" name="search"
                           value="{{ request('search') }}"
                           placeholder="Search for laptops, mice, keyboards..." autofocus>
                    <button class="btn btn-dark px-4" type="submit">🔍 Search</button>
                </div>
            </form>
        </div>
    </div>

    @if(isset($products))
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if($products->isEmpty())
                    <div class="alert alert-info text-center">No products found for "{{ request('search') }}".</div>
                @else
                    <h5 class="mb-3">{{ $products->total() }} result(s) for "{{ request('search') }}"</h5>
                    <div class="row g-3">
                        @foreach($products as $product)
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="row g-0 align-items-center">
                                    <div class="col-4">
                                        <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}" class="rounded-start w-100" style="height:100px;object-fit:cover;">
                                    </div>
                                    <div class="col-8 p-3">
                                        <h6 class="fw-bold mb-1">
                                            <a href="{{ route('products.show', $product->slug) }}" class="text-dark text-decoration-none">{{ $product->name }}</a>
                                        </h6>
                                        <p class="text-muted small mb-1">{{ $product->category->name }}</p>
                                        <span class="fw-bold text-primary">€{{ number_format($product->price, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-4">{{ $products->links('pagination::bootstrap-5') }}</div>
                @endif
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
