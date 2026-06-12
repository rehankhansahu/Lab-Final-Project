<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Event Volunteer Manager')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <i class="bi bi-people-fill me-2"></i>Event Volunteer Manager
        </a>
        <div class="d-flex gap-2">
            <a href="{{ route('volunteer.login') }}" class="btn btn-outline-light btn-sm">Volunteer Login</a>
            <a href="{{ route('volunteer.register') }}" class="btn btn-light btn-sm">Register</a>
            <a href="{{ route('admin.login') }}" class="btn btn-dark btn-sm">Admin</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <small>&copy; {{ date('Y') }} Event Volunteer Manager. All rights reserved.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>