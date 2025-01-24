<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva Solicitud de Contacto</title>
</head>
<body>
    <h1>Nueva solicitud de contacto recibida</h1>
    <h2>Detalles del contacto:</h2>
    <ul>
        <li>Nombre: {{ $data['nombre'] }}</li>
        <li>Email: {{ $data['correo'] }}</li>
        <li>Teléfono: {{ $data['telefono'] }}</li>
        <li>Asunto: {{ $data['asunto'] }}</li>
        <li>Mensaje: {{ $data['mensaje'] }}</li>
    </ul>
</body>
</html>