<!-- resources/views/emails/welcome-membership.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido al Club</title>
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
            /* Color principal de Visual Studio */
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
            /* Color principal de Visual Studio */
            font-size: 22px;
            margin-top: 0;
        }

        .welcome-message p {
            color: #555;
            font-size: 16px;
            margin-bottom: 0;
        }

        /* Detalles de membresía */
        .membership-details {
            background-color: #F3F2F8;
            /* Tono muy claro de morado */
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .membership-details h3 {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            margin-top: 0;
            font-size: 18px;
            border-bottom: 1px solid #E5E1F2;
            padding-bottom: 10px;
        }

        .membership-info {
            display: flex;
            margin-bottom: 15px;
        }

        .info-label {
            width: 40%;
            font-weight: 600;
            color: #444;
        }

        .info-value {
            width: 60%;
            color: #333;
        }

        /* Dirección de facturación */
        .billing-address {
            background-color: #F3F2F8;
            /* Tono muy claro de morado */
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .billing-address h3 {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            margin-top: 0;
            font-size: 18px;
            border-bottom: 1px solid #E5E1F2;
            padding-bottom: 10px;
        }

        .address-details {
            color: #333;
            line-height: 1.6;
        }

        /* Información de pago (corregida) */
        .payment-info {
            background-color: #F3F2F8;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .payment-info h3 {
            color: #5C2D91;
            margin-top: 0;
            font-size: 18px;
            border-bottom: 1px solid #E5E1F2;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .card-details {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .card-brand {
            color: #5C2D91;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .card-number {
            color: #444;
            font-size: 15px;
        }

        .payment-note {
            margin-top: 12px;
            font-size: 13px;
            color: #666;
            border-top: 1px solid #E5E1F2;
            padding-top: 12px;
        }

        /* Beneficios */
        .benefits {
            margin-bottom: 25px;
        }

        .benefits h3 {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            font-size: 18px;
            margin-top: 0;
        }

        .benefit-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 12px;
        }

        .benefit-icon {
            width: 24px;
            height: 24px;
            background-color: #E9E6F2;
            /* Tono claro de morado */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .benefit-icon span {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            font-weight: bold;
            font-size: 14px;
        }

        .benefit-text {
            flex-grow: 1;
        }

        /* Acceso */
        .access-section {
            background-color: #E9E6F2;
            /* Tono claro de morado */
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin-bottom: 25px;
        }

        .access-section h3 {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            margin-top: 0;
            font-size: 18px;
        }

        .access-button {
            display: inline-block;
            background-color: #5C2D91;
            /* Color principal de Visual Studio */
            color: white;
            padding: 12px 25px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 10px;
        }

        /* Contacto */
        .contact-section {
            text-align: center;
            margin-bottom: 10px;
        }

        .contact-section h3 {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            font-size: 16px;
            margin-bottom: 10px;
        }

        .contact-section p {
            margin: 5px 0;
            color: #555;
        }

        /* Footer */
        .footer {
            background-color: #2C2C32;
            /* Color oscuro de Visual Studio */
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 12px;
        }

        .footer p {
            margin: 5px 0;
            opacity: 0.8;
        }

        .social-links {
            margin-top: 15px;
        }

        .social-link {
            display: inline-block;
            width: 30px;
            height: 30px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            margin: 0 5px;
            line-height: 30px;
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Encabezado -->
        <div class="header">
            <h1>¡Bienvenido/a al Club!</h1>
            <p>Tu experiencia exclusiva comienza ahora</p>
        </div>

        <!-- Contenido -->
        <div class="content">
            <!-- Mensaje de bienvenida -->
            <div class="welcome-message">
                <h2>¡Hola {{ $dataNewMembershipEmail['client_name'] }}!</h2>
                <p>Estamos emocionados de darte la bienvenida como miembro oficial de nuestro club. Prepárate para
                    disfrutar de una experiencia única y beneficios exclusivos.</p>
            </div>

            <!-- Detalles de membresía -->
            <div class="membership-details">
                <h3>Detalles de tu Membresía</h3>

                <div class="membership-info">
                    <div class="info-label">Tipo de Membresía:</div>
                    <div class="info-value">{{ $dataNewMembershipEmail['membershipName'] }}</div>
                </div>

                <div class="membership-info">
                    <div class="info-label">Estado:</div>
                    <div class="info-value" style="color: #107C10; font-weight: bold;">Activo</div>
                </div>
            </div>

            <!-- Dirección de facturación -->
            <div class="billing-address">
                <h3>Dirección de Facturación</h3>
                <div class="address-details">
                    <p><strong>Dirección:</strong> {{ $dataNewMembershipEmail['direccion'] }}</p>
                    <p><strong>Ciudad:</strong> {{ $dataNewMembershipEmail['ciudad'] }}</p>
                </div>
            </div>

            <!-- Información de pago -->
            <div class="payment-info">
                <h3>Método de Pago</h3>
                <div class="card-details">
                    <div class="card-brand">
                        {{ strtoupper($dataNewMembershipEmail['card']['brand']) }}
                    </div>
                    <div class="card-number">
                        Tarjeta terminada en {{ substr($dataNewMembershipEmail['card']['maskedNumber'], -4) }}
                    </div>
                </div>
                <p class="payment-note">
                    Este método de pago se utilizará para los cargos recurrentes de tu membresía.
                </p>
            </div>

            <!-- Beneficios -->
            <div class="benefits">
                <h3>Tus Beneficios Exclusivos</h3>

                <div class="benefit-item">
                    <div class="benefit-icon"><span>✓</span></div>
                    <div class="benefit-text">Cashback del
                        {{ $dataNewMembershipEmail['membershipPercentage'] }}% en
                        todas tus compras
                    </div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon"><span>✓</span></div>
                    <div class="benefit-text">Acceso prioritario a nuevos productos y lanzamientos</div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon"><span>✓</span></div>
                    <div class="benefit-text">Invitaciones a eventos privados y catas especiales</div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon"><span>✓</span></div>
                    <div class="benefit-text">Atención personalizada con nuestros expertos</div>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon"><span>✓</span></div>
                    <div class="benefit-text">Envío gratuito en todos tus pedidos sin mínimo de compra</div>
                </div>
            </div>

            <!-- Contacto -->
            <div class="contact-section">
                <h3>¿Necesitas Ayuda?</h3>
                <p>Nuestro equipo de atención al cliente está disponible para ti:</p>
                <p>Email: soporte@tuempresa.com</p>
                <p>Teléfono: (123) 456-7890</p>
                <p>Horario: Lunes a Viernes, 9:00 AM - 6:00 PM</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© {{ date('Y') }} Club Amante de Vinos y Licores. Todos los derechos reservados.</p>
        </div>
    </div>
</body>

</html>
