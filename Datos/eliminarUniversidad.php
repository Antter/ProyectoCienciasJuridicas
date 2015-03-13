<?php

include '../Datos/funciones.php';
include'../Datos/conexion.php';

if (isset($_POST['Id_universidad'])) {
    $id = $_POST['Id_universidad'];
    
    if(mysql_query("DELETE FROM universidad WHERE Id_universidad='$id'")){
    
    echo mensajes('Universidad"' . $id . '" Eliminado con Exito', 'verde');
    }
    else{
     
    echo mensajes('NO se puede eliminar Universidad"' . $id . '"', 'rojo');
        
    }
}

include '../Datos/cargarUniversidad.php';

?>