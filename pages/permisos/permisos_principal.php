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
			<li>			
				 <h5><i class="glyphicon glyphicon-pencil"></i> Insercion de Datos <i class="glyphicon glyphicon-chevron-down"></i></h5>
				 
				 <ul class="list-unstyled collapse in" id="userMenu">
			
					<li>
						<a id="motivos" href="#">Motivos</a>
					</li>
					<li>
						<a id="unidad" href="#">Unidad Academica</a>
					</li>
					<li>
						<a id="edificios" href="#">Edificios</a>
					</li>
					</ul>
				</li>
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
							echo "<li><a id='reportetotal' href='#'><i class='fa fa-table fa-fw'></i>Reportes Solicitud</a></li>";
							echo "<li><a id='reportetrimestral' href='#'><i class='fa fa-table fa-fw'></i>Reportes Trimestral</a></li>";
							}
						?>	
                        						
                </ul>
               
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
  
   <div class="col-sm-9">
           <div class="row mt">
                  <div class="col-md-12">
                      <div id="contenedor" class="content-panel">
				   

                        <div class="col-lg-12">
                            <h1 class="page-header">Bienvenido!</h1>
                        </div>
                        <div class="panel-heading">
                            Por favor seleccione en la barra lateral que datos desea ingresar.
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
	