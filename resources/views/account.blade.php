<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<x-storefront-navbar />

<main class="container my-5">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 text-center">
                    <div class="bg-dark text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width:60px;height:60px;">👤</div>
                    <h6 class="fw-bold mb-0">{{ Auth::user()->name }}</h6>
                    <p class="text-muted small">{{ Auth::user()->email }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-light"><a href="{{ url('/account') }}" class="text-decoration-none fw-bold text-dark">👤 My Account</a></li>
                    <li class="list-group-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link text-danger text-decoration-none p-0 w-100 text-start">🚪 Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9">
            <h2 class="fw-bold mb-4">My Account</h2>
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Personal Information</h5>
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
