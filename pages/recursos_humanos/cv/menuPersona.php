<?php

require_once('../../../Datos/conexion.php');

 $consulta1 = "select Tipo_estudio from tipo_estudio";
 $resultado1 = mysql_query($consulta1);
 $tipo_estudio = mysql_fetch_array($resultado1);
 

?>


    <head>    
         <script>
 
          $( document ).ready(function() {

           $("form").submit(function(e) {
	    e.preventDefault();

            data={
                    licencitura:$('#lic').val(),
                    maestria:$("#maestr").val(),
                    doctorado:$("#doc").val()
                   
                };
                
                
            
            $.ajax({
                   async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: busqueda,
                    success: llegadaBusqueda,
                    timeout: 4000,
                    error: problemasbusqueda
            }); 
            return false;
               
	});
        
        
         $("#form2").submit(function(e) {
	    e.preventDefault();
          
            data3={
                identidad:$('#identidad').val(),
                primerNombre:$('#primerNombre').val(),
                segundoNombre:$('#segundoNombre').val(),
                primerApellido:$('#primerApellido').val(),
                segundoApellido:$('#segundoApellido').val(),
                sexo:$('#sexoMas').val(),
                fecha:$('#fecha').val(),
                direccion:$('#direccion').val(),
                email:$('#email').val(),
                estCivil:$('#estCivil').val(),
                nacionalidad:$('#nacionalidad').val()
            };

            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                beforeSend: insertarPersona,
                success: llegadaInsertarPersona,
                timeout: 4000,
                error: problemasInsertar
            });
            return false;
        });
        

   });
            
            

           
   


            function busqueda()
            {
                var x = $("#contenedor2");
                x.html('Cargando...');
            }

            function llegadaBusqueda()
            {
                $("#contenedor2").load('Datos/consultaRH.php',data);
                
            }
            
            function problemasbusqueda()
            {
                $("#contenedor").text('Problemas en el servidor.');
            }

               function insertarPersona()
            {
                var x = $("#contenedor");
                x.html('Cargando...');
            }
            
          function llegadaInsertarPersona()
        {
            $("#contenedor").load('pages/recursos_humanos/cv/nuevo/personaAgregar.php',data3);
        }
        
           function problemasInsertar()
            {
                $("#contenedor").text('Problemas en el servidor.');
            }
            

            

         </script>
        
        
    </head>




