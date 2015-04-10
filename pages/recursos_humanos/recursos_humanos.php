<?php

    $maindir = "../../";

  if(isset($_GET['contenido']))
    {
      $contenido = $_GET['contenido'];
    }
  else
    {
      $contenido = 'recursos_humanos';
    }

  require_once($maindir."funciones/check_session.php");

  require_once($maindir."funciones/timeout.php");

  require_once($maindir."pages/navbar.php");

?>

<html lang="es">
    <head>
        
    <meta charset="utf-8">
    
    </head>
    
    <body>
	
    <div class="container-fluid">
         <div class="row">
             <div class="col-sm-3">

       <ul class="list-unstyled">
       <li class="nav-header active"> <a href="#"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
       <hr>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
          <h5><i class="fa fa-user fa-fw"></i>Gestion de perfiles <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
            <ul class="list-unstyled collapse in" id="userMenu">
                
                     <li>
                                <a id="personas" href="#">Personas</a>
                            </li>
                            <li>
                                <a id="expAcademica" href="#">Experiencia Academica</a>
                            </li>
                            <li>
                                <a id="formAcad" href="#">Formación Academica</a>
                            </li>
                            <li>
                                <a id="expLab" href="#">Experiencia Laboral</a>
                            </li>
                   
                
            </ul>
        </li>
        
        
        
             <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu2">
          <h5><i class="fa fa-user fa-fw"></i>Gestion de Empleados <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
            <ul class="list-unstyled collapse in" id="userMenu2">
                
                <li><a id="empleado" href="#"><i class="glyphicon "></i>Empleados </a></li>
                <li><a id="gestionGC" href="#"><i class="glyphicon "></i>Gestion de Grupos</a></li>
                
            </ul>
        </li>
        
        
         
        
        
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu3">
          <h5><i class="fa fa-edit fa-fw"></i>Tablas de mantenimiento <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        
            <ul class="list-unstyled collapse" id="menu3">
                <li><a id="idiomas" href="#">Idiomas</a>
                </li>
                <li><a id="clases" href="#">Clases</a>
                </li>
                <li><a id="cargos" href="#">Cargos</a>
                </li>
                <li><a id="universidad" href="#">Universidades</a>
                </li>
                <li><a  id="tipos" href="#">Tipo Estudio</a>
                </li>
                  <li><a id="departamentos" href="#">Departamentos</a>
                </li>
                  <li><a id="comite" href="#">Grupo o Comité</a>
                </li>
                  <li><a id="pais" href="#">Paises</a>
                </li>
				 <li><a id="usuarios" href="#">Usuarios</a>
                </li>
				 <li><a id="roles" href="#">Roles</a>
                </li>
                
            </ul>
        </li>
      </ul>
              <hr>
       </div>
                            
                            
      
       <div class="col-sm-9">
           <div class="row mt">
                  <div class="col-md-12">
                      <div id="contenedor" class="content-panel">


                        <div class="col-lg-12">
                            <h1 class="page-header">Gestion Curricular</h1>
                        </div>
                          

                          
                        <div class="panel-heading">
                            Por favor seleccione en la barra lateral que datos desea ingresar.
                        </div>
                          
                             <div class="row ex2">
                <a>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26</div>
                                        <div>Nuevos perfiles</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </a>
                <a>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">12</div>
                                        <div>Nuevos reportes</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </a>
                <a>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">124</div>
                                        <div>Notificaciones</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </a>
                <a>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-plus-square fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">13</div>
                                        <div>Solicitudes</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
          
             <div class="row">
           <!--     <div class="col-lg-8"> -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Gráfica de Área
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Acciones
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Gráfica de Barras
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Acciones
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>3326</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:29 PM</td>
                                                    <td>$321.33</td>
                                                </tr>
                                                <tr>
                                                    <td>3325</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:20 PM</td>
                                                    <td>$234.34</td>
                                                </tr>
                                                <tr>
                                                    <td>3324</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:03 PM</td>
                                                    <td>$724.17</td>
                                                </tr>
                                                <tr>
                                                    <td>3323</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:00 PM</td>
                                                    <td>$23.71</td>
                                                </tr>
                                                <tr>
                                                    <td>3322</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:49 PM</td>
                                                    <td>$8345.23</td>
                                                </tr>
                                                <tr>
                                                    <td>3321</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:23 PM</td>
                                                    <td>$245.12</td>
                                                </tr>
                                                <tr>
                                                    <td>3320</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:15 PM</td>
                                                    <td>$5663.54</td>
                                                </tr>
                                                <tr>
                                                    <td>3319</td>
                                                    <td>10/21/2013</td>
                                                    <td>2:13 PM</td>
                                                    <td>$943.45</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                        
                     <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                            <a href="#" class="btn btn-default btn-block">View Details</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </div>
                                                
           <!--  </div> -->
                       
                    </div>
                </div>
            </div>
        
       </div>    



    </div>
 </div>

    </div>
    
         <script>

            /* 
             * To change this license header, choose License Headers in Project Properties.
             * To change this template file, choose Tools | Templates
             * and open the template in the editor.
             */

            var x;
            x = $(document);
            x.ready(menuInicioEmpleado);
            function menuInicioEmpleado()
            {
                var x;
                x = $("#clases");
                x.click(clases);
                
                var x;
                x = $("#cargos");
                x.click(cargos);
                
                var x;
                x = $("#pais");
                x.click(paises);
                
                var y;
				y = $("#usuarios");
				y.click(usuarios);
				
				var y1;
				y1 = $("#roles");
				y1.click(roles);
				
                var x;
                x=$("#departamentos");
                x.click(departamentos);
                
                var x;
                x = $("#idiomas");
                x.click(idiomas);
                
                var x;
                x = $("#tipos");
                x.click(tipo);
                var x;
                x = $("#comite");
                x.click(comite);
                
                   
                var x;
                x = $("#idioma");
                x.click(idiomas);
                
                var x;
                x = $("#empleado");
                x.click(empleados);
               
                
                var x;
                x = $("#universidad");
                x.click(universidades);
                
         var x;
        x = $("#personas");
        x.click(personas);
        var x;
        x = $("#expAcademica");
        x.click(expAcademica);
        var x;
        x = $("#expLab");
        x.click(expLab);
        
        var x;
        x = $("#formAcad");
        x.click(formAcad);
        
        var x;
        x = $("#gestionGC");
        x.click(gestiondeGrupos);
        
  
                
                
            }
            function idiomas()
            {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaidioma,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }
            function comite()
            {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadacomite,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }



            function clases()
            {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaClases,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }
            
            function cargos()
            {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaCargos,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }
            function departamentos()
            {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaDepartamentos,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }
            
             function tipo()
            {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaTipos,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }
            
                      
                 function empleados()
            {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaempleado,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }
            
            function paises()
            {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadapais,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }
           
            function usuarios()
            {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaUsuarios,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }
			
			function roles()
            {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaRoles,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }
            
                    function persona()
            {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadapersona,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }
            
            function universidades()
            {
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadauniversidad,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }
            
            function personas()
    {
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            beforeSend: inicioEnvio,
            success: llegadaPersonas,
            timeout: 4000,
            error: problemas
        });
        return false;
    }
    function expAcademica()
    {
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            beforeSend: inicioEnvio,
            success: llegadaexpAcademica,
            timeout: 4000,
            error: problemas
        });
        return false;
    }
    function expLab()
    {
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            beforeSend: inicioEnvio,
            success: llegadaexpLab,
            timeout: 4000,
            error: problemas
        });
        return false;
    }
    function formAcad()
    {
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            beforeSend: inicioEnvio,
            success: llegadaformacad,
            timeout: 4000,
            error: problemas
        });
        return false;
    }
    
        function gestiondeGrupos()
    {
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            beforeSend: inicioEnvio,
            success: llegadagestiondeGrupos,
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

            function llegadaClases()
            {
                $("#contenedor").load('pages/recursos_humanos/Clases.php');
                //$("#contenedor").load('../cargarPOAs.php');
            }
             function llegadaidioma()
            {
                $("#contenedor").load('pages/recursos_humanos/Idiomas.php');
                //$("#contenedor").load('../cargarPOAs.php');
            }
            function llegadacomite()
            {
                $("#contenedor").load('pages/recursos_humanos/Comite_Grupo.php');
                //$("#contenedor").load('../cargarPOAs.php');
            }
               function llegadaCargos()
            {
                $("#contenedor").load('pages/recursos_humanos/Cargos.php');
                //$("#contenedor").load('../cargarPOAs.php');
            }
                function llegadaDepartamentos()
            {
                $("#contenedor").load('pages/recursos_humanos/Departamentos.php');
                //$("#contenedor").load('../cargarPOAs.php');
            }
            
                function llegadaTipos()
            {
                $("#contenedor").load('pages/recursos_humanos/Tipo_estudio.php');
                //$("#contenedor").load('../cargarPOAs.php');
            }
            
               function llegadapais()
            {
                $("#contenedor").load('pages/recursos_humanos/Pais.php');
                //$("#contenedor").load('../cargarPOAs.php');
            }
			
			function llegadaUsuarios()
            {
                $("#contenedor").load('pages/recursos_humanos/Usuarios.php');
                //$("#contenedor").load('../cargarPOAs.php');
            }
			
			function llegadaRoles()
            {
                $("#contenedor").load('pages/recursos_humanos/Roles.php');
                //$("#contenedor").load('../cargarPOAs.php');
            }
            
                     function llegadaempleado()
            {
                $("#contenedor").load('pages/recursos_humanos/Empleados.php');
                //$("#contenedor").load('../cargarPOAs.php');
            }
            
        
            
                 function llegadauniversidad()
            {
                $("#contenedor").load('pages/recursos_humanos/universidades.php');
                //$("#contenedor").load('../cargarPOAs.php');
            }
            
            
             function llegadaPersonas()
    {
        $("#contenedor").load('pages/recursos_humanos/cv/menuPersona.php');
    }
    function llegadaexpAcademica()
    {
        $("#contenedor").load('pages/recursos_humanos/cv/menuExpAcad.php');
    }
    function llegadaexpLab()
    {
        $("#contenedor").load('pages/recursos_humanos/cv/menuExpLaboral.php');
    }
    function llegadaformacad()
    {
        $("#contenedor").load('pages/recursos_humanos/cv/menuformAcad.php');
    }
    
    
      function llegadagestiondeGrupos()
    {
        $("#contenedor").load('pages/recursos_humanos/gestion_Grupos_comite.php');
    }
    

            
            

            function problemas()
            {
                $("#contenedor").text('Problemas en el servidor.');
            }



        </script>
        
        
          <script src="bower_components/raphael/raphael-min.js"></script>
          <script src="bower_components/morrisjs/morris.min.js"></script>
        
     
        
        
    </body>
        
</html>