<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio Sesion</title>
    </head>
    <body>
        <form action="./iniciar.php" method="POST">
            <label>
                Usuario:
                <input type="text" name="usuario" required placeholder="Correo Registrado"> 
            </label>
            <br>
            <br>
            <label>
                Contraseña: 
                <input type="password" name="contrasena" required>
            </label>
            <br>
            <br>
            <label>
                Deporte: 
                <input type="text" name="deporte" required>
            </label>
            <br>
            <br>
            <button class="total"  type="submit">Iniciar Sesion</button>
        </form> 
        <?php
            $host =  'localhost';
            $usuario = 'root';
            $password  = '';
            $basedatos = 'deporte';
            $puerto  = 3306;
            $conexion = new mysqli($host,$usuario,$password,$basedatos, $puerto);

            if(isset($_POST['contrasena'])) {                
                $validacion= "SELECT * FROM `usuarios` where correo='". $_POST['usuario']."';";
                if($resultado = $conexion->query($validacion)) {                    
                    $row = $resultado->fetch_assoc();
                    if($row['contrasena'] == $_POST['contrasena']) {                                             
                        if($row['deporte'] == $_POST['deporte']){ 
                            setcookie("nombre", $row['nombre']);
                            setcookie("apellido", $row['apellido']);
                            setcookie("edad", $row['edad']);

                            if(intval($row['edad']) < 18 ){
                                header("location: ./principal1.php") ;
                            } else {
                                header("location: ./principal2.php") ;
                            }
                        } else {
                            echo "El Deporte no coincide con el registrado, Intente de nuevo ";
                        }
                    } else {
                        echo "Contraseña incorrecta, Intente de nuevo ";
                    }
                } else {
                    printf("Error: %s\n", $conexion->error);                
                }
            }
        ?>
    </body>
</html>