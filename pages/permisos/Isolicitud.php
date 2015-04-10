
<?php 

//conexion a la base de datos 
 require_once("../../conexion/conn.php");  
											     // $bd = 'sistema_ciencias_juridicas';
                                                //$conexion = mysqli_connect('localhost', 'root', '', $bd);
$link = mysqli_connect($host, $username, $password, $dbname);
//$link = mysqli_connect("localhost","root","123","sistema_ciencias_juridicas") or die("Error " . mysqli_error($link)); 

//variables recibidas por ajax	
//$nombre =  $_POST['name'];
$idusuario =  $_POST['idusuario'];
$unidad =  $_POST['area'];
$motivo =  $_POST['motivo'];
$edificio =  $_POST['edificio'];
$fecha =  $_POST['fecha'];
$horai =  $_POST['horai'];
$horaf =  $_POST['horaf'];
$cantidad =  $_POST['cantidad'];
$fecha_solic= $hoy = date("Y-m-d"); ;

//echo($idusuario);
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes
$cont=0;

//consultas para encontrar los ID de cada campo seleccionado en los combobox
$result = mysqli_query($link, "SELECT Edificio_ID FROM edificios  where descripcion='".$edificio."'");
$result2 = mysqli_query($link, "SELECT Id_departamento_laboral FROM departamento_laboral  where nombre_departamento='".$unidad."'");
$result3 = mysqli_query($link, "SELECT Motivo_ID FROM motivos  where descripcion='".$motivo."'");
$result5 = mysqli_query($link, "SELECT No_Empleado FROM usuario  where id_Usuario='".$idusuario."'");
//echo $result5

// data seek de consultas
mysqli_data_seek ($result,$cont);
mysqli_data_seek ($result2,$cont);
mysqli_data_seek ($result3,$cont);
mysqli_data_seek ($result5,$cont);
//mysqli_data_seek ($result4,$cont);

// arreglos de consultas
$extraido= mysqli_fetch_array($result);
$extraido2= mysqli_fetch_array($result2);
$extraido3= mysqli_fetch_array($result3);
$extraido5= mysqli_fetch_array($result5);

//Consulta de inserción a la base de datos
	$query = "INSERT INTO permisos (
	id_departamento,
	No_Empleado,
	id_motivo,
	dias_permiso,
	hora_inicio,
	hora_finalizacion,
	id_Edificio_Registro,
	fecha,
	estado,
	fecha_solicitud)
	VALUES(
	'".$extraido2['Id_departamento_laboral']."',
	'".$extraido5['No_Empleado']."',
	'".$extraido3['Motivo_ID']."',
	'".$cantidad."',
	'".$horai."',
	'".$horaf."',
	'".$extraido['Edificio_ID']."',
	'".$fecha."',
	'En espera',
	'".$fecha_solic."'
	)";
    
	//se ejecuta la consulta de insercion y se verifica si se ha realizado o si ha fallado
    $result4 =mysqli_query($link, $query) or die("Error " . mysqli_error($link));
	
		if ($result4 = 1) {
			echo "Solicitud ingresada Exitosamente";
		}
		
    mysqli_close($link); //Cierra la conexión con la base de datos

?>











