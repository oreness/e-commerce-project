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
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold h2">Product Management</h1>
        <a href="{{ url('/admin-product-form') }}" class="btn btn-dark fw-bold">+ Add New Product</a>
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
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col" class="text-end pe-4">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="ps-4 fw-bold">#101</td>
                        <td><img src="https://placehold.co/50x50/e9ecef/495057" class="rounded" alt="Thumbnail"></td>
                        <td>Pro Gaming X Laptop</td>
                        <td>Laptops</td>
                        <td>€1299</td>
                        <td class="text-end pe-4">
                            <a href="{{ url('/admin-product-form') }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 fw-bold">#102</td>
                        <td><img src="https://placehold.co/50x50/e9ecef/495057" class="rounded" alt="Thumbnail"></td>
                        <td>Ultra Wireless Mouse</td>
                        <td>Accessories</td>
                        <td>€49</td>
                        <td class="text-end pe-4">
                            <a href="{{ url('/admin-product-form') }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container"><p class="mb-0 text-muted small">&copy; 2026 ElectroHub Admin</p></div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
