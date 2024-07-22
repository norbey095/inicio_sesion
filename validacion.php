<?php
    if(isset($_GET['registro'])){
        header('Location: ./registro.php');
    } elseif (isset($_GET['inicio'])){
        header('Location: ./iniciar.php');
    }
?>