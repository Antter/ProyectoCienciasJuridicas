<?php

 $maindir = "../../../../";
require_once('../../../../Datos/conexion.php');
require_once($maindir."fpdf/fpdf.php");
require($maindir."conexion/config.inc.php");

$id = $_GET['iden'];

//Datos generales e info de contacto
$resultado=mysql_query("SELECT * FROM persona WHERE N_identidad = '".$id."'");

//Experiencia Académica
$resultado2=mysql_query("SELECT * FROM experiencia_academica WHERE N_identidad= '".$id."'");

//Formación académica
$resultado3=mysql_query("SELECT ID_Estudios_academico, Nombre_titulo, ID_Tipo_estudio, Id_universidad FROM estudios_academico WHERE N_identidad= '".$id."'");

//Experiencia laboral
$resultado4=mysql_query("SELECT ID_Experiencia_laboral, Nombre_empresa, Tiempo FROM experiencia_laboral WHERE N_identidad= '".$id."'");


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image($maindir.'assets/img/logo-cienciasjuridicas.png' , 10 ,8, 20 , 20,'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(120, 10, '			Perfil Persona', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Hoy: '.date('d-m-Y').'', 0);
$pdf->Ln(20);
if($row = mysql_fetch_array($resultado) or die("Error en: " . mysql_error())){
      $id = $row['N_identidad'];
        $pNombre = $row['Primer_nombre'];
        $sNombre = $row['Segundo_nombre'];
        $pApellido = $row['Primer_apellido'];
        $sApellido = $row['Segundo_apellido'];
        $fNac = $row['Fecha_nacimiento'];
        $sexo = $row['Sexo'];
        $direc = $row['Direccion'];
        $email = $row['Correo_electronico'];
        $estCivil = $row['Estado_Civil'];
        $nacionalidad = $row['Nacionalidad'];
        $nombreC =$pNombre." ".$sNombre." ".$pApellido." ".$sApellido;
$pdf->Cell(120, 9, '                                                                       DATOS GENERALES', 0);
$pdf->Ln(10);


$pdf->Cell(125, 8, 'N�mero de Identidad: '.$row['N_identidad'], 0);
$pdf->Ln(5);
$pdf->Cell(120, 10, 'Nombre Completo: '.$nombreC, 0);
$pdf->Ln(5);
$pdf->Cell(120, 10, 'Sexo: '.$sexo, 0);
$pdf->Ln(5);
$pdf->Cell(120, 10, 'Nacionalidad: '.$nacionalidad, 0);
$pdf->Ln(5);
$pdf->Cell(120, 10, 'Fecha de nacimiento: '.$fNac, 0);
$pdf->Ln(5);
$pdf->Cell(130, 8, 'Estado Civil: '.$estCivil, 0);
$pdf->Ln(15);
$pdf->Cell(120, 9, '                                                                       INFORMACI�N DE CONTACTO', 0);
$pdf->Ln(10);

$pdf->Cell(125, 8, 'Direccion: '.$direc, 0);
$pdf->Ln(5);
$pdf->Cell(125, 8, 'Correo Electronico: '.$email, 0);
$pdf->Ln(15);
//--------

$pdf->Cell(120, 9, '                                                                          EXPERIENCIA ACADEMICA', 0);
while ($row5 = mysql_fetch_array($resultado2)) {
            $id1 = $row5['ID_Experiencia_academica'];
            $inst = $row5['Institucion'];
            $tiempo = $row5['Tiempo'];

$pdf->Ln(10);
 $pdf->Cell(125, 8, 'Nombre de la Empresa: '.$inst, 0);
$pdf->Ln(5);
 $pdf->Cell(125, 8, 'Tiempo (En meses): '.$tiempo, 0);
$pdf->Ln(15);

}

 while ($row2 = mysql_fetch_array($resultado3)){
            $id7 = $row2['ID_Estudios_academico'];
            $titulo = $row2['Nombre_titulo'];
            $s = mysql_query("SELECT Tipo_estudio FROM tipo_estudio WHERE ID_Tipo_estudio = '".$row2['ID_Tipo_estudio']."'");
            $row3 = mysql_fetch_array($s);
            $tipoEs = $row3['Tipo_estudio'];
            $t = mysql_query("SELECT nombre_universidad FROM universidad WHERE Id_universidad = '".$row2['Id_universidad']."'");
            $row4 = mysql_fetch_array($t);
            $univ = $row4['nombre_universidad'];
 
 $pdf->Cell(120, 9, '                                                                          FORMACION ACADEMICA', 0);
 $pdf->Ln(10);
 $pdf->Cell(125, 8, 'Nombre del titulo: '.$titulo, 0);
$pdf->Ln(5);
 $pdf->Cell(125, 8, 'Tipo de Estudio: '.$tipoEs, 0);
$pdf->Ln(5);
$pdf->Cell(125, 8, 'Universidad: '.$univ, 0);
$pdf->Ln(15);
 }

while ($row11 = mysql_fetch_array($resultado4)){
            $id9 = $row11['ID_Experiencia_laboral'];
            $nomEmp = $row11['Nombre_empresa'];
            $tiempo = $row11['Tiempo'];

$pdf->Cell(120, 9, '                                                                          EXPERIENCIA LABORAL', 0);
$pdf->Ln(10);
 $pdf->Cell(125, 8, 'Nombre de la Empresa: '.$nomEmp, 0);
$pdf->Ln(5);
$pdf->Cell(125, 8, 'Tiempo (En meses): '.$tiempo, 0);
$pdf->Ln(15);
}  
  
 
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
 
}*/
}
$pdf->Output('reporte.pdf','I');
?>
