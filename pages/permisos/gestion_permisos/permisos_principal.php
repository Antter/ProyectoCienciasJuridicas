<?php

    $maindir = "../../";

  if(isset($_GET['contenido']))
    {
      $contenido = $_GET['contenido'];
    }
  else
    {
      $contenido = 'permisos';
    }

  require_once($maindir."funciones/check_session.php");

  require_once($maindir."funciones/timeout.php");

  require_once($maindir."pages/navbar.php");

?>

<html lang ="en">
<body>
 

        <!-- Navigation -->
	 <div class="container-fluid">
         <div class="row">
             <div class="col-sm-2">

		   <ul class="list-unstyled">
		   <li class="nav-header active"> <a href="#"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
		   <hr>
		   
			<li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu"> 
			
			<?php 
				if($rol == 100){
					echo "<li><h5><i class='glyphicon glyphicon-pencil'></i> Mantenimiento <i class='glyphicon glyphicon-chevron-down'></i></h5>";
					echo "<ul class='list-unstyled collapse in' id='userMenu'> <li><a id='motivos' href='#'>Motivos</a></li> <li><a id='unidad' href='#'>Unidad Academica</a></li> <li><a id='edificios' href='#'>Edificios</a></li> <li><a id='nusuario' href='#'>Crear Usuario</a></li> </ul> </li> ";
					
				}
			?>
			
			</li>		
			<li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu2">
			<h5> <i class="fa fa-edit fa-fw" ></i> Solicitudes <i class="glyphicon glyphicon-chevron-down"></i></h5>
					
				<ul class="list-unstyled collapse in" id="userMenu2">
						<li>
							<a id="solicitud" href="#">Envío</a>
						</li>
						<?php
							if($rol==30 or $rol>=50){
							echo "<li><a id ='revision' href='#'>Revisión</a></li>";
							}
						
						?>	
						</ul>
				</li>
			
				<!-- /.nav-second-level -->
	
			<li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu3">
				<h5><i class="glyphicon glyphicon-book"></i> Reportes<i class="glyphicon glyphicon-chevron-down"></i></h5>
					
				<ul class="list-unstyled collapse in" id="userMenu3">
			
						<?php
							if($rol>=50){
							echo "<li><a id='reportetotal' href='#'><i class='fa fa-table fa-fw'></i>Reporte: Completo</a></li>";
							echo "<li><a id='reportetrimestral' href='#'><i class='fa fa-table fa-fw'></i>Reporte: Trimestral</a></li>";
							}
						?>	
                        						
                </ul>
            </li>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
  <?php $idusuario= $_SESSION['user_id']; ?> 

<?php 

	$rol = $_SESSION['user_rol'];
	require_once("../../conexion/conn.php"); 
	$conexion = mysqli_connect($host, $username, $password, $dbname);
	$encontro=1;
		//$query1 = mysqli_query($conexion, "SELECT Id_departamento FROM empleado where ='".$unidad."'");
		$query = mysqli_query($conexion, "SELECT  Id_departamento, No_Empleado FROM empleado where No_Empleado in (Select No_Empleado from usuario where id_Usuario='".$idusuario."')");
		mysqli_data_seek ($query,0);
		$extraido = mysqli_fetch_array($query);
//		echo $extraido['No_Empleado'];
	
		
		
		$consulta  = mysqli_query($conexion, "Select permisos.id_Permisos, Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_Apellido, dias_permiso, 
			DATE_FORMAT(fecha,'%d-%m-%Y') as fecha, hora_inicio, hora_finalizacion, motivos.descripcion as mtd, 
			departamento_laboral.nombre_departamento,estado from permisos inner join motivos on permisos.id_motivo=motivos.Motivo_ID 
			inner join empleado on empleado.No_Empleado=permisos.No_Empleado inner join persona on persona.N_identidad=empleado.N_identidad 
			inner join departamento_laboral on departamento_laboral.id_departamento_laboral = permisos.id_departamento where  
			 permisos.id_departamento = '".$extraido['Id_departamento']."' and permisos.No_Empleado='".$extraido['No_Empleado']."' ORDER BY fecha asc");
	
?>
  
   <div class="col-sm-9">
           <div class="row mt">
                  <div class="col-md-12">
                      <div id="contenedor" class="content-panel">
				   

                        <div class="col-lg-12">
                            <h1 class="page-header">Mis Solicitudes!</h1>
                        </div>
                        <div class="panel-heading">
						
                            Estado de sus Solicitudes  .
							
							
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
								<th><strong>Estado</strong></th>
								
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
			$estado = $row['estado'];
			
            
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
					$estado              
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
           </div>
                        </div>
						<div class="panel-body">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
 </div>
    <script type="text/javascript" src="js/gestion_permisos/principal.js" ></script> 
<!--	<script type="text/javascript" src="js/jquery-2.1.1.min.js" ></script>-->
	
</body>
</html>
	