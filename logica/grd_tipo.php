<?php
    require 'conexion.php';
    
    $nombre = $_POST['nombre'];
    $refrigerable = $_POST['refrigerable'];
    $vencimiento = $_POST['vencimiento'];
    //consulta
    $insertar = "INSERT INTO tipoproducto (nombre, es_refrigerable, tiene_vencimiento)
    VALUES ('$nombre', '$refrigerable', '$vencimiento');";
    //Ejecucion de consulta
    $consulta = mysqli_query($conectar, $insertar);
    if (!$consulta) {
        echo '<script> alert("Error en el registro"); </script>';
    } else {
        echo '<script> alert("Exito en el registro"); </script>';
    }
    //volver a la pagina
    header("location: ../tabla_tipos.php");
    //cerrar conexion
    mysqli_close($conectar);
?>