<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}"><span class="text-warning">⚡ Electro</span>Hub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link" href="{{ url('/search') }}">Search</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Categories</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ url('/account') }}">My Account</a></li>
                <li class="nav-item mt-2 mt-lg-0"><a class="btn btn-warning btn-sm ms-lg-3 fw-bold" href="{{ url('/cart') }}">🛒 Cart (0)</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-5">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 text-center">
                    <div class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width:60px;height:60px;font-size:1.5rem;">👤</div>
                    <h6 class="fw-bold mb-0">John Doe</h6>
                    <p class="text-muted small"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="8de7e2e5e3cde8f5ece0fde1e8a3eee2e0">[email&#160;protected]</a></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-light"><a href="{{ url('/account') }}" class="text-decoration-none fw-bold text-dark">👤 My Account</a></li>
                    <li class="list-group-item"><a href="{{ url('/orders') }}" class="text-decoration-none text-dark">📦 My Orders</a></li>
                    <li class="list-group-item"><a href="{{ url('/wishlist') }}" class="text-decoration-none text-dark">♡ Wishlist</a></li>
                    <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">📍 Addresses</a></li>
                    <li class="list-group-item"><a href="{{ url('/login') }}" class="text-decoration-none text-danger">🚪 Log Out</a></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-9">
            <h2 class="fw-bold mb-4">My Account</h2>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Personal Information</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label fw-bold small">First Name</label>
                            <input type="text" id="firstName" class="form-control" value="John">
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label fw-bold small">Last Name</label>
                            <input type="text" id="lastName" class="form-control" value="Doe">
                        </div>
                        <div class="col-md-6">
                            <label for="emailAddress" class="form-label fw-bold small">Email Address</label>
                            <input type="email" id="emailAddress" class="form-control" value="john@example.com">
                        </div>
                        <div class="col-md-6">
                            <label for="phoneNumber" class="form-label fw-bold small">Phone Number</label>
                            <input type="tel" id="phoneNumber" class="form-control" placeholder="+421 000 000 000">
                        </div>
                    </div>
                    <div class="mt-3 text-end">
                        <button class="btn btn-dark px-4">Save Changes</button>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Change Password</h5>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="currentPassword" class="form-label fw-bold small">Current Password</label>
                            <input type="password" id="currentPassword" class="form-control" placeholder="Enter current password">
                        </div>
                        <div class="col-md-6">
                            <label for="newPassword" class="form-label fw-bold small">New Password</label>
                            <input type="password" id="newPassword" class="form-control" placeholder="Enter new password">
                        </div>
                        <div class="col-md-6">
                            <label for="confirmPassword" class="form-label fw-bold small">Confirm New Password</label>
                            <input type="password" id="confirmPassword" class="form-control" placeholder="Repeat new password">
                        </div>
                    </div>
                    <div class="mt-3 text-end">
                        <button class="btn btn-dark px-4">Update Password</button>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Notification Preferences</h5>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="n1" checked>
                        <label class="form-check-label" for="n1">Order updates & shipping notifications</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="n2" checked>
                        <label class="form-check-label" for="n2">Promotions and special offers</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="n3">
                        <label class="form-check-label" for="n3">New product arrivals</label>
                    </div>
                    <div class="mt-3 text-end">
                        <button class="btn btn-dark px-4">Save Preferences</button>
                    </div>
                </div>
            </div>

            <div class="card border-danger shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-danger mb-2">Danger Zone</h5>
                    <p class="text-muted small mb-3">Permanently delete your account and all associated data. This action cannot be undone.</p>
                    <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container">
        <p class="mb-2">About Us | Contact</p>
        <p class="mb-0 text-muted small">&copy; 2026 ElectroHub</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
