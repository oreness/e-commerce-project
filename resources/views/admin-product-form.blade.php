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
        <a class="navbar-brand fw-bold text-dark" href="{{ url('/admin-products') }}">
            ⚡ ElectroHub
            <span class="badge bg-dark text-warning ms-2 align-middle">ADMIN</span>
        </a>
        <button class="navbar-toggler border-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link active fw-bold text-dark" href="{{ url('/admin-products') }}">Products</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="#">Orders</a></li>
                <li class="nav-item mt-2 mt-lg-0"><a class="btn btn-dark btn-sm ms-lg-3 fw-bold" href="{{ url('/login') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-5">
    <div class="mb-4">
        <a href="{{ url('/admin-products') }}" class="text-decoration-none text-muted">← Back to Products</a>
        <h1 class="fw-bold h2 mt-2">Add New Product</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0 max-w-lg">
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h5 class="fw-bold mb-3">Basic Information</h5>

                <div class="mb-3">
                    <label for="brand" class="form-label fw-bold small">Brand *</label>
                    <input type="text" name="brand" class="form-control" id="brand" placeholder="e.g. Sony, Apple..." required>
                </div>

                <div class="mb-3">
                    <label for="productName" class="form-label fw-bold small">Product Name *</label>
                    <input type="text" name="name" class="form-control" id="productName" placeholder="e.g. Pro Gaming X Laptop" required>
                </div>

                <div class="mb-3">
                    <label for="productDesc" class="form-label fw-bold small">Description *</label>
                    <textarea name="description" class="form-control" id="productDesc" rows="4" placeholder="Enter product details..." required></textarea>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="productPrice" class="form-label fw-bold small">Price (€) *</label>
                        <input type="number" name="price" class="form-control" id="productPrice" placeholder="0.00" step="0.01" required>
                    </div>
                    <div class="col-md-6">
                        <label for="productColor" class="form-label fw-bold small">Color (Attribute) *</label>
                        <select name="color" class="form-select" id="productColor" required>
                            <option value="" selected disabled>Select a color...</option>
                            <option value="black">Matte Black</option>
                            <option value="silver">Titanium Silver</option>
                            <option value="white">Glacier White</option>
                        </select>
                    </div>
                </div>

                <hr class="my-4">
                <h5 class="fw-bold mb-3">Images</h5>
                <p class="text-muted small mb-3">Please upload at least 2 photos for the product gallery.</p>

                <div class="mb-4">
                    <label for="productImages" class="form-label fw-bold small">Upload New Images</label>
                    <input class="form-control" type="file" name="images[]" id="productImages" multiple accept="image/png, image/jpeg" required>
                </div>

                <h6 class="fw-bold small mb-4">Current Images (Only for Edit Mode)</h6>
                <div class="d-flex gap-3 mb-4 flex-wrap text-muted small">
                    No images yet.
                </div>

                <div class="d-flex justify-content-end gap-2 mt-5">
                    <a href="{{ url('/admin-products') }}" class="btn btn-outline-secondary fw-bold">Cancel</a>
                    <button type="submit" class="btn btn-dark fw-bold px-4">Save Product</button>
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
