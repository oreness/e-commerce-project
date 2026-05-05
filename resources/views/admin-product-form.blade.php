<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Edit Product - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg bg-warning shadow-sm" data-bs-theme="light">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark" href="{{ route('admin.products.index') }}">
            ⚡ ElectroHub
            <span class="badge bg-dark text-warning ms-2 align-middle">ADMIN</span>
        </a>
        <button class="navbar-toggler border-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link active fw-bold text-dark" href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="nav-item mt-2 mt-lg-0 ms-lg-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-dark btn-sm fw-bold">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-5">
    <div class="mb-4">
        <a href="{{ route('admin.products.index') }}" class="text-decoration-none text-muted">← Back to Products</a>
        <h1 class="fw-bold h2 mt-2">{{ $isEdit ? 'Edit Product' : 'Add New Product' }}</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0 max-w-lg">
        <div class="card-body p-4 p-md-5">
            <form action="{{ $isEdit ? route('admin.product.update', $product->id) : route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                <h5 class="fw-bold mb-3">Basic Information</h5>

                <div class="mb-3">
                    <label for="productName" class="form-label fw-bold small">Product Name *</label>
                    <input type="text" name="name" class="form-control" id="productName" placeholder="e.g. Pro Gaming X Laptop" value="{{ old('name', $product->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="brand" class="form-label fw-bold small">Brand *</label>
                    <input type="text" name="brand" class="form-control" id="brand" placeholder="e.g. Sony, ASUS, etc." value="{{ old('brand', $product->brand) }}" required>
                </div>

                <div class="mb-3">
                    <label for="productDesc" class="form-label fw-bold small">Description *</label>
                    <textarea name="description" class="form-control" id="productDesc" rows="4" placeholder="Enter product details..." required>{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="productPrice" class="form-label fw-bold small">Price (€) *</label>
                        <input type="number" name="price" class="form-control" id="productPrice" placeholder="0.00" step="0.01" min="0" value="{{ old('price', $product->price) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="productCategory" class="form-label fw-bold small">Category *</label>
                        <select name="category_id" class="form-select" id="productCategory" required>
                            <option value="" disabled {{ old('category_id', $product->category_id) ? '' : 'selected' }}>Select category...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (string) old('category_id', $product->category_id) === (string) $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <hr class="my-4">
                <h5 class="fw-bold mb-3">Images</h5>
                <p class="text-muted small mb-3">
                    {{ $isEdit ? 'You can upload extra photos. Keep at least 2 photos attached to the product.' : 'Please upload at least 2 photos for the product gallery.' }}
                </p>

                <div class="mb-4">
                    <label for="productImages" class="form-label fw-bold small">{{ $isEdit ? 'Upload Additional Images' : 'Upload Images' }}</label>
                    <input class="form-control" type="file" id="productImages" name="images[]" multiple accept="image/png, image/jpeg, image/webp, image/avif" {{ $isEdit ? '' : 'required' }}>
                </div>

                @if($isEdit)
                    <h6 class="fw-bold small mb-4">Current Images</h6>
                    <div class="d-flex gap-3 mb-4 flex-wrap">
                        @forelse($product->images as $image)
                            <div class="position-relative">
                                <img src="{{ $image->path }}" class="rounded border" alt="Product image" style="width: 100px; height: 100px; object-fit: cover;">
                                <form method="POST" action="{{ route('admin.products.images.destroy', [$product->id, $image->id]) }}" class="position-absolute top-0 start-100 translate-middle">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded-circle p-0 d-flex justify-content-center align-items-center shadow-sm" style="width: 24px; height: 24px; line-height: 0;" title="Remove image" onclick="return confirm('Remove this image?')">
                                        <span aria-hidden="true" style="margin-top: -2px;">&times;</span>
                                    </button>
                                </form>
                            </div>
                        @empty
                            <p class="text-muted small mb-0">No images yet.</p>
                        @endforelse
                    </div>
                @endif

                <div class="d-flex justify-content-end gap-2 mt-5">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary fw-bold">Cancel</a>
                    <button type="submit" class="btn btn-dark fw-bold px-4">{{ $isEdit ? 'Update Product' : 'Create Product' }}</button>
                </div>
            </form>
        </div>
    </div>
</main>

<footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container"><p class="mb-0 text-muted small">&copy; 2026 ElectroHub Admin</p></div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