<div id="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Personas</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
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
                                <div>Agregar</div>
                            </div>
                        </div>
                    </div>
                    <a id="agregar" href="#">
                        <div class="panel-footer" data-toggle="modal" data-target="#compose-modal" >
                            <span class="pull-left"  >Ingresar</span>
                            <span class="pull-right"  ><i class="fa fa-arrow-circle-right" ></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </a>
        <a>
     
      <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Busqueda por filtros
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" id="form" action="#" method="POST">

                                               <div class="form-group">
                                    <label class="col-lg-6"><h5><strong>Licenciatura :</strong></h5></label>
                               

                                   <div class="col-lg-6">
                                       <select name="lic" class="form-control" id="lic" required>
                                        
                                       
                                        <option value=-1>Ninguna</option>

                                        <?php
                                        $consulta_mysql = "SELECT distinct nombre_titulo FROM `estudios_academico` inner join tipo_estudio on estudios_academico.ID_Tipo_estudio=tipo_estudio.ID_Tipo_estudio where tipo_estudio.tipo_estudio='licenciatura'";
                                        $resultado3 = mysql_query($consulta_mysql);
                                        //$rec=mysql_fetch_array($resultado3);



                                        while ($row = mysql_fetch_array($resultado3)) {

                                          
                                                
                                            
                                                echo "<option value = '" . $row['nombre_titulo'] . "'>";
                                            

                                            echo $row["nombre_titulo"];

                                            echo "</option>";
                                        }
                                        ?>



                                    </select>
                                </div>
                               </div>
                                
                                <br>
                                <br>
                                <br>
                                
                                           <div class="form-group">
                                    <label class="col-lg-6"><h5><strong>Maestria :</strong></h5></label>
                               

                                   <div class="col-lg-6">
                                       <select name="maestr" class="form-control" id="maestr" required>
                                        
                                       
                                        <option value=-1>Ninguna</option>

                                        <?php
                                        $consulta_mysql = "SELECT distinct nombre_titulo FROM `estudios_academico` inner join tipo_estudio on estudios_academico.ID_Tipo_estudio=tipo_estudio.ID_Tipo_estudio where tipo_estudio.tipo_estudio='Maestria'";
                                        $resultado3 = mysql_query($consulta_mysql);
                                        //$rec=mysql_fetch_array($resultado3);



                                        while ($row = mysql_fetch_array($resultado3)) {

                                       
                                            echo "<option value = '" . $row['nombre_titulo'] . "'>";
                                            

                                            echo $row["nombre_titulo"];

                                            echo "</option>";
                                        }
                                        ?>



                                    </select>
                                </div>
                               </div>
                                
                                
                                <br>
                                <br>
                                
                                
                                
                                
                                                 <div class="form-group">
                                    <label class="col-lg-6"><h5><strong>Doctorado :</strong></h5></label>
                               

                                   <div class="col-lg-6">
                                       <select name="doc" class="form-control" id="doc" required>
                                        
                                         
                                        <option value=-1>Ninguno</option>

                                        <?php
                                        $consulta_mysql = "SELECT distinct nombre_titulo FROM `estudios_academico` inner join tipo_estudio on estudios_academico.ID_Tipo_estudio=tipo_estudio.ID_Tipo_estudio where tipo_estudio.tipo_estudio='Doctorado'";
                                        $resultado3 = mysql_query($consulta_mysql);
                                        //$rec=mysql_fetch_array($resultado3);



                                        while ($row = mysql_fetch_array($resultado3)) {

                            
                                           echo "<option value = '" . $row['nombre_titulo'] . "'>";
                                           

                                            echo $row["nombre_titulo"];

                                            echo "</option>";
                                        }
                                        ?>



                                    </select>
                                </div>
                               </div>
                                
                                
                                
                                <br>
                                <br>
                                
                              
                              <button type="submit" name="submit"  id="submit" class="submit btn btn-primary glyphicon glyphicon-search" > Buscar</button>
                           


                            </form>
                        </div>
                       
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

 
 <div id="contenedor2" class="panel-body">
        <?php
        
       

      require_once("../../../Datos/cargarPersonas.php");
         
     
        ?>
 </div>
    
            
            
            
             <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	  <form role="form" id="form2" name="form" action="#">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-floppy-disk"></i> Agregar perfil </h4>
      </div>
              <div class="modal-body">
                  <div id="IngresoPersona" class="form-group">
                      
                        <div class="panel-body">
                            <h1>Ingreso de Información Personal</h1></br>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <label><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Datos Generales</label>
                                            </h4>
                                        </div>
                                            <div class="panel-body">
                                                <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Número de Identidad</label>
                                                            <div class="col-sm-7"><input id="identidad" class="form-control" name="identidad" required></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Primer nombre</label>
                                                            <div class="col-sm-7"><input id="primerNombre" class="form-control" name="primerNombre" required></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Segundo nombre</label>
                                                            <div class="col-sm-7"><input id="segundoNombre" class="form-control" name="segundoNombre"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Primer Apellido</label>
                                                            <div class="col-sm-7"><input id="primerApellido" class="form-control" name="primerApellido" required></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Segundo Apellido</label>
                                                            <div class="col-sm-7"><input id="segundoApellido" class="form-control" name="segundoApellido" required></div>
                                                        </div>
                                                        <div class="form-group" id="sexoOpcion" name="sex">
                                                            <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Sexo</label>
                                                            <div class="col-sm-7"><input type="radio" name="sexo" id="sexoFem" value="F" checked>&nbsp;Femenino
                                                            <input type="radio" name="sexo" id="sexoMas" value="M">&nbsp;Masculino</div>
                                                        </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                   
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Nacionalidad</label>
                                                            <div class="col-sm-7"><input id="nacionalidad" class="form-control" name="nacionalidad" required></div>
                                                        </div>
                                                    <br>
                                                    <br>
                                                    
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><strong><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Fecha de Nacimiento</strong></label>
                                                            <div class="col-sm-7"><input id="fecha" type="date" name="fecha" autocomplete="off" class="input-xlarge" format="yyyy-mm-dd"><br></div>
                                                        </div>
                                                    <br>
                                                    <br>
                                                  
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Estado civil</label>
                                                            <div class="col-sm-7"><select class="form-control" id="estCivil" name="estCivil">
                                                                    <option>Soltero</option>
                                                                    <option>Casado</option>
                                                                    <option>Divorciado</option>
                                                                    <option>Viudo</option>
                                                                </select></div>
                                                        </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <label><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Información de contacto</label>
                                            </h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label">Dirección</label>
                                                    <div class="col-sm-7"><textarea id="direccion" class="form-control" rows="3" name="direccion"></textarea></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Correo electrónico</label>
                                                    <div class="col-sm-7"><input id="email" class="form-control" name="email" required></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </br><div class="alert alert-info" role="alert">IMPORTANTE: Los campos marcados con el signo <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> son obligatorios.</div>
                                    </br><button type="submit" id="guardarp" class="btn btn-primary">Guardar Información</button>
                                </div>
                        </div>
                   
                    <!-- /.panel -->
                
                <!-- /.col-lg-12 -->
         
                      
                      
                      
                      
                      
               
                       
                  </div>
                 
              </div>
           <!--  <div class="modal-footer clearfix">
            <button name="submit" id="submit" class="insertarbg btn btn-primary pull-left"><i class="glyphicon glyphicon-pencil"></i> Insertar</button>
          </div>
           -->
                
                    
          </form>
    
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
   </div>
    
    
    
    
    <script>

        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

        var x;
        x = $(document);
        x.ready(menuInicioPersonas);
        function menuInicioPersonas()
        {
           // var x;
           // x = $("#agregar");
          //  x.click(agregar);
            var x;
            x = $("#actualizar");
            x.click(actualizar);
            var x;
            x=$("#eliminar");
            x.click(eliminar);
            var x;
            x = $("#agregarTel");
            x.click(agregarTel);
            var x;
            x = $("#actualizarTel");
            x.click(actualizarTel);
            var x;
            x=$("#eliminarTel");
            x.click(eliminarTel);
        }
        function agregar()
        {
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                beforeSend: inicioEnvio,
                success: llegadaAgregar,
                timeout: 4000,
                error: problemas
            });
            return false;
        }
        function actualizar()
        {
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                beforeSend: inicioEnvio,
                success: llegadaActualizar,
                timeout: 4000,
                error: problemas
            });
            return false;
        }

        function eliminar()
        {
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                beforeSend: inicioEnvio,
                success: llegadaEliminar,
                timeout: 4000,
                error: problemas
            });
            return false;
        }
        function agregarTel()
        {
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                beforeSend: inicioEnvio,
                success: llegadaAgregarTel,
                timeout: 4000,
                error: problemas
            });
            return false;
        }
        function actualizarTel()
        {
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                beforeSend: inicioEnvio,
                success: llegadaActualizarTel,
                timeout: 4000,
                error: problemas
            });
            return false;
        }

        function eliminarTel()
        {
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                beforeSend: inicioEnvio,
                success: llegadaEliminarTel,
                timeout: 4000,
                error: problemas
            });
            return false;
        }

        function inicioEnvio()
        {
            var x = $("#container");
            x.html('Cargando...');
        }

        function llegadaAgregar()
        {
            $("#container").load('pages/recursos_humanos/cv/nuevo/infoPersonal.php');
        }
        function llegadaActualizar()
        {
            $("#container").load('pages/recursos_humanos/cv/actualizar/infoPersonal.php');
        }
        function llegadaEliminar()
        {
            $("#container").load('pages/recursos_humanos/cv/eliminar/infoPersonal.php');
        }
        function llegadaAgregarTel()
        {
            $("#container").load('pages/recursos_humanos/cv/nuevo/telefono.php');
        }
        function llegadaActualizarTel()
        {
            $("#container").load('pages/recursos_humanos/cv/actualizar/telefono.php');
        }
        function llegadaEliminarTel()
        {
            $("#container").load('pages/recursos_humanos/cv/eliminar/telefono.php');
        }

    </script>