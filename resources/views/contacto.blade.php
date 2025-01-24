<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kalma Perú</title>
</head>
<body>
   {{--  <p>Nombre: {{ $data['nombre'] }}</p>
<p>Correo electrónico: {{ $data['correo'] }}</p>
<p>Teléfono: {{ $data['telefono'] }}</p><br>
<p>Asunto: <strong>{{ $data['asunto'] }}</strong> </p>
<p>Mensaje: {{ $data['mensaje'] }}</p> --}}

{{-- 8.- ENVIO-CORREO-V1-P1 --}}
 <div class="container">
        <h1>Confirmación de recepción de mensaje</h1>
        <p>Hola {{ $data['nombre'] }},</p>
        <p>Gracias por ponerte en contacto con nosotros. Hemos recibido tu mensaje y estaremos encantados de ayudarte.</p>
        <p>Nos pondremos en contacto contigo pronto para proporcionarte más información sobre nuestros Servicios.</p>
        <br>
        <div class="message">
            <p>Saludos cordiales,</p>
            <p>Kalma Perú</p>
        </div>
    </div>
    {{-- /8.- ENVIO-CORREO-V1-P1 --}}
</body>
</html>