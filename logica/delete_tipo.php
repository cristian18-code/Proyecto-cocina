<?php
    require 'conexion.php';

    $tipo = $_POST['tipo'];

    $consulta = "DELETE FROM tipoproducto WHERE id_tipo = '$tipo'";
    //ejecutar consulta
    $delete = mysqli_query($conectar, $consulta);
    if (!$delete) {
        echo '<script> alert("Error en la eliminacion"); </script>';
    } else {
        echo '<script> alert("Eliminacion exitosa"); </script>';
    }
    //Volver a la pagina
    header("location: ../tabla_tipos.php");
    //cerrar conexion
    mysqli_close($conectar);
?>