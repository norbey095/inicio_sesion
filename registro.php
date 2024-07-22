<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro Deportista</title>
    </head>
    <body>
        <form action="./registro.php" method="POST">
            <label>
                Nombre<input type="text" name="nombre">
                <br>
            </label>
            <label>
                Apellido<input type="text" name="apellido">
                <br>
            </label>
            <label>
                Edad<input type="number" name="edad">
                <br>
            </label>
            <label>
                Deporte<input type="text" name="deporte">
                <br>
            </label>
            <label>
                Contraseña<input type="password" name="contrasena">
                <br>
            </label>
            <label>
                Confirmar Contraseña<input type="password" name="confir_contrasena">
                <br>
            </label>
            <label>
                Correo<input type="email" name="correo">
                <br>
            </label>
            <button type="submit">Registrarse</button>
        </form>
        <?php
            $host =  'localhost';
            $usuario = 'root';
            $password  = '';
            $basedatos = 'deporte';
            $puerto  = 3306;
            $conexion = new mysqli($host,$usuario,$password,$basedatos, $puerto);
            if($conexion->connect_errno){
                echo "la conexión ha fallado".$conexion->connect_errno;
            }
            if(isset($_POST['contrasena'])){
                if($_POST['contrasena'] === $_POST['confir_contrasena']){
                    $validacion_correo = "SELECT COUNT(*) as total FROM `usuarios` where correo='". $_POST['correo']."';";
                    if($resultado = $conexion->query($validacion_correo)){
                        $row = $resultado->fetch_assoc();
                        if(intval($row['total']) == 1){
                            echo "El correo ya está registrado. Inicie sesión o use otro correo";
                        }else{
                            $nombre=$_POST['nombre'];
                            $apellido=$_POST['apellido'];
                            $edad=$_POST['edad'];
                            $deporte=$_POST['deporte'];
                            $contrasena=$_POST['contrasena'];
                            $correo=$_POST['correo'];
                            $insertar_usuario = "INSERT INTO `usuarios` (nombre, apellido, edad, deporte, contrasena, correo) VALUES ('$nombre','$apellido','$edad','$deporte','$contrasena', '$correo');";
                            if($conexion->query($insertar_usuario)){
                                header('Location: ./iniciar.php');
                            }else{
                                echo $conexion->error;
                            }
                        }
                    } else {
                        printf("Error: %s\n", $conexion->error);
                    }
                } else {
                    echo "Las contraseñas deben ser iguales, no fue posible realizar el registro. Intente de nuevo";
                }
            }
            $conexion->close();
        ?>
    </body>
</html>