<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

@include('partials.navbar')

<main class="container my-auto py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="text-center mb-4">
                <h1 class="fw-bold">User Authentication</h1>
                <p class="text-muted">Please log in or register.</p>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex mb-4 gap-2">
                        <a href="{{ route('register') }}" class="btn btn-dark w-100">Sign Up</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-dark w-100">Log In</a>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger py-2">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h3 class="fw-bold text-center mb-4">Create Account</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold small">Full Name</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   id="name" name="name" value="{{ old('name') }}"
                                   placeholder="Enter your full name" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold small">Email</label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   id="email" name="email" value="{{ old('email') }}"
                                   placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold small">Password</label>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-bold small">Confirm Password</label>
                            <input type="password" class="form-control"
                                   id="password_confirmation" name="password_confirmation"
                                   placeholder="Repeat your password" required>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 fw-bold py-2">Register</button>
                    </form>

                    <div class="text-center mt-3 small">
                        Already have an account? <a href="{{ route('login') }}">Log in here</a>
                    </div>
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
</body>
</html>
