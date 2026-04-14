<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - ElectroHub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center min-vh-100">
<div class="container" style="max-width:520px;">
  <div class="card shadow-sm border-0">
    <div class="card-body p-4">
      <h3 class="fw-bold mb-3">Crear cuenta</h3>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
      @endif

      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Confirmar password</label>
          <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button class="btn btn-dark w-100">Registrarme</button>
      </form>

      <div class="text-center mt-3 small">
        ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>
