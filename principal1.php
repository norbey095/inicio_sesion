<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menor de Edad</title>
</head>
<body>
    <h1>
        Bienvenido sea usted por ser menor de edad
    </h1>
    <?php
        $concatenar = "Bienvenido ".$_COOKIE['nombre']." ".$_COOKIE['apellido']." Con  edad: ".$_COOKIE['edad']." años";
        echo $concatenar;        
    ?>    
</body>
</html>