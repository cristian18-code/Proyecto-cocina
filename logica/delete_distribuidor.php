<?php
    require 'conexion.php';

    $id_distribuidor = $_POST['id_distribuidor'];

    $consulta = "DELETE * FROM distribuidor WHERE id_distribuidor = '$id_distribuidor'";
    //ejecutar consulta
    $delete = mysqli_query($conectar, $consulta);
    if (!$delete) {
        echo '<script> alert("Error en la eliminacion"); </script>';
    } else {
        echo '<script> alert("Eliminacion exitosa"); </script>';
    }
    //Volver a la pagina
    header("location: ../tabla_distribuidor.php");
    //cerrar conexion
    mysqli_close($conectar);
?>