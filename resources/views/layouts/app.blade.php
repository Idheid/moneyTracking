<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Money Tracking')</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .navbar-gradient {
            background: linear-gradient(135deg, #1E3A8A, #3B82F6);
            border-bottom: 3px solid #0A2472;
            color: #fff !important;
            transition: all 0.3s ease;
        }

        .navbar-gradient .navbar-brand {
            color: #fff !important;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .navbar-gradient .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .navbar-gradient .nav-link:hover,
        .navbar-gradient .navbar-brand:hover {
            color: #E0E7FF !important;
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.4);
        }

        .navbar-gradient .dropdown-menu {
            background-color: #fff;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .navbar-gradient .dropdown-item:hover {
            background-color: #f1f5ff;
            color: #1E3A8A;
        }

        body {
            background-color: #F7F7FB;
        }

        main.container {
            margin-top: 2rem;
        }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark navbar-gradient">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Money Tracking</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('incomes.index') }}">Pemasukan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('expenses.index') }}">Pengeluaran</a>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDrop" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ url('/logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="GET" class="d-none">@csrf</form>
                            </li>
                        </ul>
                    </li>
                @endauth

                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<main class="container my-4">
    @yield('content')
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>