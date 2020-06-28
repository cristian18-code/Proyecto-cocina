<?php
    require 'conexion.php';

    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $medida = $_POST['medida'];
    $cantidad = $_POST['cantidad'];
    $peso = $_POST['peso'];
    $precio = $_POST['precio'];
    $fcompra = $_POST['fecha_compra'];
    $fvencimiento = $_POST['fecha_vencimiento'];
    //consulta
    $insertar = "INSERT INTO producto1
    (id_tipo, nombre_producto, unidad_medida, cantidad, peso, precio_compra, fecha_compra, fecha_vencimiento)
    VALUES ('$tipo', '$nombre', '$medida', '$cantidad', '$peso', '$precio', '$fcompra', '$fvencimiento')";
   //volver
   header("location: ../tabla_productos.php");
    //Ejecutar consulta
    $registro = mysqli_query($conectar, $insertar);
    if (!$registro) {        
        echo '<script> alert("Error en el registro"); </script>';
    } else {        
        echo '<script> alert("Registro exitoso"); </script>';
    }

    //cerrar conexion
    mysqli_close($conectar);
?>