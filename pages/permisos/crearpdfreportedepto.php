<?php

$maindir = "../../";

require_once($maindir."fpdf/mysql_table.php");
require($maindir."conexion/config.inc.php");

$idDepto = $_GET['id1'];
/*
class PDF extends fpdf{
	function cargarDatos($idDepto){
		require_once("../../conexion/conn.php");  
		$conexion = mysqli_connect($host, $username, $password, $dbname);
		
		$query = mysqli_query($conexion, "Select  Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_Apellido,  departamento_laboral.nombre_departamento, 
				COUNT(permisos.id_Permisos) as Solicitudes, SUM(permisos.dias_permiso) as Inasistencias from permisos inner join motivos 
				on permisos.id_motivo=motivos.Motivo_ID inner join empleado on empleado.No_Empleado=permisos.No_Empleado inner join persona 
				on persona.N_identidad=empleado.N_identidad inner join departamento_laboral on departamento_laboral.id_departamento_laboral = permisos.id_departamento 
				where permisos.estado = 'Aprobado' and departamento_laboral.id_departamento_laboral = '$idDepto' 
				GROUP BY Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_Apellido, departamento_laboral.nombre_departamento ORDER BY Primer_nombre asc");
				
		while($rep=mysqli_fetch_row($query)){
			$data[] = $rep;
		}
	}
	
	function 
}*/

class PDF extends PDF_MySQL_Table
{
	function Header()
	{
		//Title
		//$this->SetFont('Arial','',18);
		//$this->Cell(0,6,'World populations',0,1,'C');
		//$this->Ln(10);
		//Ensure table header is output
		parent::Header();
	}
}
	
	mysql_connect('localhost','root','');
	mysql_select_db('sistema_ciencias_juridicas');
	
	$consulta="Select permisos.id_Permisos, permisos.No_Empleado,Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_Apellido, dias_permiso, 
			DATE_FORMAT(fecha,'%d-%m-%Y') as fecha, hora_inicio, hora_finalizacion, motivos.descripcion as mtd, 
			departamento_laboral.nombre_departamento,estado from permisos inner join motivos on permisos.id_motivo=motivos.Motivo_ID 
			inner join empleado on empleado.No_Empleado=permisos.No_Empleado inner join persona on persona.N_identidad=empleado.N_identidad 
			inner join departamento_laboral on departamento_laboral.id_departamento_laboral = permisos.id_departamento where  
			 permisos.id_Permisos=:idPermisos";


	$query = $db->prepare($consulta);
    $query ->bindParam(":idPermisos",$idPermiso);
    $query->execute();
    $result = $query->fetch();
	
	$pdf=new PDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 18);
	$pdf->Image($maindir.'assets/img/lucen-aspicio.png', 50,30,200,200, 'PNG');
	$pdf->Image($maindir.'assets/img/logo_unah.png' , 10,5,18,30, 'PNG');
	$pdf->Image($maindir.'assets/img/logo-cienciasjuridicas.png' , 170,8, 25 , 25,'PNG');
	$pdf->Cell(22, 10, '', 0);
	$pdf->SetFont('Arial', '', 18);
	$pdf->Cell(5, 10, '', 0);
	$pdf->Cell(70, 10, 'Universidad Nacional Autonoma de Honduras', 0);
	$pdf->Ln(10);
	$pdf->SetFont('Arial', 'U', 14);
	$pdf->Cell(25, 8, '', 0,0,"C");
	$pdf->Cell(130, 8, ' Control de Permisos Personales', 0,0,"C");
	$pdf->Ln(25);
	//First table: put all columns automatically
	/*$pdf->Table("Select empleado.No_Empleado, CONCAT(Primer_nombre, ' ', Segundo_nombre, ' ', Primer_apellido, ' ', Segundo_Apellido) as Nombre,  departamento_laboral.nombre_departamento as Departament, 
				COUNT(permisos.id_Permisos) as Solicitud, SUM(permisos.dias_permiso) as 'Faltas' from permisos inner join motivos 
				on permisos.id_motivo=motivos.Motivo_ID inner join empleado on empleado.No_Empleado=permisos.No_Empleado inner join persona 
				on persona.N_identidad=empleado.N_identidad inner join departamento_laboral on departamento_laboral.id_departamento_laboral = permisos.id_departamento 
				where permisos.estado = 'Aprobado' and departamento_laboral.id_departamento_laboral = '$idDepto' 
				GROUP BY Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_Apellido, departamento_laboral.nombre_departamento ORDER BY Primer_nombre asc");
	*/
	
	//Second table: specify 3 columns
	$pdf->AddCol('No_Empleado',25,'#Empleado','C');
	$pdf->AddCol('Nombre',70,'Nombre Completo','C');
	$pdf->AddCol('Departament',40,'Departamento', 'C');
	$pdf->AddCol('Solicitud',28,'Solicitudes','R');
	$pdf->AddCol('Faltas',30,'Dias Faltados','R');
	/*$prop=array('HeaderColor'=>array(255,150,100),
				'color1'=>array(210,245,255),
				'color2'=>array(255,255,210),
				'padding'=>2);*/
	$pdf->Table("Select empleado.No_Empleado, CONCAT(Primer_nombre, ' ', Segundo_nombre, ' ', Primer_apellido, ' ', Segundo_Apellido) as Nombre,  departamento_laboral.nombre_departamento as Departament, 
				COUNT(permisos.id_Permisos) as Solicitud, SUM(permisos.dias_permiso) as 'Faltas' from permisos inner join motivos 
				on permisos.id_motivo=motivos.Motivo_ID inner join empleado on empleado.No_Empleado=permisos.No_Empleado inner join persona 
				on persona.N_identidad=empleado.N_identidad inner join departamento_laboral on departamento_laboral.id_departamento_laboral = permisos.id_departamento 
				where permisos.estado = 'Aprobado' GROUP BY Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_Apellido, departamento_laboral.nombre_departamento 
				ORDER BY Primer_nombre asc");
				
	$pdf->Output();

?>