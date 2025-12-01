<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body style="margin:0; font-family:sans-serif; background:#f9fafb;">

    <!-- Navbar -->
    <nav style="background:#1e40af; padding:10px; color:white; display:flex; justify-content:space-between; align-items:center;">
        <div>
            <a href="{{ route('dashboard') }}" style="color:white; text-decoration:none; margin-right:15px;">Dashboard</a>
            <a href="{{ route('login') }}" style="color:white; text-decoration:none;">Login</a>
        </div>
        <div>
            <button onclick="logout()" style="background:#f87171; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">Cerrar sesión</button>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container" style="padding:20px;">
        @yield('content')
    </div>

    <script>
        function logout() {
            localStorage.removeItem('token');
            window.location.href = "{{ route('login') }}";
        }
    </script>
</body>
</html>
