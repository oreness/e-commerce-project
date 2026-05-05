<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ElectroHub</title>
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
                <li class="nav-item">
                    <a class="nav-link active fw-bold text-dark" href="{{ route('admin.products.index') }}">Products</a>
                </li>
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

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold h2">Product Management</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-dark fw-bold">+ Add New Product</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col" class="ps-4">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col" class="text-end pe-4">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td class="ps-4 fw-bold">#{{ $product->id }}</td>
                            <td>
                                <img src="{{ $product->primary_image_url ?? 'https://placehold.co/50x50/e9ecef/495057' }}" class="rounded" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->category?->name ?? '—' }}</td>
                            <td>€{{ number_format($product->price, 2) }}</td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>

                                <form action="{{ route('admin.product.delete', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this product and all images?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">No products found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</main>

<footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container"><p class="mb-0 text-muted small">&copy; 2026 ElectroHub Admin</p></div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
