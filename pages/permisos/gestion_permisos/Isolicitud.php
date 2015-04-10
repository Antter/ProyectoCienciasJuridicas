
<?php 

//conexion a la base de datos 
$link = mysqli_connect("localhost","root","123","test8") or die("Error " . mysqli_error($link)); 

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


$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes
$cont=0;

//consultas para encontrar los ID
$result = mysqli_query($link, "SELECT Edificio_ID FROM tbl_edificios  where descripcion='".$edificio."'");
$result2 = mysqli_query($link, "SELECT Unidad_ID FROM tbl_unidad_academica  where descripcion='".$unidad."'");
$result3 = mysqli_query($link, "SELECT Motivo_ID FROM tbl_motivos  where descripcion='".$motivo."'");
$result5 = mysqli_query($link, "SELECT No_Empleado FROM usuario  where id_Usuario='".$idusuario."'");


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


	$query = "INSERT INTO tbl_permisos (
	id_unidadAcademica,
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
	'".$extraido2['Unidad_ID']."',
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

   
	$result4 =mysqli_query($link, $query) or die("Error " . mysqli_error($link));
	
		if ($result4 =1) {
		//  echo "a es mayor que b";
			echo "Solicitud ingresada Exitosamente ";}
		else {
         echo $result4;
      }

	
	
    mysqli_close($link);

?>











