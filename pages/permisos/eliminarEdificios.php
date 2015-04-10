<?php
	$id = $_POST['Edificio_ID'];

	require_once('conexion.php');
	
	mysql_query("DELETE FROM edificios where Edificio_ID = '$id';", $enlace);
	
	mysql_close($enlace);
?>