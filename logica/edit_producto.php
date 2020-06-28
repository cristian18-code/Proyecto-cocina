<?php
    require 'conexion.php';

    $producto = $_POST['producto'];
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $medida = $_POST['medida'];
    $cantidad = $_POST['cantidad'];
    $peso = $_POST['peso'];
    $precio = $_POST['precio'];
    $fcompra = $_POST['fecha_compra'];
    $fvencimiento = $_POST['fecha_vencimiento'];

    //consulta
    $consulta = "UPDATE producto1
    SET     
    id_tipo = '$tipo',
    nombre_producto = '$nombre',
    unidad_medida = '$medida', 
    cantidad = '$cantidad',
    peso = '$peso',
    precio_compra = '$precio',
    fecha_compra = '$fcompra', 
    fecha_vencimiento = '$fvencimiento' WHERE id_producto = '$producto'";
    //Ejecutar consulta
    $actualizar = mysqli_query($conectar, $consulta);
    if (!$actualizar) {
        echo '<script> alert("Error en la actualizacion"); </script>';
    } else {
        echo '<script> alert("Actualizacion exitosa"); </script>';
    }
    //volver a la pagina
    header("location: ../tabla_productos.php");
    //cerrar conexion
    mysqli_close($conectar);
?>