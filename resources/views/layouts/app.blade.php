<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        nav {
            margin-bottom: 20px;
        }
    .nav-link.active {
        border-bottom: 3px solid green;
    }

    </style>
</head>
<body>
   <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container py-3">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('products.index') }}">Laravel Product Management Systems</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }} text-dark fw-semibold" 
               href="{{ route('products.index') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('shop') ? 'active' : '' }} text-dark fw-semibold" 
               href="{{ route('shop') }}">Shop</a>
        </li>
    </ul>
</div>
    </div>
</nav>

    <!-- Main Content -->
    <main class="container">
        @yield('content')
    </main>

 <!-- Footer -->
<footer class="bg-white text-center py-4 border-top mt-5">
    <p class="mb-0 text-muted">© {{ date('Y') }} Product Management App. All rights reserved.</p>
</footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
