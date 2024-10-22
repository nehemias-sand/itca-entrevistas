<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 600px;
            height: auto;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
        }

        .password-box {
            background-color: #e8f0fe;
            border: 1px solid #8e2117;
            border-radius: 4px;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
        }

        .password {
            font-size: 24px;
            font-weight: bold;
            color: #8e2117;
        }

        .login-button {
            display: block;
            width: 100px;
            margin: 30px auto;
            padding: 15px 25px;
            background-color: #8e2117;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #3367d6;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="{{ $message->embed('images/logo.png') }}" alt="ITCA-FEPADE">
        </div>
        <h1>¡Bienvenido!</h1>
        <p>Estimado/a {{ $dataEmail['username'] }},</p>
        <p>Nos complace darle la bienvenida. Su cuenta ha sido creada exitosamente y ya puede acceder a nuestra plataforma de entrevistas.</p>
        <p>A continuación, encontrará su contraseña de acceso temporal:</p>
        <div class="password-box">
            <p>Su contraseña es:</p>
            <p class="password">{{ $dataEmail['password'] }}</p>
        </div>
        <p>Por razones de seguridad, le recomendamos cambiar esta contraseña después de su primer inicio de sesión.</p>
        <a href="{{ env('REDIRECT_LOGIN') }}" class="login-button">Login</a>
        <p>Si tiene alguna pregunta o necesita asistencia, no dude en ponerse en contacto con el administrador.</p>
        <p>¡Le deseamos una excelente experiencia!</p>
        <p>Atentamente,<br>ITCA-FEPADE</p>
        <div class="footer">
            <p>Este es un correo electrónico automático, por favor no responda a este mensaje.</p>
            <p>&copy; 2024 ITCA-FEPADE. Todos los derechos reservados.</p>
        </div>
    </div>
</body>

</html>