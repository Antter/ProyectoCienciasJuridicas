<?php

 $maindir = "../../";
require_once('../../Datos/conexion.php');
require_once($maindir."fpdf/fpdf.php");
require($maindir."conexion/config.inc.php");

$id = $_GET['id1'];

$resultado=mysql_query("SELECT * FROM empleado inner join persona on empleado.N_identidad=persona.N_identidad inner join departamento_laboral on departamento_laboral.Id_departamento_laboral=empleado.Id_departamento Where No_Empleado='".$id."'");
$resultado2=mysql_query("SELECT * FROM empleado_has_cargo inner join cargo on cargo.ID_cargo=empleado_has_cargo.ID_cargo where No_Empleado='".$id."'");
   

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image($maindir.'assets/img/logo-cienciasjuridicas.png' , 10 ,8, 20 , 20,'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(120, 10, '			Perfil Empleado', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Hoy: '.date('d-m-Y').'', 0);
$pdf->Ln(20);
if($row = mysql_fetch_array($resultado) or die("Error en: " . mysql_error())){
      $nombreE=$row['Primer_nombre'];
      $nombreE2=$row['Segundo_nombre'];
      $apellidoE=$row['Primer_apellido'];
      $apellidoE2=$row['Segundo_apellido'];
      $nombreC =$nombreE." ".$nombreE2." ".$apellidoE." ".$apellidoE2;
$pdf->Cell(120, 9, '                                                                       INFORMACIÓN PERSONAL', 0);
$pdf->Ln(10);


$pdf->Cell(125, 8, 'Número de Identidad: '.$row['N_identidad'], 0);
$pdf->Cell(120, 10, 'Empleado: '.$id, 0);
$pdf->Ln(5);
$pdf->Cell(130, 8, 'Nombre: '.$nombreC, 0);
$pdf->Ln(5);
$pdf->Cell(130, 8, 'Fecha de ingreso como empleado: '.$row['Fecha_ingreso'], 0);
$pdf->Ln(15);
$pdf->Cell(120, 9, '                                                                       INFORMACIÓN LABORAL', 0);
$pdf->Ln(10);

 while ($row2=mysql_fetch_array($resultado2)) {
      $fechaS=$row2['Fecha_salida_cargo'];
     if ($fechaS== NULL || $fechaS=="0000-00-00") {
         $fecha="Actualmente";
     }
 else {
         $fecha=$fechaS;
     }
$pdf->Cell(125, 8, 'Cargo: '.$row2['Cargo'], 0);
$pdf->Ln(5);
$pdf->Cell(125, 8, 'Fecha de Ingreso: '.$row2['Fecha_ingreso_cargo'], 0);
$pdf->Ln(5);
$pdf->Cell(125, 8, 'Fecha de Salida: '.$fecha, 0);
$pdf->Ln(15);
 }
 
 $pdf->Cell(120, 9, '                                                                          OBSERVACIONES', 0);
 $pdf->Ln(10);
 $pdf->Cell(125, 8, 'Observación: '.$row['Observacion'], 0);
$pdf->Ln(5);
 
/*$pdf->Cell(135, 8, 'Asunto: '.$result['DescripcionAsunto'], 0);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(150, 8, 'SEGUIMIENTO DEL FOLIO', 0);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 8, 'Id', 0);
$pdf->Cell(70, 8, 'Estado del Seguimiento', 0);
$pdf->Cell(40, 8, 'Fecha', 0);
$pdf->Cell(25, 8, 'Hora', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$query = null;
$db = null;
require($maindir."conexion/config.inc.php");
$query = $db->prepare("SELECT * FROM seguimiento WHERE NroFolio = :NroFolio");
	$query ->bindParam(":NroFolio",$idFolio);
    $query->execute();
    $result11 = $query->fetch();
        if($result11){
            $seguimiento = 1;
        }else{
            $seguimiento = 0;
        }
	
	if($seguimiento == 1){
	$Id_Seguimiento = $result11['Id_Seguimiento'];
	$sql = "SELECT seguimiento_historico.Id_SeguimientoHistorico, seguimiento_historico.Id_Seguimiento, estado_seguimiento.DescripcionEstadoSeguimiento, 
	        seguimiento_historico.FechaCambio, seguimiento_historico.Notas, prioridad.DescripcionPrioridad FROM seguimiento_historico 
			INNER JOIN estado_seguimiento ON seguimiento_historico.Id_Estado_Seguimiento = estado_seguimiento.Id_Estado_Seguimiento 
			INNER JOIN prioridad ON seguimiento_historico.Prioridad = prioridad.Id_Prioridad WHERE Id_Seguimiento = :Id_Seguimiento 
			ORDER BY FechaCambio DESC";

    $query = $db->prepare($sql);
	$query ->bindParam(":Id_Seguimiento",$Id_Seguimiento);
    $query->execute();
    $rows = $query->fetchAll();
	}
if($seguimiento == 1){
	foreach( $rows as $row ){
		$pdf->Cell(15, 8, $row["Id_SeguimientoHistorico"], 0);
		$pdf->Cell(70, 8, $row["DescripcionEstadoSeguimiento"], 0);
		$date = date_create($row["FechaCambio"]);
		date_format($date, 'Y-m-d H:i:s');
		$pdf->Cell(40, 8, date_format($date, 'd/m/y'), 0);
		$pdf->Cell(25, 8, date_format($date, 'g:i A'), 0);
		$pdf->Ln(5);
	}
}*/	}
$pdf->Output('reporte.pdf','I');
?>