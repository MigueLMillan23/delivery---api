<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            margin-top: 15px;
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        #mensaje {
            margin-top: 15px;
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Iniciar sesión</h1>
        <form id="loginForm">
            <label>Email:</label>
            <input type="email" id="email" required>

            <label>Contraseña:</label>
            <input type="password" id="password" required>

            <button type="submit">Entrar</button>
        </form>

        <p id="mensaje"></p>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            try {
                const response = await fetch('http://127.0.0.1:8000/api/login', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ email, password })
                });

                const data = await response.json();

                if (response.ok && data.token) {
                    localStorage.setItem('token', data.token);
                    alert('Inicio de sesión exitoso');
                    window.location.href = '/'; // Redirige al dashboard
                } else {
                    document.getElementById('mensaje').textContent = data.message || 'Error al iniciar sesión';
                }
            } catch (error) {
                document.getElementById('mensaje').textContent = 'Error de conexión con el servidor';
            }
        });
    </script>
</body>
</html>
