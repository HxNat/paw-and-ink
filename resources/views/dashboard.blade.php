<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Paw & Ink</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="auth-page">
    <main class="auth-card">
        <header class="auth-header">
            <div class="logo-icon">
                <img src="{{ asset('images/paws.svg') }}" alt="Paw Logo" class="header-icon-svg">
            </div>
            <h1>Paw & <span class="text-green">Ink</span></h1>
            <p>Welcome, <strong>{{ Auth::user()->name }}</strong></p>
        </header>

        <div class="alert alert-success">
            Sesión iniciada correctamente con el correo: {{ Auth::user()->email }}
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary btn-block">
                Cerrar Sesión
            </button>
        </form>
    </main>
</body>
</html>