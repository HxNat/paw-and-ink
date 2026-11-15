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
        <div class="peeking-puppy">
            <img src="{{ asset('images/puppy-peek.png') }}" alt="Puppy Peeking">
        </div>
        <header class="auth-header">
            <div class="logo-icon"></div>
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
                    <span class="badge1">Authorized staff</span>
                </div>
                <div class="input-wrapper">
                    <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="16" x="2" y="4" rx="2" />
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    </svg>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Enter your registered email" required autocomplete="email">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    <img src="{{ asset('images/paws.svg') }}" alt="Paws" class="btn-icon-svg">
                    Request new password
                </button>
        </form>

        <div class="card-links">
            <a href="{{ route('login') }}" class="back-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5" />
                    <path d="m12 19-7-7 7-7" />
                </svg>
                Back to Login
            </a>
        </div>

        <div class="card-bottom-bar">
            <span class="status-item">
                <span class="status-dot"></span>
                Paw & Ink Operations
            </span>

            <span class="helpdesk-item">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 18v-6a9 9 0 0 1 18 0v6" />
                    <path
                        d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z" />
                </svg>
                Helpdesk Desk
            </span>
        </div>

        <div class="card-bubbles" aria-hidden="true">
            <span class="bubble b1"></span>
            <span class="bubble b2"></span>
            <span class="bubble b3"></span>
            <span class="bubble b4"></span>
        </div>
    </main>
</body>

</html>