<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Products - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg bg-warning shadow-sm" data-bs-theme="light">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark" href="{{ route('admin.products.index') }}">
            ⚡ ElectroHub <span class="badge bg-dark text-warning ms-2 align-middle">ADMIN</span>
        </a>
        <button class="navbar-toggler border-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ route('admin.products.index') }}">Products</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('products.index') }}" target="_blank">View Shop</a></li>
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

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
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
                        <th class="ps-4">ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td class="ps-4 fw-bold">#{{ $product->id }}</td>
                        <td>
                            <img src="{{ $product->imageUrl() }}" class="rounded" alt="{{ $product->name }}" style="width:50px;height:50px;object-fit:cover;">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->color ?? '—' }}</td>
                        <td>€{{ number_format($product->price, 2) }}</td>
                        <td>
                            <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }}">{{ $product->stock }}</span>
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="d-inline"
                                  onsubmit="return confirm('Delete {{ $product->name }}? This will also delete its image.')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">No products found.</td>
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

<footer class="bg-dark text-white text-center py-3 mt-auto">
    <div class="container"><p class="mb-0 text-muted small">&copy; 2026 ElectroHub Admin</p></div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
