<?php
    require 'conexion.php';

    $administrador = $_POST['administrador'];
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];


    //consulta
    $consulta = "UPDATE administrador
    SET 
    usuario = '$usuario',
    nombre = '$nombre',
    correo = '$correo'
    WHERE id_administrador = '$administrador'";
    //Ejecutar consulta
    $actualizar = mysqli_query($conectar, $consulta);
    if (!$actualizar) {
        echo '<script> alert("Error en la actualizacion"); </script>';
    } else {
        echo '<script> alert("Actualizacion exitosa"); </script>';
    }
    //volver a la pagina
    header("location: ../tabla_administrador.php");
    //cerrar conexion
    mysqli_close($conectar);
?>