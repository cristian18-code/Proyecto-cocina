<?php
    require 'conexion.php';

    $nombre = $_POST['nombre'];
    $ciudad = $_POST['ciudad'];

    //consulta
    $insertar = "INSERT INTO despensa (nombre, ciudad)
    VALUES ('$nombre', '$ciudad');";
    //Ejecucion de consulta
    $consulta = mysqli_query($conectar, $insertar);
    if (!$consulta) {
        echo '<script> alert("Error en el registro"); </script>';
    } else {
        echo '<script> alert("Exito en el registro"); </script>';
    }
    //volver a la pagina
    header("location: ../tabla_despensa.php");
    //cerrar conexion
    mysqli_close($conectar);
?>