<?php
    require 'conexion.php';

    $nombre = $_POST['nombre'];
    $ciudad = $_POST['ciudad'];
    $correo = $_POST['correo'];
    //consulta
    $insertar = "INSERT INTO distribuidor (nombredistribuidor, ciudaddistribuidor, correodistribuidor)
    VALUES ('$nombre', '$ciudad', '$correo')";
    //Ejecutar consulta
    $registro = mysqli_query($conectar, $insertar);
    if (!$registro) {
        echo '<script> alert("Error en el registro"); </script>';
    } else {
        echo '<script> alert("Registro exitoso"); </script>';
    }
    //Volver a la pagina
    //header("location: ../tabla_distribuidor.php");
    //cerrar conexion
    mysqli_close($conectar);
?>