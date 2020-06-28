<?php
    require 'conexion.php';

    $despensa = $_POST['despensa'];

    $consulta = "DELETE FROM despensa WHERE id_despensa = '$despensa'";
    //ejecutar consulta
    $delete = mysqli_query($conectar, $consulta);
    if (!$delete) {
        echo '<script> alert("Error en la eliminacion"); </script>';
    } else {
        echo '<script> alert("Eliminacion exitosa"); </script>';
    }
    //Volver a la pagina
    header("location: ../tabla_despensa.php");
    //cerrar conexion
    mysqli_close($conectar);
?>