<!-- resources/views/emails/membership-auto-renewal.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Membresía Ha Sido Renovada</title>
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

        .renewal-message {
            text-align: center;
            margin-bottom: 30px;
        }

        .renewal-message h2 {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            font-size: 22px;
            margin-top: 0;
        }

        .renewal-message p {
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
            margin-bottom: 15px;
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

        /* Detalles de pago */
        .payment-details {
            background-color: #E9E6F2;
            /* Tono claro de morado */
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .payment-details h3 {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            margin-top: 0;
            font-size: 18px;
            border-bottom: 1px solid #E5E1F2;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .payment-amount {
            font-size: 24px;
            font-weight: bold;
            color: #5C2D91;
            /* Color principal de Visual Studio */
            margin: 15px 0;
            text-align: center;
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
            padding: 10px;
            border-radius: 6px;
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

        /* Método de pago */
        .payment-info {
            background-color: #F3F2F8;
            /* Tono muy claro de morado */
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .payment-info h3 {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            margin-top: 0;
            font-size: 18px;
            border-bottom: 1px solid #E5E1F2;
            padding-bottom: 10px;
            margin-bottom: 15px;
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

        .card-details {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .card-brand {
            color: #5C2D91;
            /* Color principal de Visual Studio */
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

        /* Acciones */
        .actions {
            text-align: center;
            margin-bottom: 25px;
        }

        .actions h3 {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            font-size: 18px;
            margin-top: 0;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }

        .action-button {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            text-align: center;
        }

        .primary-button {
            background-color: #5C2D91;
            /* Color principal de Visual Studio */
            color: white;
        }

        .secondary-button {
            background-color: #f3f3f3;
            color: #333;
            border: 1px solid #ddd;
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

        /* Recibo */
        .receipt {
            border: 1px solid #E5E1F2;
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
        }

        .receipt-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .receipt-row:last-child {
            border-bottom: none;
            font-weight: bold;
        }

        .receipt-label {
            color: #555;
        }

        .receipt-value {
            color: #333;
        }

        /* Próxima renovación */
        .next-renewal {
            background-color: #F8F7FC;
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
            text-align: center;
            border: 1px dashed #E5E1F2;
        }

        .next-renewal p {
            margin: 5px 0;
            color: #555;
        }

        .next-renewal .date {
            font-weight: bold;
            color: #5C2D91;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Encabezado -->
        <div class="header">
            <h1>Tu Membresía Ha Sido Renovada</h1>
            <p>Gracias por seguir siendo parte de nuestro club</p>
        </div>

        <!-- Contenido -->
        <div class="content">
            <!-- Mensaje de renovación -->
            <div class="renewal-message">
                <h2>¡Hola {{ $dataRenewalMembershipEmail['client_name'] }}!</h2>
                <p>Te informamos que tu membresía ha sido renovada automáticamente. Seguirás disfrutando de todos los
                    beneficios exclusivos de nuestro club.</p>
            </div>

            <!-- Detalles de membresía -->
            <div class="membership-details">
                <h3>Detalles de tu Membresía</h3>

                <div class="membership-info">
                    <div class="info-label">Tipo de Membresía:</div>
                    <div class="info-value">{{ $dataRenewalMembershipEmail['membershipName'] }}</div>
                </div>

                <div class="membership-info">
                    <div class="info-label">Estado:</div>
                    <div class="info-value" style="color: #107C10; font-weight: bold;">Renovada</div>
                </div>
            </div>

            <!-- Dirección de facturación -->
            <div class="billing-address">
                <h3>Dirección de Facturación</h3>
                <div class="address-details">
                    <p><strong>Dirección:</strong> {{ $dataRenewalMembershipEmail['direccion'] }}</p>
                    <p><strong>Ciudad:</strong> {{ $dataRenewalMembershipEmail['ciudad'] }}</p>
                </div>
            </div>

            <!-- Método de pago -->
            <div class="payment-info">
                <h3>Método de Pago Utilizado</h3>
                <div class="card-details">
                    <div class="card-brand">
                        {{ strtoupper($dataRenewalMembershipEmail['card']['brand']) }}
                    </div>
                    <div class="card-number">
                        Tarjeta terminada en {{ substr($dataRenewalMembershipEmail['card']['maskedNumber'], -4) }}
                    </div>
                </div>
                <p class="payment-note">
                    Este método de pago se utilizará para los futuros cargos recurrentes de tu membresía.
                </p>
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
