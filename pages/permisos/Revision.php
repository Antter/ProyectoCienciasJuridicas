<?php

  $maindir = "../../";

  if(isset($_GET['contenido']))
  {
    $contenido = $_GET['contenido'];
  }
  else
  {
    $contenido = 'gestion_de_folios';
  }

  require_once($maindir."funciones/check_session.php");

  require_once($maindir."funciones/timeout.php");
  
?>

<?php $idusuario= $_SESSION['user_id']; ?> 

<?php 
	
	$rol = $_SESSION['user_rol'];
	require_once("../../conexion/conn.php"); 
	$conexion = mysqli_connect($host, $username, $password, $dbname);
	if($rol == 30){
		$query = mysqli_query($conexion, "SELECT  Id_departamento FROM empleado where No_Empleado in (Select No_Empleado from usuario where id_Usuario='".$idusuario."')");
		mysqli_data_seek ($query,0);
		$extraido = mysqli_fetch_array($query);
		
		
		$consulta  = mysqli_query($conexion, "Select permisos.id_Permisos, Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_Apellido, dias_permiso, 
			DATE_FORMAT(fecha,'%d-%m-%Y') as fecha, hora_inicio, hora_finalizacion, motivos.descripcion as mtd, 
			departamento_laboral.nombre_departamento from permisos inner join motivos on permisos.id_motivo=motivos.Motivo_ID 
			inner join empleado on empleado.No_Empleado=permisos.No_Empleado inner join persona on persona.N_identidad=empleado.N_identidad 
			inner join departamento_laboral on departamento_laboral.id_departamento_laboral = permisos.id_departamento where permisos.estado = 'En espera' 
			and permisos.id_departamento = '".$extraido['Id_departamento']."' ORDER BY fecha asc");

	}else{
		if($rol == 50){
			$consulta = mysqli_query($conexion, "Select permisos.id_Permisos, Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_Apellido, dias_permiso, 
			DATE_FORMAT(fecha,'%d-%m-%Y') as fecha, hora_inicio, hora_finalizacion, motivos.descripcion as mtd, 
			departamento_laboral.nombre_departamento from permisos inner join motivos on permisos.id_motivo=motivos.Motivo_ID 
			inner join empleado on empleado.No_Empleado=permisos.No_Empleado inner join persona on persona.N_identidad=empleado.N_identidad 
			inner join departamento_laboral on departamento_laboral.id_departamento_laboral = permisos.id_departamento where permisos.estado = 'En espera' 
			and permisos.dias_permiso >= '3' ORDER BY fecha asc");
		}
	}
?>

<!DOCTYPE html>

<html lang="en">


<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<!--<script type="text/javascript" src="../SistemaCienciasJuridicas/js/jquery-2.1.3.js"></script>-->
	
<body>

    <div id="wrapper">
		<h1 class="page-header">Control de Permisos </h1>
			<div class="box">
            <div class="box-header">
           
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
		    <?php
            
			    echo <<<HTML
					<table id="tabla_Solicitudes" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th><strong>Permiso</strong></th>
								<th><strong> Nombre</strong></th>
								<!--<th><strong>Segundo Nombre</strong></th>
								<th><strong>Primer Apellido</strong></th>
								<th><strong>Segundo Apellido</strong></th>-->
								<th><strong>Días</strong></th>
								<th><strong>Fecha Solicitud</strong></th>
								<th><strong>Hora Inicio Nombre</strong></th>
								<th><strong>Hora Finalización</strong></th>												
								<th><strong>Motivo</strong></th>
								<th><strong>Departamento</strong></th>
								<th><strong>Aprobar</strong></th>
								<th><strong>Denegar</strong></th>
							</tr>
						</thead>
						<tbody>
HTML;

            while ($row = mysqli_fetch_array($consulta))  {

            $idP = $row['id_Permisos'];
            $pnombre = $row['Primer_nombre'];
			$snombre = $row['Segundo_nombre'];
			$papellido = $row['Primer_apellido'];
			$sapellido = $row['Segundo_Apellido'];
			$dias = $row['dias_permiso'];
			$fecha = $row['fecha'];
            $horaI = $row['hora_inicio'];
			$horaF = $row['hora_finalizacion'];			
			$motivo = $row['mtd'];
			$Depto = $row['nombre_departamento'];
			
            
                echo "<tr data-id='".$idP."'>";
                echo <<<HTML
                <td>$idP</td>

HTML;
                //echo <<<HTML <td><a href='javascript:ajax_("'$url'");'>$NroFolio</a></td>HTML;
                echo <<<HTML
                <td>
				
				$pnombre
			    $snombre 
				$papellido 
				$sapellido 
				
				
</td>
HTML;
    
                echo <<<HTML
                <td>$dias</td>
HTML;
                echo <<<HTML
                <td>$fecha</td>
HTML;
                echo <<<HTML
                <td>$horaI</td>
HTML;
                echo <<<HTML
                <td>$horaF</td>
HTML;
                echo <<<HTML
                <td>$motivo</td>
HTML;
                echo <<<HTML
                <td>$Depto</td>
               
                <td><center>
					<button class="aprobarb btn btn-primary glyphicon glyphicon-thumbs-up"  title="Aprobar">
                </center></td>
				
				<td><center>
					<button class="denegarb btn btn-primary glyphicon glyphicon-edit"  title="Denegar">
                </center></td>
                        
HTML;
                echo "</tr>";

            }

     /*              echo <<<HTML
                                    </tbody>
								<tfoot>                                    
                                    <tr>
										<th><strong>Permiso</strong></th>
										<th><strong>Primer Nombre</strong></th>
										<th><strong>Segundo Nombre</strong></th>
										<th><strong>Primer Apellido</strong></th>
										<th><strong>Segundo Apellido</strong></th>
										<th><strong>Días</strong></th>
										<th><strong>Fecha Solicitud</strong></th>
										<th><strong>Hora Inicio Nombre</strong></th>
										<th><strong>Hora Finalización</strong></th>												
										<th><strong>Motivo</strong></th>
										<th><strong>Unidad Academica</strong></th>
										<th><strong>Aprobar</strong></th>
										<th><strong>Denegar</strong></th>
									</tr>                                            
								</tfoot>
				</table>
HTML;*/
             
            ?>
           </div><!-- /.box-body -->
       </div><!-- /.box -->
</div>

<script language="javascript" type="text/javascript">

var x;
x = $(document);
x.ready(inicio);

	function inicio()
	{
		var x;
		x = $(".aprobarb");
		x.click(Aprobacion);
		
		var x;
		x = $(".denegarb");
		x.click(Denegacion);
	};
	
	function Aprobacion()
	{
		var pid=$(this).parents("tr").find("td").eq(0).html();
		
		data ={codigo:pid, usr:<?php echo $idusuario; ?>}; 
		$.ajax({
			async: true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
		    url:"../SistemaCienciasJuridicas/pages/permisos/aprobarSolicitud.php",  
			beforeSend: inicioEnvio,
			success: llegadaAprobar,
			data:data,
			timeout: 4000,
			error: problemas
		});
		return false;
	}
	
	function Denegacion()
	{
		var pid=$(this).parents("tr").find("td").eq(0).html();
		
		data ={codigo:pid, usr:<?php echo $idusuario; ?>}; 
		$.ajax({
			async: true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
		    url:"../SistemaCienciasJuridicas/pages/permisos/denegarSolicitud.php",  
			beforeSend: inicioEnvio,
			success: llegadaAprobar,
			data:data,
			timeout: 4000,
			error: problemas
		});
		return false;
	}
            
	function inicioEnvio()
	{
		var x = $("#contenedor");
		x.html('Cargando...');
	}
	
	function llegadaAprobar()
	{
		alert("Transacción completada correctamente");
		$("#contenedor").load('pages/permisos/revision.php',data);
	}
	
	//Muestra un mensaje de error cuando la transacción falla
	function problemas()
	{
    $("#contenedor").text('Problemas en el servidor.');
	}

</script>

					
</body>
</html>
