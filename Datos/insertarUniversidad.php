<?php
     include'../Datos/conexion.php';
     require_once('funciones.php');
	
	  if (!empty($_POST['nombre'])) 
    {
        $nombre = $_POST['nombre']; 
		$pais = $_POST['pais']; 
        
        $query = "INSERT INTO universidad(Nombre_universidad,Id_Pais) VALUES('$nombre','$pais')";
        
        mysql_query($query); 
        
        echo mensajes('Actualizado con Exito','verde');

		 
    }else{
        
        echo mensajes('requisitos en blanco','rojo');
        
    }   
    
    include 'cargarUniversidad.php';
	
?>

