<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitud de Financiamiento Recibida - Maquimotora</title>
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
        .highlight-box {
            background-color: #e8f5e8;
            border: 2px solid #28a745;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin: 20px 0;
        }
        .highlight-amount {
            font-size: 24px;
            font-weight: bold;
            color: #28a745;
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

            <p>¡Excelente noticia! Hemos recibido tu solicitud de financiamiento para la motocicleta de tus sueños. Nuestro equipo de financiamiento está revisando tu aplicación y te contactaremos pronto con una propuesta personalizada.</p>

            <div class="info-section">
                <div class="info-title">📋 Detalles de tu Solicitud de Financiamiento</div>
                <div class="info-item">
                    <span class="info-label">Número de Solicitud:</span>
                    <span class="info-value">#{{ str_pad($financiamiento->id_financiamiento, 6, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Fecha de Solicitud:</span>
                    <span class="info-value">{{ $financiamiento->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Estado:</span>
                    <span class="info-value">{{ ucfirst(str_replace('_', ' ', $financiamiento->estado)) }}</span>
                </div>
            </div>

            <div class="info-section">
                <div class="info-title">🏍️ Motocicleta Seleccionada</div>
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
                    <span class="info-label">Precio Total:</span>
                    <span class="info-value">S/ {{ number_format($moto->precio_base, 2) }}</span>
                </div>
            </div>

            <div class="highlight-box">
                <div style="font-size: 18px; margin-bottom: 10px;">💰 <strong>Resumen de tu Financiamiento</strong></div>
                <div class="info-item">
                    <span class="info-label">Cuota Inicial:</span>
                    <span class="info-value">S/ {{ number_format($financiamiento->cuota_inicial, 2) }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Monto a Financiar:</span>
                    <span class="info-value">S/ {{ number_format($financiamiento->monto_financiado, 2) }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Plazo:</span>
                    <span class="info-value">{{ $financiamiento->plazo }} meses</span>
                </div>
                <div class="highlight-amount">
                    Cuota Mensual Estimada: S/ {{ number_format($financiamiento->cuota_mensual, 2) }}
                </div>
                <small style="color: #666;">*Sujeto a evaluación crediticia</small>
            </div>

            <div class="info-section">
                <div class="info-title">📊 Información Financiera Proporcionada</div>
                <div class="info-item">
                    <span class="info-label">Situación Laboral:</span>
                    <span class="info-value">{{ ucfirst($financiamiento->situacion_laboral) }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Ingreso Mensual:</span>
                    <span class="info-value">S/ {{ number_format($financiamiento->ingreso_mensual, 2) }}</span>
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
                <strong>📞 ¿Tienes preguntas sobre tu financiamiento?</strong><br>
                Contáctanos al: (01) 123-4567<br>
                Email: financiamiento@maquimotora.com
            </div>

            <p><strong>¿Qué sigue ahora?</strong></p>
            <ul>
                <li>✅ Tu solicitud ha sido recibida y está en proceso de evaluación</li>
                <li>📋 Nuestro equipo revisará tu información financiera</li>
                <li>📞 Te contactaremos en las próximas 48 horas con una respuesta</li>
                <li>📄 Si es aprobada, te enviaremos los documentos para firmar</li>
                <li>🏍️ ¡Podrás retirar tu moto una vez completado el proceso!</li>
            </ul>

            <p style="background-color: #fff3cd; padding: 15px; border-radius: 5px; border-left: 4px solid #ffc107;">
                <strong>📝 Documentos requeridos:</strong> Ten preparado tu DNI, recibos de ingresos de los últimos 3 meses, y comprobante de domicilio. Te contactaremos para coordinar la entrega de estos documentos.
            </p>

        </div>

        <div class="footer">
            <p>Este correo fue generado automáticamente. Por favor, no respondas a este mensaje.</p>
            <p><strong>Maquimotora</strong> - Hacemos realidad el sueño de tu moto</p>
            <p>© {{ date('Y') }} Maquimotora. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>