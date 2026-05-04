<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-ui-polish-styles />
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<x-storefront-navbar />

<main class="container my-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show soft-enter" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row g-5">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm mb-3">
                <img id="mainProductImage" src="{{ $product->primary_image_url ?? 'https://placehold.co/600x450?text=Product' }}" class="card-img-top rounded" alt="{{ $product->name }}">
            </div>
            @if($product->images->isNotEmpty())
                <div class="d-flex gap-2 flex-wrap">
                    @foreach($product->images as $index => $image)
                        <img
                            src="{{ $image->path }}"
                            class="rounded border {{ $index === 0 ? 'border-dark' : '' }}"
                            style="cursor:pointer;width:80px;"
                            alt="{{ $product->name }} image {{ $index + 1 }}"
                            onclick="setMainImage(this)"
                        >
                    @endforeach
                </div>
            @endif
        </div>

        <div class="col-lg-6">
            <span class="badge bg-success mb-2">In Stock</span>
            <h1 class="fw-bold mb-1 page-title">{{ $product->name }}</h1>
            <p class="text-muted mb-3">by <span class="text-decoration-none">{{ $product->brand }}</span></p>

            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="text-warning fs-5">★★★★☆</span>
                <span class="text-muted small">(128 reviews)</span>
            </div>

            <h2 class="fw-bold text-primary mb-1">€{{ number_format($product->price, 2) }}</h2>
            <p class="text-muted small mb-4">Incl. VAT. Free shipping on orders over €100.</p>

            <div class="mb-4">
                <h6 class="fw-bold mb-2">Key Specs</h6>
                <ul class="list-unstyled text-muted small">
                    <li>🖥️ Product quality and performance information</li>
                    <li>⚡ Brand: {{ $product->brand }}</li>
                    <li>🎮 Great for everyday use and store demos</li>
                    <li>💾 Description: {{ $product->description }}</li>
                    <li>🔋 Ready for checkout and cart testing</li>
                </ul>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold small">Color</label>
                <div class="d-flex gap-2">
                    <button class="btn btn-dark btn-sm px-3 active">Eclipse Black</button>
                    <button class="btn btn-outline-secondary btn-sm px-3">Silver Storm</button>
                </div>
            </div>

            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-flex gap-3 mb-3">
                @csrf
                <div class="input-group" style="max-width:130px;">
                    <button class="btn btn-outline-secondary" type="button" onclick="changeQty(-1)">−</button>
                    <input type="number" id="qty" name="quantity" class="form-control text-center" value="1" min="1">
                    <button class="btn btn-outline-secondary" type="button" onclick="changeQty(1)">+</button>
                </div>
                <button type="submit" class="btn btn-dark flex-grow-1 fw-bold">🛒 Add to Cart</button>
            </form>
            <button class="btn btn-outline-dark w-100 mb-2">♡ Add to Wishlist</button>
        </div>
    </div>

    <div class="mt-5">
        <ul class="nav nav-tabs" id="productTabs">
            <li class="nav-item"><button class="nav-link active fw-bold" data-bs-toggle="tab" data-bs-target="#desc">Description</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#specs">Full Specs</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#reviews">Reviews (128)</button></li>
        </ul>
        <div class="tab-content bg-white border border-top-0 rounded-bottom p-4 shadow-sm">
            <div class="tab-pane fade show active" id="desc">
                <p>{{ $product->description }}</p>
                <p class="text-muted">Comes with standard store warranty and return policy information.</p>
            </div>
            <div class="tab-pane fade" id="specs">
                <table class="table table-striped table-sm">
                    <tbody>
                    <tr><th>Processor</th><td>Intel Core i7-13700H (14 cores, up to 5.0GHz)</td></tr>
                    <tr><th>GPU</th><td>NVIDIA GeForce RTX 4060 8GB GDDR6</td></tr>
                    <tr><th>RAM</th><td>16GB DDR5 4800MHz (expandable to 32GB)</td></tr>
                    <tr><th>Storage</th><td>512GB PCIe 4.0 NVMe SSD</td></tr>
                    <tr><th>Display</th><td>15.6" FHD (1920×1080) IPS, 144Hz, 3ms</td></tr>
                    <tr><th>Battery</th><td>90Wh, up to 8 hours</td></tr>
                    <tr><th>OS</th><td>Windows 11 Home</td></tr>
                    <tr><th>Weight</th><td>2.1 kg</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="reviews">
                <div class="mb-4 pb-4 border-bottom">
                    <div class="d-flex justify-content-between">
                        <strong>John D.</strong>
                        <span class="text-warning">★★★★★</span>
                    </div>
                    <p class="text-muted small mt-1 mb-0">Incredible machine. Handles everything I throw at it. Highly recommend!</p>
                </div>
                <div class="mb-4">
                    <div class="d-flex justify-content-between">
                        <strong>Maria K.</strong>
                        <span class="text-warning">★★★★☆</span>
                    </div>
                    <p class="text-muted small mt-1 mb-0">Great performance, fan noise is a bit loud under load but otherwise perfect.</p>
                </div>
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
<script>
    function changeQty(delta) {
        const input = document.getElementById('qty');
        const newVal = Math.max(1, parseInt(input.value) + delta);
        input.value = newVal;
    }

    function setMainImage(el) {
        const mainImage = document.getElementById('mainProductImage');
        mainImage.src = el.src;

        document.querySelectorAll('[onclick="setMainImage(this)"]').forEach(img => {
            img.classList.remove('border-dark');
        });

        el.classList.add('border-dark');
    }
</script>
</body>
</html>
