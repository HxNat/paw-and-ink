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
        <div class="peeking-turtle">
            <img src="{{ asset('images/turtle-peek.png') }}" alt="Turtle Peeking">
        </div>
        <header class="auth-header">
            <h1>Paw & <span class="text-green">Ink </span><span class="badge">AUTH</span></h1>
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

            <input type="hidden" name="token" value="{{ $token ?? request()->route('token') }}">
            <input type="hidden" name="email" value="{{ $email ?? request('email') }}">

            <!-- New Password -->
            <div class="form-group">
                <label for="password">New Password</label>
                <div class="input-wrapper input-both-icons">
                    <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                        <circle cx="12" cy="16" r="1" />
                    </svg>

                    <input type="password" id="password" name="password" placeholder="New Password" required
                        autocomplete="new-password">

                    <button type="button" class="toggle-password-btn" data-target="password"
                        aria-label="Show or hide password">
                        <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <div class="input-wrapper input-both-icons">
                    <svg class="field-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                        <path d="M12 14.5v3" />
                        <path d="M10.5 16h3" />
                    </svg>

                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm Password" required autocomplete="new-password">

                    <button type="button" class="toggle-password-btn" data-target="password_confirmation"
                        aria-label="Show or hide confirm password">
                        <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </button>
                </div>
            </div>

            <aside class="info-box">
                <img src="{{ asset('images/paws.svg') }}" alt="Paws" class="info-box-icon">
                <p>Use at least 8 characters with a mix of letters, numbers, and symbols to keep your shelter vault
                    safe.</p>
            </aside>

            <button type="submit" class="btn btn-primary btn-block">
                <img src="{{ asset('images/paws.svg') }}" alt="Paws" class="btn-icon-svg">
                Change password
            </button>
        </form>

        <hr class="card-divider">

        <div class="reset-footer">
            <a href="{{ route('login') }}" class="reset-back-link">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5" />
                    <path d="m12 19-7-7 7-7" />
                </svg>
                Login
            </a>
            <small class="reset-subtitle">Paw & Ink Secure Shelter Management</small>
        </div>

        <div class="card-paw-watermark" aria-hidden="true">
            <span class="paw-pad main-pad"></span>
            <span class="paw-pad toe-1"></span>
            <span class="paw-pad toe-2"></span>
            <span class="paw-pad toe-3"></span>
            <span class="paw-pad toe-4"></span>
        </div>
    </main>


    <script>
        document.querySelectorAll('.toggle-password-btn').forEach(button => {
            button.addEventListener('click', () => {
                const input = document.getElementById(button.getAttribute('data-target'));
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                button.classList.toggle('active', isPassword);
            });
        });
    </script>
</body>

</html>