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
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Gestión de Inasistencias y Permisos Personales</a>
            </div>
     
            
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
						
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Inserción de Datos
							 <i class="glyphicon glyphicon-chevron-down">
							<span class="fa arrow"></span></a>
                            <ul class="list-unstyled collapse in">
                                <li>
                                    <a id="motivos" href="#">Motivos</a>
                                </li>
                                <li>
                                    <a id="unidad" href="#">Unidad Academica</a>
                                </li>
								<li>
                                    <a id="edificios" href="#">Edificios</a>
                                </li>
                                <li>
                                    <a href="#">Solicitudes <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                    <li>
                                    <a id="solicitud" href="#">Envío</a>
                                    </li>
                                    <li>
                                    <a id ="revision" href="#">Revisión</a>
                                    </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
							<!-- /.nav-second-level -->
						</li>
                        <li>
                            <a href=""><i class="fa fa-table fa-fw"></i> Reportes</a>
                        </li> 
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

		<div id="page-wrapper">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div id="contenedor" class="panel-body">

                        <div class="col-lg-12">
                            <h1 class="page-header">Bienvenido!</h1>
                        </div>
                        <div class="panel-heading">
                            Por favor seleccione en la barra lateral que datos desea ingresar.
                        </div>
						<div class="panel-body">
                            <IMG SRC = "requirements.png">
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script type="text/javascript" src="js/gestion_permisos/principal.js" ></script> 
<!--	<script type="text/javascript" src="js/jquery-2.1.1.min.js" ></script>-->
	
</body>
</html>
	