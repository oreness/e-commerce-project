<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

@include('partials.navbar')

<main class="container my-5">

    <div class="mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </nav>
        <h1 class="fw-bold">
            @if(request('search'))
                Search: "{{ request('search') }}"
            @elseif(request('category'))
                {{ $categories->firstWhere('slug', request('category'))?->name ?? 'Products' }}
            @else
                All Products
            @endif
        </h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <aside class="col-lg-3 mb-4">
            <form method="GET" action="{{ route('products.index') }}">
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-dark text-white fw-bold">Filters</div>
                    <div class="card-body">
                        <h6 class="fw-bold">Category</h6>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" id="cat_all" value="" {{ !request('category') ? 'checked' : '' }}>
                                <label class="form-check-label" for="cat_all">All</label>
                            </div>
                            @foreach($categories as $cat)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" id="cat_{{ $cat->slug }}" value="{{ $cat->slug }}" {{ request('category') === $cat->slug ? 'checked' : '' }}>
                                <label class="form-check-label" for="cat_{{ $cat->slug }}">{{ $cat->name }}</label>
                            </div>
                            @endforeach
                        </div>

                        <h6 class="fw-bold">Max Price (€)</h6>
                        <input type="range" class="form-range mb-1" name="max_price" id="priceRange"
                            min="0" max="2000" step="50" value="{{ request('max_price', 2000) }}"
                            oninput="document.getElementById('priceVal').textContent=this.value">
                        <div class="small text-muted mb-3">Up to €<span id="priceVal">{{ request('max_price', 2000) }}</span></div>

                        <h6 class="fw-bold">Color</h6>
                        <select class="form-select form-select-sm mb-3" name="color">
                            <option value="">All Colors</option>
                            @foreach($colors as $color)
                            <option value="{{ $color }}" {{ request('color') === $color ? 'selected' : '' }}>{{ $color }}</option>
                            @endforeach
                        </select>

                        <button class="btn btn-dark btn-sm w-100">Apply Filters</button>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm w-100 mt-2">Reset</a>
                    </div>
                </div>
            </form>
        </aside>

        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <span class="text-muted">Showing {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} results</span>
                <form method="GET" action="{{ route('products.index') }}" class="d-flex align-items-center gap-2">
                    @foreach(request()->except('sort') as $key => $val)
                        <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                    @endforeach
                    <select class="form-select form-select-sm shadow-sm w-auto" name="sort" onchange="this.form.submit()">
                        <option value="" {{ !request('sort') ? 'selected' : '' }}>Sort: Relevance</option>
                        <option value="price_asc"  {{ request('sort') === 'price_asc'  ? 'selected' : '' }}>Price: Low → High</option>
                        <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Price: High → Low</option>
                        <option value="name_asc"   {{ request('sort') === 'name_asc'   ? 'selected' : '' }}>Name A–Z</option>
                    </select>
                </form>
            </div>

            @if($products->isEmpty())
                <div class="alert alert-info">No products found. <a href="{{ route('products.index') }}">View all products</a></div>
            @else
            <div class="row g-4">
                @foreach($products as $product)
                <article class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ $product->imageUrl() }}" class="card-img-top" alt="{{ $product->name }}" style="height:200px;object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <p class="text-muted small mb-1">{{ $product->category->name }}</p>
                            <h5 class="card-title fw-bold">
                                <a href="{{ route('products.show', $product->slug) }}" class="text-dark text-decoration-none">{{ $product->name }}</a>
                            </h5>
                            <p class="card-text fs-5 text-primary fw-bold mt-auto">€{{ number_format($product->price, 2) }}</p>
                            <form method="POST" action="{{ route('cart.add') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn btn-dark w-100">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="mt-5 d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
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
