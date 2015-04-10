<?php

	$id=$_POST['Unidad_ID'];	
	
	require_once("conexion.php");
	
	mysql_query("DELETE FROM unidad_acad WHERE Unidad_ID='$id'", $enlace);	
	
	mysql_close($enlace);
	//echo mensajes('Motivo"'.$id.'" Eliminado con Exito','verde');	
     
?>