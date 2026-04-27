<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Cotización - Maquimotora</title>
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
        }
        .badge {
            display: inline-block;
            background-color: #dc2626;
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            margin-top: 10px;
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
            margin-bottom: 12px;
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
            min-width: 140px;
        }
        .info-value {
            color: #333;
            text-align: right;
        }
        .highlight {
            background-color: #fff3cd;
            border-left-color: #f59e0b;
        }
        .footer {
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 20px;
            margin-top: 30px;
            color: #888;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">MAQUIMOTORA</div>
            <div class="badge">🔔 Nueva Cotización Recibida</div>
        </div>

        <p>Se ha registrado una nueva solicitud de cotización en el sistema. Los datos del cliente son los siguientes:</p>

        <div class="info-section highlight">
            <div class="info-title">📋 Datos de la Cotización</div>
            <div class="info-item">
                <span class="info-label">N° Cotización:</span>
                <span class="info-value"><strong>#{{ str_pad($cotizacion->id_cotizacion, 6, '0', STR_PAD_LEFT) }}</strong></span>
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
            <div class="info-title">👤 Datos del Cliente</div>
            <div class="info-item">
                <span class="info-label">Nombre completo:</span>
                <span class="info-value"><strong>{{ $cliente->nombre }} {{ $cliente->apellido }}</strong></span>
            </div>
            <div class="info-item">
                <span class="info-label">{{ $cliente->tipo_documento }}:</span>
                <span class="info-value">{{ $cliente->numero_documento }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Teléfono:</span>
                <span class="info-value"><strong>{{ $cliente->telefono }}</strong></span>
            </div>
            <div class="info-item">
                <span class="info-label">Email:</span>
                <span class="info-value">{{ $cliente->email }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Ubicación:</span>
                <span class="info-value">{{ $cliente->distrito }}, {{ $cliente->provincia }}, {{ $cliente->departamento }}</span>
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
                <span class="info-value"><strong>{{ $moto->modelo->nombre ?? 'N/A' }}</strong></span>
            </div>
            <div class="info-item">
                <span class="info-label">Precio Base:</span>
                <span class="info-value"><strong>S/ {{ number_format($moto->precio_base, 2) }}</strong></span>
            </div>
        </div>

        <div class="footer">
            <p>Notificación automática del sistema — <strong>Maquimotora</strong></p>
            <p>© {{ date('Y') }} Maquimotora. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>
