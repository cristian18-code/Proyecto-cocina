<?php
    require 'conexion.php';

    $despensa = $_POST['despensa'];
    $nombre = $_POST['nombre'];
    $ciudad = $_POST['ciudad'];

    //consulta
    $consulta = "UPDATE despensa
    SET 
    nombre = '$nombre',
    ciudad = '$ciudad' 
    WHERE id_despensa = '$despensa'";
    //Ejecutar consulta
    $actualizar = mysqli_query($conectar, $consulta);
    if (!$actualizar) {
        echo '<script> alert("Error en la actualizacion"); </script>';
    } else {
        echo '<script> alert("Actualizacion exitosa"); </script>';
    }
    //volver a la pagina
    header("location: ../tabla_despensa.php");
    //cerrar conexion
    mysqli_close($conectar);
?>