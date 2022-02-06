<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h4>Hola {{ $datosEmail['name'] }}</h4>
    <br>

    <p>
        Gracias por contactarnos
    </p>

    <p>
        Este es el motivo de consulta:<br>
        {{ $datosEmail['suggest'] }}
    </p>



</body>

</html>
