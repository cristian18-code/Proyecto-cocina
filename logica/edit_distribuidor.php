<?php
    require 'conexion.php';

    $id_distribuidor = $_POST['id_distribuidor'];
    $nombre = $_POST['nombre'];
    $ciudad = $_POST['ciudad'];
    $correo = $_POST['correo'];

    //consulta
    $consulta = "UPDATE distribuidor
    SET nombredistribuidor = '$nombre',
    ciudaddistribuidor = '$ciudad', 
    correodistribuidor = '$correo'
    WHERE id_distribuidor = '$id_distribuidor'";
    //Ejecutar consulta
    $actualizar = mysqli_query($conectar, $consulta);
    if (!$actualizar) {
        echo '<script> alert("Error en la actualizacion"); </script>';
    } else {
        echo '<script> alert("Actualizacion exitosa"); </script>';
    }
    //volver a la pagina
    header("location: ../tabla_distribuidor.php");
    //cerrar conexion
    mysqli_close($conectar);
?>