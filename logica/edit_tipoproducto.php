<?php
    require 'conexion.php';

    $nombre = $_POST['nombre'];
    $refrigerable = $_POST['refrigerable'];
    $vencimiento = $_POST['vencimiento'];

    //consulta
    $consulta = "UPDATE tipoproducto SET nombre = '$$nombre' es_refrigerable = '$refrigerable'
    tiene_vencimiento = '$vencimiento'";
    //Realizar consulta
    $editar = mysqli_query($conectar, $consulta);
    if (!$editar) {
        echo '<script> alert("Error en la actualizacion"); </script>';
    } else {
        echo '<script> alert("Actualizacion exitosa"); </script>';
    }
    //volver a la pagina
    header("location: ../tabla_tipos.php");
    //cerrar conexion
    mysqli_close($conectar);
?>