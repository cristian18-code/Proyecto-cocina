<?php
    require 'conexion.php';

    $administrador = $_POST['administrador'];

    $consulta = "DELETE FROM administrador WHERE id_administrador = '$administrador'";
    //ejecutar consulta
    $delete = mysqli_query($conectar, $consulta);
    if (!$delete) {
        echo '<script> alert("Error en la eliminacion"); </script>';
    } else {
        echo '<script> alert("Eliminacion exitosa"); </script>';
    }
    //Volver a la pagina
    header("location: ../tabla_administrador.php");
    //cerrar conexion
    mysqli_close($conectar);
?>