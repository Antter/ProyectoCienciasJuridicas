<?php 

//conexion a la base de datos 
 require_once("../../conexion/conn.php");  
											     
$link = mysqli_connect($host, $username, $password, $dbname);

//variables recibidas por ajax	

$codEm =  $_POST['codigoE'];
$idusuario =  $_POST['id'];
$nombre = $_POST['nombre'];
$pass =  $_POST['pass'];
$rol =$_POST['rol'];

$fecha_Act= $hoy = date("Y-m-d"); ;
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes
$cont=0;

//consultas para encontrar los ID de cada campo seleccionado en los combobox
$result = mysqli_query($link, "SELECT id_Rol FROM roles  where descripcion='".$rol."'");


// data seek de consultas
mysqli_data_seek ($result,$cont);



// arreglos de consultas
$extraido= mysqli_fetch_array($result);

//Consulta de inserción a la base de datos
	$query = "INSERT INTO usuario (
	id_usuario,
	No_Empleado,
	nombre,
	Password,
	id_Rol,
	Fecha_Creacion,
	Estado
	
	)
	VALUES(
	
	'".$idusuario."',
	'".$codEm."',
	'".$nombre."',
	'".$pass."',
	'".$extraido['id_Rol']."',
	'".$fecha_Act."',
	1

	
	)";
	
	echo $query;
	//se ejecuta la consulta de insercion y se verifica si se ha realizado o si ha fallado
    $result4 =mysqli_query($link, $query) or die("Error " . mysqli_error($link));
	
		if ($result4 = 1) {
			echo "Solicitud ingresada Exitosamente";
		}
		
    mysqli_close($link); //Cierra la conexión con la base de datos

?>











