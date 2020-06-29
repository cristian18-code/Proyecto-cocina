<?php
    require 'conexion.php';

    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    //consulta
    $insertar = "INSERT INTO administrador
    (usuario, nombre, correo, contrasenia)
    VALUES ('$usuario', '$nombre', '$correo', '$contraseña')";
    //Ejecutar consulta
    $registro = mysqli_query($conectar, $insertar);
    if (!$registro) {
        echo '<script> alert("Error en el registro"); </script>';
    } else {
        echo '<script> alert("Registro exitoso"); </script>';
    }
    //Volver a la pagina
    header("location: ../tabla_administrador.php");
    //cerrar conexion
    mysqli_close($conectar);
?>