<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Paw & Ink</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="auth-page">
    <main class="auth-card">
        <header class="auth-header">
            <div class="avatar-badge">🐶</div>
            <span class="badge">ACCESS RECOVERY</span>
            <h1>Forgot Password?</h1>
            <p>Enter your email and we'll send you a link to reset your Paw & Ink admin account credentials.</p>
        </header>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST" class="auth-form">
            @csrf

            <div class="form-group">
                <div class="label-row">
                    <label for="email">Work Email Address</label>
                    <span class="sub-label">Authorized staff</span>
                </div>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your registered email" required autocomplete="email">
            </div>

            <button type="submit" class="btn btn-primary btn-block">🐾 Request new password</button>
        </form>

        <footer class="auth-footer">
            <p><a href="{{ route('login') }}">&larr; Back to Login</a></p>
            <div class="footer-meta">
                <span>Paw & Ink Operations</span>
                <span>Helpdesk Desk</span>
            </div>
        </footer>
    </main>
</body>
</html>