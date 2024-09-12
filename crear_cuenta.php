<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            position: relative;
            width: 800px;
            height: 500px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .form-container {
            position: absolute;
            top: 0;
            width: 50%;
            height: 100%;
            transition: transform 0.6s ease-in-out;
        }

        .login-form, .register-form {
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .form-container input {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            padding: 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .overlay-container {
            position: absolute;
            width: 50%;
            height: 100%;
            right: 0;
            top: 0;
            background-color: #007bff;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            transition: transform 0.6s ease-in-out;
        }

        .overlay-container h2 {
            margin-bottom: 20px;
        }

        .overlay-container button {
            padding: 15px;
            background-color: transparent;
            border: 2px solid white;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        .overlay-container button:hover {
            background-color: white;
            color: #007bff;
        }

        /* Estados para mostrar login o registro */
        .container.right-panel-active .login-form {
            transform: translateX(100%);
        }

        .container.right-panel-active .register-form {
            transform: translateX(100%);
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }
    </style>
</head>
<>
    <div class="container" id="container">
        <div class="form-container login-form">
            <form action="procesar_login.php" method="POST">
                <h2>Iniciar Sesión</h2>
                <input type="email" placeholder="Correo Electrónico" required>
                <input type="password" placeholder="Contraseña" required>
                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>
        <div class="form-container register-form">
            <form method="POST">
                <h2>Crear Cuenta</h2>
                <input type="text" name="Nombre" placeholder="Nombre" required>
                <input type="text" name="Apellidos" placeholder="Apellidos" required>
                <input type="date" name="Fecha_nac" placeholder="Fecha de Nacimiento" required>
                <input type="email" name="Correo" placeholder="Correo Electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit" name="enviar">Crear Cuenta</button>
            </form>
        </div>
        <div class="overlay-container">
            <h2>¿Ya tienes una cuenta?</h2>
            <button id="loginBtn">Iniciar Sesión</button>
            <h2>¿Eres nuevo?</h2>
            <button id="registerBtn">Crear Cuenta</button>
        </div>
    </div>

<?php
    include('./php/register.php');
?>

    <script>
        const container = document.getElementById('container');
        const loginBtn = document.getElementById('loginBtn');
        const registerBtn = document.getElementById('registerBtn');

        registerBtn.addEventListener('click', () => {
            container.classList.toggle('right-panel-active');
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });
    </script>
</body>
</html>
