<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje de Contacto</title>
</head>

<body>
    <h1>Nuevo Mensaje de Contacto</h1>
    <p><strong>Nombre:</strong> {{ $details['name'] }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $details['email'] }}</p>
    <p><strong>Mensaje:</strong> {{ $details['message'] }}</p>
</body>

</html>