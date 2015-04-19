<?php

 $maindir = "../../";

require_once($maindir."fpdf/fpdf.php");
require($maindir."conexion/config.inc.php");

$idusuario =  $_POST['idusuario'];
$depto = $_POST['area'];
$motivo =  $_POST['motivo'];
$edificio =  $_POST['edificio'];
$fecha =  $_POST['fecha'];
$horai =  $_POST['horai'];
$horaf =  $_POST['horaf'];
$cantidad =  $_POST['cantidad'];
$fecha_solic= $hoy = date("Y-m-d"); ;

/*$query = $db->prepare("SELECT folios.NroFolio, folios.PersonaReferente, folios.UnidadAcademica, unidad_academica.NombreUnidadAcademica, folios.Organizacion, 
	    organizacion.NombreOrganizacion, folios.TipoFolio,folios.FechaEntrada, folios.FechaCreacion, folios.UbicacionFisica, 
		ubicacion_archivofisico.DescripcionUbicacionFisica ,folios.Prioridad  ,prioridad.DescripcionPrioridad, folios.DescripcionAsunto 
    	FROM folios INNER JOIN ubicacion_archivofisico ON folios.UbicacionFisica = ubicacion_archivofisico.Id_UbicacionArchivoFisico 
    	INNER JOIN prioridad ON folios.Prioridad = prioridad.Id_Prioridad 
    	LEFT JOIN unidad_academica ON folios.UnidadAcademica = unidad_academica.Id_UnidadAcademica 
    	LEFT JOIN organizacion ON folios.Organizacion = organizacion.Id_Organizacion 
    	WHERE NroFolio = :NroFolio");
    $query ->bindParam(":NroFolio",$idFolio);
    $query->execute();
    $result = $query->fetch();*/

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image($maindir.'assets/img/logo-cienciasjuridicas.png' , 10 ,8, 20 , 20,'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(120, 10, '			Reporte de Seguimientos del Folio', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Hoy: '.date('d-m-Y').'', 0);
$pdf->Ln(20);
$pdf->Cell(115, 8, 'Folio: ', 0);
$pdf->Ln(5);
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
$pdf->Output('reporte.pdf','I');
?>