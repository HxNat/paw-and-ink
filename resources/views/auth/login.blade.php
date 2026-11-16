<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Paw & Ink</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body class="auth-page">
    <main class="auth-card">
        <div class="peeking-cat">
            <img src="{{ asset('images/cat-peek.png') }}" alt="Cat Peeking">
        </div>
        <header class="auth-header">
            <div class="logo-icon">
            </div>
            <h1>Paw & <span class="text-green">Ink</span></h1>

            <p>Sign in to start your session</p>
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

        <form action="{{ route('login') }}" method="POST" class="auth-form login-form">
            @csrf

            <fieldset class="form-section">
                <legend class="sr-only">Account Credentials</legend>

                <div class="form-group">
                    <div class="input-wrapper input-right">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email"
                            required autocomplete="email">
                        <svg class="field-icon-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="16" x="2" y="4" rx="2" />
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                        </svg>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper input-right">
                        <input type="password" id="password" name="password" placeholder="Password" required
                            autocomplete="current-password">
                        <svg class="field-icon-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                        </svg>
                    </div>
                </div>
            </fieldset>

            <div class="form-footer-row">
                <div class="checkbox-group">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember Me</label>
                </div>

                <button type="submit" class="btn btn-primary">
                    Sign In
                    <img src="{{ asset('images/paws.svg') }}" alt="Paws" class="btn-icon-svg">
                </button>
            </div>
        </form>

        <div class="divider">
            <img src="{{ asset('images/paws.svg') }}" alt="Paws" class="divider-icon">
            <span>OR</span>
            <img src="{{ asset('images/paws.svg') }}" alt="Paws" class="divider-icon">
        </div>

        <menu class="social-menu">
            <a href="{{ route('social.redirect', 'facebook') }}" class="btn btn-facebook">
                <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg>
                Sign in using Facebook
            </a>
            <a href="{{ route('social.redirect', 'google') }}" class="btn btn-google">
                <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="#4285F4"
                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                    <path fill="#34A853"
                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                    <path fill="#FBBC05"
                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" />
                    <path fill="#EA4335"
                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" />
                </svg>
                Sign in using Google
            </a>
        </menu>

        <div class="card-links login-links">
            <a href="{{ route('password.request') }}" class="forgot-link">I forgot my password</a>
            <a href="{{ route('register') }}" class="register-link">Register a new membership &rarr;</a>
        </div>

        <div class="card-paw-watermark" aria-hidden="true">
            <span class="paw-pad main-pad"></span>
            <span class="paw-pad toe-1"></span>
            <span class="paw-pad toe-2"></span>
            <span class="paw-pad toe-3"></span>
            <span class="paw-pad toe-4"></span>
        </div>

        <footer class="auth-footer">
            <small>Paw & Ink v3.2 • Veterinary & Shelter Management</small>
        </footer>
    </main>
</body>

</html>