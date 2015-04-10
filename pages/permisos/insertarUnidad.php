<?php
	 
	$unidad = $_POST['dunidad'];
	
	require_once("../../conexion/conn.php");  
	$conexion = mysqli_connect($host, $username, $password, $dbname);
	
	$query = "INSERT INTO unidad_acad(descripcion) VALUES('$unidad')";
	
	$resultado = mysqli_query($conexion, $query) or die("Error " . mysqli_error($link));
	mysqli_close($conexion);
?>