@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div style="max-width:400px; margin:100px auto; padding:30px; background:white; border-radius:10px; box-shadow:0 4px 15px rgba(0,0,0,0.1);">
    <h2 style="text-align:center; margin-bottom:20px; color:#1e40af;">Iniciar Sesión</h2>

    <form id="loginForm">
        <label style="font-weight:bold;">Email:</label><br>
        <input type="email" id="email" style="width:100%; padding:10px; margin-bottom:15px; border-radius:5px; border:1px solid #ccc;"><br>

        <label style="font-weight:bold;">Contraseña:</label><br>
        <input type="password" id="password" style="width:100%; padding:10px; margin-bottom:20px; border-radius:5px; border:1px solid #ccc;"><br>

        <button type="submit" style="width:100%; padding:12px; background:#1e40af; color:white; border:none; border-radius:5px; font-weight:bold; cursor:pointer;">
            Ingresar
        </button>
    </form>

    <p id="loginError" style="color:red; text-align:center; margin-top:15px;"></p>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    axios.post('{{ url("api/login") }}', { email, password })
        .then(response => {
            localStorage.setItem('token', response.data.token);
            window.location.href = "{{ route('dashboard') }}";
        })
        .catch(error => {
            document.getElementById('loginError').innerText = "Credenciales inválidas.";
        });
});
</script>
@endsection
