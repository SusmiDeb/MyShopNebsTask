<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Hustle Register</title>
    <link rel="icon" type="image/png" href="{{ asset('image/logo/eHustle icon.png') }}">

    {{-- Early theme boot: default = dark, prevents flash --}}
    <script>
        (function() {
            const saved = localStorage.getItem('theme');
            const theme = (saved === 'light' || saved === 'dark') ? saved : 'dark';
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>

    <link rel="stylesheet" href="{{ asset('css/auth/style.css') }}">
</head>

<body>
    <!-- Theme toggle -->
    <button id="themeToggle" class="theme-toggle" aria-label="Toggle theme">☀️</button>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo-theme">
                    {{-- light & dark version (transparent PNG/SVG) --}}
                    {{-- light & dark version (transparent PNG/SVG) --}}
                    <img class="logo-light" src="{{ asset('images/logo/eHustle Logo.jpg') }}" alt="eHustle"
                        width="60%">
                    <img class="logo-dark " src="{{ asset('images/logo/1757765669_1219.png') }}" alt="eHustle"
                        width="60%">
                </div>
            </div>

            <form method="POST" action="{{ route('register') }}" class="login-form" id="registerForm" novalidate>
                @csrf

                {{-- Name --}}
                <div class="input-group">
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        autocomplete="name" placeholder=" ">
                    <label for="name">Name</label>
                    <span class="input-border"></span>
                    <span class="error-message">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                {{-- Email --}}
                <div class="input-group">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        autocomplete="username" placeholder=" ">
                    <label for="email">Email address</label>
                    <span class="input-border"></span>
                    <span class="error-message">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                {{-- Password --}}
                <div class="input-group">
                    <input type="password" id="password" name="password" required autocomplete="new-password"
                        placeholder=" ">
                    <label for="password">Password</label>
                    <button type="button" class="password-toggle" id="passwordToggle"
                        aria-label="Toggle password visibility">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                            <path
                                d="M8 3C4.5 3 1.6 5.6 1 8c.6 2.4 3.5 5 7 5s6.4-2.6 7-5c-.6-2.4-3.5-5-7-5zm0 8.5A3.5 3.5 0 118 4.5a3.5 3.5 0 010 7zm0-5.5a2 2 0 100 4 2 2 0 000-4z"
                                fill="currentColor" />
                        </svg>
                    </button>
                    <span class="input-border"></span>
                    <span class="error-message">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                {{-- Confirm Password --}}
                <div class="input-group">
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        autocomplete="new-password" placeholder=" ">
                    <label for="password_confirmation">Confirm Password</label>
                    <button type="button" class="password-toggle" id="confirmToggle"
                        aria-label="Toggle confirm password visibility">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                            <path
                                d="M8 3C4.5 3 1.6 5.6 1 8c.6 2.4 3.5 5 7 5s6.4-2.6 7-5c-.6-2.4-3.5-5-7-5zm0 8.5A3.5 3.5 0 118 4.5a3.5 3.5 0 010 7zm0-5.5a2 2 0 100 4 2 2 0 000-4z"
                                fill="currentColor" />
                        </svg>
                    </button>
                    <span class="input-border"></span>
                    <span class="error-message">
                        @error('password_confirmation')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <button type="submit" class="submit-btn" id="registerBtn">
                    <span class="btn-text">Create account</span>
                    <div class="btn-loader" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <circle cx="9" cy="9" r="7" stroke="currentColor" stroke-width="2"
                                opacity="0.25" />
                            <path d="M16 9a7 7 0 01-7 7" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round">
                                <animateTransform attributeName="transform" type="rotate" dur="1s"
                                    values="0 9 9;360 9 9" repeatCount="indefinite" />
                            </path>
                        </svg>
                    </div>
                </button>
            </form>

            <div class="divider"><span>or continue with</span></div>
            <div class="social-buttons">
                <a href="{{ route('google.redirect') }}" class="social-btn" aria-label="Continue with Google">
                    <svg width="16" height="16" viewBox="0 0 16 16" aria-hidden="true">
                        <path fill="#4285F4"
                            d="M15.68 8.18c0-.5-.04-.99-.12-1.46H8v2.77h4.3a3.68 3.68 0 01-1.59 2.41v1.99h2.57c1.5-1.38 2.4-3.42 2.4-5.71z" />
                        <path fill="#34A853"
                            d="M8 16c2.16 0 3.98-.72 5.31-1.95l-2.57-1.99c-.71.48-1.62.77-2.74.77-2.11 0-3.89-1.42-4.53-3.33H.8v2.1C2.11 14.3 4.86 16 8 16z" />
                        <path fill="#FBBC05" d="M3.47 9.5a4.8 4.8 0 010-3L.8 4.4a8 8 0 000 7.2l2.67-2.1z" />
                        <path fill="#EA4335"
                            d="M8 3.1c1.17 0 2.22.4 3.05 1.18l2.29-2.28C12 0.75 10.16 0 8 0 4.86 0 2.11 1.7.8 4.2l2.67 2.1C4.11 4.4 5.89 3.1 8 3.1z" />
                    </svg>
                    Google
                </a>
            </div>

            <div class="signup-link">
                <span>Already have an account? </span>
                <a href="{{ route('login') }}">Sign in</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/auth/script.js') }}"></script>
</body>

</html>
