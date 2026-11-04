<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Password - Paw & Ink</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="auth-page">
    <main class="auth-card">
        <header class="auth-header">
            <div class="avatar-badge">🐢</div>
            <span class="badge">Paw & Ink AUTH</span>
            <p>You are only one step away from your new password, recover your password now.</p>
        </header>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('password.update') }}" method="POST" class="auth-form">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" readonly>
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" placeholder="New Password" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
            </div>

            <aside class="info-box">
                <p>🐾 Use at least 8 characters with a mix of letters, numbers, and symbols to keep your shelter vault safe.</p>
            </aside>

            <button type="submit" class="btn btn-primary btn-block">🐾 Change password</button>
        </form>

        <footer class="auth-footer">
            <p><a href="{{ route('login') }}">&larr; Login</a></p>
            <small>Paw & Ink Secure Shelter Management</small>
        </footer>
    </main>
</body>
</html>