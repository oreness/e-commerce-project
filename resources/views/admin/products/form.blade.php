<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($product) ? 'Edit' : 'Add' }} Product - ElectroHub Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg bg-warning shadow-sm" data-bs-theme="light">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark" href="{{ route('admin.products.index') }}">
            ⚡ ElectroHub <span class="badge bg-dark text-warning ms-2 align-middle">ADMIN</span>
        </a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="nav-item mt-2 mt-lg-0">
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-dark btn-sm ms-lg-3 fw-bold">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-5">
    <div class="mb-4">
        <a href="{{ route('admin.products.index') }}" class="text-decoration-none text-muted">← Back to Products</a>
        <h1 class="fw-bold h2 mt-2">{{ isset($product) ? 'Edit: '.$product->name : 'Add New Product' }}</h1>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <form method="POST"
                          action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}"
                          enctype="multipart/form-data">
                        @csrf
                        @if(isset($product))
                            @method('PUT')
                        @endif

                        <h5 class="fw-bold mb-3">Basic Information</h5>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">Product Name *</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                   value="{{ old('name', $product->name ?? '') }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small">Description</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description ?? '') }}</textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Price (€) *</label>
                                <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                       value="{{ old('price', $product->price ?? '') }}" step="0.01" min="0" required>
                                @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Stock *</label>
                                <input type="number" name="stock" class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}"
                                       value="{{ old('stock', $product->stock ?? 0) }}" min="0" required>
                                @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Category *</label>
                                <select name="category_id" class="form-select {{ $errors->has('category_id') ? 'is-invalid' : '' }}" required>
                                    <option value="" disabled>Select a category...</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Color</label>
                                <select name="color" class="form-select">
                                    <option value="">— No color —</option>
                                    @foreach($colors as $color)
                                    <option value="{{ $color }}" {{ old('color', $product->color ?? '') === $color ? 'selected' : '' }}>
                                        {{ $color }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <h5 class="fw-bold mb-3">Product Image</h5>

                        @if(isset($product) && $product->image)
                        <div class="mb-3">
                            <p class="small fw-bold mb-2">Current Image:</p>
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}" class="rounded shadow-sm" style="width:120px;height:90px;object-fit:cover;">
                                <form method="POST" action="{{ route('admin.products.delete-image', $product) }}"
                                      onsubmit="return confirm('Delete this image?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">🗑️ Delete Image</button>
                                </form>
                            </div>
                        </div>
                        @endif

                        <div class="mb-4">
                            <label class="form-label fw-bold small">{{ isset($product) && $product->image ? 'Replace Image' : 'Upload Image' }}</label>
                            <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" accept="image/*">
                            <div class="form-text">Max 2MB. JPG, PNG, GIF, WebP.</div>
                            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-dark px-5">
                                {{ isset($product) ? 'Update Product' : 'Create Product' }}
                            </button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="bg-dark text-white text-center py-3 mt-auto">
    <div class="container"><p class="mb-0 text-muted small">&copy; 2026 ElectroHub Admin</p></div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
