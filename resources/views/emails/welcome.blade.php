<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Amantes del Vino y Licores</title>
    <style>
        /* Estilos base */
        body {
            font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        /* Contenedor principal */
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Encabezado */
        .header {
            background-color: #5C2D91;
            color: white;
            padding: 30px 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }

        .header p {
            margin: 10px 0 0;
            font-size: 16px;
            opacity: 0.9;
        }

        /* Contenido */
        .content {
            padding: 30px 25px;
        }

        .welcome-message {
            text-align: center;
            margin-bottom: 30px;
        }

        .welcome-message h2 {
            color: #5C2D91;
            font-size: 22px;
            margin-top: 0;
        }

        .welcome-message p {
            color: #555;
            font-size: 16px;
            margin-bottom: 0;
        }

        /* Detalles de acceso */
        .access-details {
            background-color: #F3F2F8;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .access-details h3 {
            color: #5C2D91;
            margin-top: 0;
            font-size: 18px;
            border-bottom: 1px solid #E5E1F2;
            padding-bottom: 10px;
        }

        .password-box {
            background-color: white;
            border: 1px solid #E5E1F2;
            border-radius: 4px;
            padding: 15px;
            margin: 15px 0;
            text-align: center;
        }

        .password {
            font-size: 24px;
            font-weight: bold;
            color: #5C2D91;
            letter-spacing: 1px;
        }

        .password-note {
            margin-top: 12px;
            font-size: 13px;
            color: #666;
        }

        /* Acceso */
        .access-section {
            background-color: #E9E6F2;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin-bottom: 25px;
        }

        .access-section h3 {
            color: #5C2D91;
            margin-top: 0;
            font-size: 18px;
        }

        .access-button {
            display: inline-block;
            background-color: #5C2D91;
            color: white;
            padding: 12px 25px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 10px;
        }

        /* Footer */
        .footer {
            background-color: #2C2C32;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 12px;
        }

        .footer p {
            margin: 5px 0;
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Encabezado -->
        <div class="header">
            <h1>¡Bienvenido/a!</h1>
            <p>Su cuenta ha sido creada exitosamente</p>
        </div>

        <!-- Contenido -->
        <div class="content">

            <!-- Mensaje de bienvenida -->
            <div class="welcome-message">
                <h2>¡Hola Estimado/a {{ $dataEmail['username'] }}</h2>
                <p>Nos complace darle la bienvenida. Su cuenta ha sido creada exitosamente y ya puede acceder a nuestros servicios en línea.</p>
            </div>

            <!-- Detalles de acceso -->
            <div class="access-details">
                <h3>Credenciales de Acceso</h3>
                <p>A continuación, encontrará su contraseña de acceso temporal:</p>
                
                <div class="password-box">
                    <div class="password">{{ $dataEmail['password'] }}</div>
                </div>
                
                <p class="password-note">
                    Por razones de seguridad, le recomendamos cambiar esta contraseña después de su primer inicio de sesión.
                </p>
            </div>

            <!-- Sección de acceso -->
            <div class="access-section">
                <h3>Acceda a su Cuenta Ahora</h3>
                <p>Haga clic en el botón a continuación para iniciar sesión en nuestro sistema:</p>
                <a href="" class="access-button">Iniciar Sesión</a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2025 Club Amantes del Vino y Licores. Todos los derechos reservados.</p>
            <p>Este es un correo electrónico automático, por favor no responda a este mensaje.</p>
        </div>
    </div>
</body>

</html>