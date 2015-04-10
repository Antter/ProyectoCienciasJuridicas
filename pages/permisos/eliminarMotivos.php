<?php
	$id=$_POST['Motivo_ID'];	
	
	require_once("conexion.php");
	
	mysql_query("DELETE FROM motivos WHERE Motivo_ID='$id'", $enlace);	
	
	mysql_close($enlace);
	//echo mensajes('Motivo"'.$id.'" Eliminado con Exito','verde');	
?>