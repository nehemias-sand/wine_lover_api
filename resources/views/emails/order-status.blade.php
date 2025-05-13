<!-- resources/views/emails/order-status.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado de tú Orden</title>
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
            padding: 20px;
        }

        /* Separador */
        .divider {
            height: 1px;
            background-color: #e0e0e0;
            margin: 15px 0;
        }

        /* Encabezado */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            font-size: 24px;
            margin: 15px 0 5px;
        }

        .header p {
            margin: 5px 0;
            color: #555;
        }

        /* Caja de estado principal */
        .status-box {
            background-color: #2C2C32;
            /* Color oscuro de Visual Studio */
            color: white;
            padding: 20px;
            border-radius: 6px;
            margin: 20px 0;
            text-align: center;
        }

        .status-box h2 {
            margin: 0 0 5px;
            font-size: 18px;
            font-weight: normal;
        }

        .status-box p {
            margin: 5px 0;
            font-size: 14px;
        }

        .order-status {
            margin-top: 15px;
            text-align: center;
        }

        .status-text {
            font-size: 18px;
            font-weight: bold;
            margin-top: 5px;
        }

        /* Estado de envío */
        .shipment-status {
            margin: 20px 0;
            text-align: center;
        }

        .shipment-status h3 {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            font-size: 16px;
            margin-bottom: 10px;
        }

        /* Estilos para los diferentes estados */
        .status-pill {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 500;
        }

        /* Colores específicos para cada estado */
        .status-procesando {
            background-color: #E9E6F2;
            /* Fondo morado claro */
            color: #5C2D91;
            /* Texto morado */
        }

        .status-listo {
            background-color: #E5F1FB;
            /* Fondo azul claro */
            color: #0078D7;
            /* Texto azul */
        }

        .status-ruta {
            background-color: #FEF2EA;
            /* Fondo naranja claro */
            color: #F7630C;
            /* Texto naranja */
        }

        .status-entregado {
            background-color: #E7F6E7;
            /* Fondo verde claro */
            color: #107C10;
            /* Texto verde */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="divider"></div>

        <!-- Encabezado -->
        <div class="header">
            <h1>Tracking de orden</h1>
            <p>Hola {{ $dataOrderStatusEmail['client_name'] }},</p>
            <p>Te compartimos el tracking de tú orden</p>
        </div>

        @php
            $status = $dataOrderStatusEmail['order_status'];
            $statusClass = '';

            switch ($status) {
                case 'Procesando':
                    $statusClass = 'status-procesando';
                    $statusColor = '#5C2D91'; // Morado
                    break;
                case 'Listo para entregar':
                    $statusClass = 'status-listo';
                    $statusColor = '#0078D7'; // Azul
                    break;
                case 'En ruta':
                    $statusClass = 'status-ruta';
                    $statusColor = '#F7630C'; // Naranja
                    break;
                case 'Entregado':
                    $statusClass = 'status-entregado';
                    $statusColor = '#107C10'; // Verde
                    break;
                default:
                    $statusClass = 'status-procesando';
                    $statusColor = '#5C2D91'; // Morado por defecto
            }
        @endphp

        <!-- Caja de estado principal -->
        <div class="status-box">
            <h2>Código de orden: {{ $dataOrderStatusEmail['code'] }}</h2>
            <p>Pedido realizado: {{ $dataOrderStatusEmail['order_date']->format('d/m/Y') }}</p>

            <div class="order-status">
                <p>Estado de la orden:</p>
                <!-- Solo el texto del estado con el color correspondiente -->
                <span class="status-text" style="color: {{ $statusColor }};">{{ $status }}</span>
            </div>
        </div>

        <!-- Estado de envío -->
        <div class="shipment-status">
            <h3>Estado de Shipment:</h3>
            <div class="status-pill {{ $statusClass }}">
                {{ $status }}
            </div>
        </div>
    </div>
</body>

</html>
