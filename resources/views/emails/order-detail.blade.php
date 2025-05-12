<!-- resources/views/emails/order-confirmed.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pedido</title>
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
            margin: 0 auto;
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
            padding: 25px 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        /* Contenido */
        .content {
            padding: 30px 25px;
        }

        .content h1 {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            font-size: 24px;
            margin-top: 0;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
        }

        .content h3 {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            margin-top: 25px;
            margin-bottom: 15px;
        }

        /* Tabla de productos */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border: 1px solid #e0e0e0;
        }

        th {
            background-color: #5C2D91;
            /* Color principal de Visual Studio */
            color: white;
            font-weight: normal;
            padding: 12px 10px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 12px 10px;
            border-bottom: 1px solid #e0e0e0;
            vertical-align: middle;
        }

        tr:nth-child(even) {
            background-color: #F3F2F8;
            /* Tono más claro de morado */
        }

        tr:hover {
            background-color: #E9E6F2;
            /* Tono aún más claro para hover */
        }

        /* Totales */
        .totals {
            background-color: #F3F2F8;
            /* Tono más claro de morado */
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: right;
        }

        .totals p {
            margin: 5px 0;
            font-size: 16px;
        }

        .total {
            color: #5C2D91;
            /* Color principal de Visual Studio */
            font-size: 18px;
            font-weight: bold;
        }

        /* Información de contacto y dirección */
        .info-section {
            background-color: #F3F2F8;
            /* Tono más claro de morado */
            padding: 15px;
            border-radius: 5px;
            margin-top: 25px;
            border-left: 4px solid #5C2D91;
            /* Color principal de Visual Studio */
        }

        .info-section h3 {
            margin-top: 0;
            color: #5C2D91;
            /* Color principal de Visual Studio */
        }

        .info-section p {
            margin: 5px 0;
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
        }

        .footer a {
            color: #B180D7;
            /* Color de enlace en morado claro */
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media only screen and (max-width: 600px) {
            .container {
                width: 100%;
                border-radius: 0;
            }

            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 8px 5px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>¡Pago Exitoso!</h1>
        </div>

        <div class="content">
            <h1>Gracias por tu compra.</h1>

            <h3>Detalle de orden:</h3>

            <table width="100%" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Imagen</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataEmail['products'] as $product)
                        <tr>
                            <td>{{ $product['name'] }}</td>
                            <td style="text-align: center;">
                                @if ($product['image_path'])
                                    <img src="{{ $message->embed(public_path('storage/' . $product['image_path'])) }}"
                                        width="80" alt="Producto" style="border-radius: 4px;">
                                @else
                                    <span style="color: #999;">Sin imagen</span>
                                @endif
                            </td>
                            <td style="text-align: center;">{{ $product['amount'] }}</td>
                            <td>${{ number_format($product['unit_price'], 2) }}</td>
                            <td>${{ number_format($product['subtotal_item'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="totals">
                <p><strong>Subtotal:</strong> ${{ number_format($dataEmail['subtotal'], 2) }}</p>
                <p class="total"><strong>Total:</strong> ${{ number_format($dataEmail['total'], 2) }}</p>
            </div>

            <div class="info-section">
                <h3>Información de contacto:</h3>
                <p>
                    <strong>Cliente:</strong> {{ $dataEmail['client_name'] }}<br>
                    <strong>Teléfono celular:</strong> {{ $dataEmail['client_phone'] }}
                </p>
            </div>

            <div class="info-section">
                <h3>Dirección de entrega:</h3>
                <p>
                    <strong>Calle:</strong> {{ $dataEmail['address']['street'] }}, No.
                    {{ $dataEmail['address']['number'] }}<br>
                    <strong>Colonia:</strong> {{ $dataEmail['address']['neighborhood'] }}<br>
                    <strong>Referencia:</strong> {{ $dataEmail['address']['reference'] }}<br>
                    <strong>Distrito:</strong> {{ $dataEmail['address']['district'] }}
                </p>
            </div>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} Club Amante de Vinos y Licores. Todos los derechos reservados.</p>
        </div>
    </div>
</body>

</html>
