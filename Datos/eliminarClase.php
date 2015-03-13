<?php

include '../Datos/funciones.php';
include'../Datos/conexion.php';

if (isset($_POST['IdClase'])) {
    $id = $_POST['IdClase'];

    if (mysql_query("DELETE FROM clases WHERE ID_Clases='$id'")) {
        echo mensajes('Clase "' . $id . '" Eliminado con Exito', 'verde');
    } else {

        echo mensajes('Clase "' . $id . '" No se puede eliminar', 'rojo');
    }
}
 include '../Datos/cargarClases.php';
?>