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
/*
	require_once("../../conexion/conn.php");  
	$conexion = mysqli_connect($host, $username, $password, $dbname);
	$query  = mysqli_query($conexion, " 
	Select  Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_Apellido,  
	departamento_laboral.nombre_departamento, COUNT(permisos.id_Permisos) as Solicitudes from permisos inner join motivos on permisos.id_motivo=motivos.Motivo_ID 
	inner join empleado on empleado.No_Empleado=permisos.No_Empleado inner join persona on persona.N_identidad=empleado.N_identidad 
	inner join departamento_laboral on departamento_laboral.id_departamento_laboral = permisos.id_departamento where permisos.estado = 'Aprobado' 
	GROUP BY Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_Apellido, departamento_laboral.nombre_departamento ORDER BY Primer_nombre asc");
	 */
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
			echo "En construccion";
            /*
			    echo <<<HTML
					<table id="tabla_Solicitudes" class="table table-bordered table-striped">
						<thead>
							<tr>
								
								<th><strong> Nombre</strong></th>
								<!--<th><strong>Segundo Nombre</strong></th>
								<th><strong>Primer Apellido</strong></th>
								<th><strong>Segundo Apellido</strong></th>-->
								<th><strong>Departamento</strong></th>
								<th><strong>Cantidad Solicitudes</strong></th>
								
							</tr>
						</thead>
						<tbody>
HTML;

            while ($row = mysqli_fetch_array($query))  {

           
            $pnombre = $row['Primer_nombre'];
			$snombre = $row['Segundo_nombre'];
			$papellido = $row['Primer_apellido'];
			$sapellido = $row['Segundo_Apellido'];			
			$Depto = $row['nombre_departamento'];
			$idP = $row['Solicitudes'];
			
            
                echo <<<HTML
                <td>
				
				
				$pnombre
			     $snombre 
				$papellido 
				$sapellido 
				
				
</td>
HTML;
 
     
                echo <<<HTML
                <td>$Depto</td>
HTML;
                echo <<<HTML
                <td>$idP</td>

               
            
      
                        
HTML;
                echo "</tr>";

            }


             */
            ?>
           </div><!-- /.box-body -->
       </div><!-- /.box -->
</div>



					
</body>
</html>