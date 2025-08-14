<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmación de Cotización - Maquimotora</title>
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
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #dc2626;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #dc2626;
            margin-bottom: 10px;
        }
        .subtitle {
            color: #666;
            font-size: 16px;
        }
        .content {
            margin-bottom: 30px;
        }
        .greeting {
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }
        .info-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #dc2626;
        }
        .info-title {
            font-weight: bold;
            color: #dc2626;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .info-item {
            margin: 8px 0;
            display: flex;
            justify-content: space-between;
        }
        .info-label {
            font-weight: bold;
            color: #555;
        }
        .info-value {
            color: #333;
        }
        .footer {
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 20px;
            margin-top: 30px;
            color: #666;
            font-size: 14px;
        }
        .contact-info {
            background-color: #dc2626;
            color: white;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            background-color: #dc2626;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">MAQUIMOTORA</div>
            <div class="subtitle">Tu concesionario de motos de confianza</div>
        </div>

        <div class="content">
            <div class="greeting">
                ¡Hola {{ $cliente->nombre }} {{ $cliente->apellido }}!
            </div>

            <p>Gracias por tu interés en nuestras motocicletas. Hemos recibido tu solicitud de cotización y uno de nuestros asesores se comunicará contigo pronto.</p>

            <div class="info-section">
                <div class="info-title">📋 Detalles de tu Cotización</div>
                <div class="info-item">
                    <span class="info-label">Número de Cotización:</span>
                    <span class="info-value">#{{ str_pad($cotizacion->id_cotizacion, 6, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Fecha:</span>
                    <span class="info-value">{{ $cotizacion->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Estado:</span>
                    <span class="info-value">{{ ucfirst($cotizacion->estado) }}</span>
                </div>
            </div>

            <div class="info-section">
                <div class="info-title">🏍️ Motocicleta de Interés</div>
                <div class="info-item">
                    <span class="info-label">Marca:</span>
                    <span class="info-value">{{ $moto->modelo->marca->nombre ?? 'N/A' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Modelo:</span>
                    <span class="info-value">{{ $moto->modelo->nombre ?? 'N/A' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Año:</span>
                    <span class="info-value">{{ $moto->anio }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Precio Base:</span>
                    <span class="info-value">S/ {{ number_format($moto->precio_base, 2) }}</span>
                </div>
            </div>

            <div class="info-section">
                <div class="info-title">👤 Tus Datos de Contacto</div>
                <div class="info-item">
                    <span class="info-label">Nombre:</span>
                    <span class="info-value">{{ $cliente->nombre }} {{ $cliente->apellido }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Email:</span>
                    <span class="info-value">{{ $cliente->email }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Teléfono:</span>
                    <span class="info-value">{{ $cliente->telefono }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Documento:</span>
                    <span class="info-value">{{ $cliente->tipo_documento }}: {{ $cliente->numero_documento }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Ubicación:</span>
                    <span class="info-value">{{ $cliente->distrito }}, {{ $cliente->provincia }}, {{ $cliente->departamento }}</span>
                </div>
            </div>

            <div class="contact-info">
                <strong>📞 ¿Tienes preguntas?</strong><br>
                Contáctanos al: (01) 123-4567<br>
                Email: ventas@maquimotora.com
            </div>

            <p><strong>¿Qué sigue?</strong></p>
            <ul>
                <li>Uno de nuestros asesores revisará tu solicitud</li>
                <li>Te contactaremos en las próximas 24 horas</li>
                <li>Coordinaremos una cita para mostrarte la motocicleta</li>
                <li>Preparamos una cotización personalizada con financiamiento</li>
            </ul>

        </div>

        <div class="footer">
            <p>Este correo fue generado automáticamente. Por favor, no respondas a este mensaje.</p>
            <p><strong>Maquimotora</strong> - Tu concesionario de motos de confianza</p>
            <p>© {{ date('Y') }} Maquimotora. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>