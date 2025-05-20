<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Desa Wisata - @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e0f2fe;
            color: #333;
        }

        /* Navbar styling */
        .navbar {
            background: linear-gradient(90deg, #1e3a8a 0%, #3b82f6 100%);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            font-weight: 600;
            letter-spacing: 0.05em;
        }

        .navbar-brand {
            color: #fff !important;
            font-size: 1.6rem;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: #bfdbfe !important;
            text-decoration: none;
        }

        .navbar-nav .nav-link {
            color: #e0f2fe;
            font-weight: 500;
            transition: color 0.3s ease, transform 0.2s ease;
            margin-left: 1rem;
            position: relative;
        }

        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:hover {
            color: #bfdbfe;
            transform: scale(1.1);
        }

        .navbar-toggler {
            border: none;
            outline: none;
            filter: brightness(0) invert(1);
        }

        /* Dropdown menu style */
        .dropdown-menu {
            border-radius: 6px;
            box-shadow: 0 6px 15px rgba(59, 130, 246, 0.3);
        }

        .dropdown-item {
            color: #1e3a8a;
            font-weight: 500;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #3b82f6;
            color: #fff;
        }

        .btn-outline-light {
            color: #e0f2fe;
            border-color: #bfdbfe;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-outline-light:hover {
            background-color: #bfdbfe;
            color: #1e3a8a;
            border-color: #3b82f6;
        }

        /* Container spacing */
        .container {
            max-width: 1140px;
        }

        /* Content spacing */
        main {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        /* Footer */
        footer {
            padding: 1.5rem 0;
            text-align: center;
            color: #333;
            font-size: 0.9rem;
            background: #bfdbfe;
            margin-top: 3rem;
            border-top: 1px solid #3b82f6;
        } 
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">Desa Wisata</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <!-- custom toggler icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" class="bi bi-list"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-4a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm0-4a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11z" />
                </svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Paket Wisata</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Berita</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Reservasi</a></li>

                    {{-- Profil Section --}}
                    @if (!Auth::check())
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle btn btn-outline-light px-3 py-1 rounded-pill" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Akun
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item"
                                        href="{{ Route::has('login') ? route('login') : '#' }}">Login</a></li>
                                @if (Route::has('register'))
                                    <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                @endif
                            </ul>
                        </li>
                    @else
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle btn btn-outline-light px-3 py-1 rounded-pill" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name ?? 'Profil' }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="px-3 py-2">
                                        @csrf
                                        <button type="submit" class="btn btn-danger w-100">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>

            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        © 2025 Desa Wisata. All rights reserved.
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
