<?php
    require 'conexion.php';

    $producto = $_POST['producto'];

    $consulta = "DELETE FROM producto1 WHERE id_producto = '$producto'";
    //ejecutar consulta
    $delete = mysqli_query($conectar, $consulta);
    if (!$delete) {
        echo '<script> alert("Error en la eliminacion"); </script>';
    } else {
        echo '<script> alert("Eliminacion exitosa"); </script>';
    }
    //Volver a la pagina
    header("location: ../tabla_productos.php");
    //cerrar conexion
    mysqli_close($conectar);
?>