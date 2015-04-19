<?php

require_once('../../../Datos/conexion.php');

 $consulta1 = "select Tipo_estudio from tipo_estudio";
 $resultado1 = mysql_query($consulta1);
 $tipo_estudio = mysql_fetch_array($resultado1);
 
   if(isset($_POST["tipoProcedimiento"])){
    $tipoProcedimiento = $_POST["tipoProcedimiento"];
    
    if($tipoProcedimiento == "insetarPersona"){
       
    require_once('../../../pages/recursos_humanos/cv/nuevo/personaAgregar.php');
    }
   }
 

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
                nacionalidad:$('#nacionalidad').val(),
                tipoProcedimiento:"insetarPersona",
                agregarPE:"si"
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
                $("#contenedor2").load('pages/recursos_humanos/cv/consultaRH.php',data);
                
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
            $('body').removeClass('modal-open');
            $("#contenedor").load('pages/recursos_humanos/cv/menuPersona.php',data3);
        }
        
           function problemasInsertar()
            {
                $("#contenedor").text('Problemas en el servidor.');
            }
            

            

         </script>
         
             <script src="pages/recursos_humanos/cv/validacion.js"></script>
<script>
    $(function(){
        $('#identidad').validCampo('0123456789-');
        $('#primerNombre').validCampo(' abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ');
        $('#segundoNombre').validCampo(' abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ');
        $('#primerApellido').validCampo(' abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ');
        $('#segundoApellido').validCampo(' abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ');
        $('#nacionalidad').validCampo(' abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ');
    });
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
    
    
             <?php
 
  if(isset($codMensaje) and isset($mensaje)){
    if($codMensaje == 1){
      echo '<div class="alert alert-success">';
      echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
      echo '<strong>Exito! </strong>';
      echo $mensaje;
      echo '</div>';
    }else{
      echo '<div class="alert alert-danger">';
      echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
      echo '<strong>Error! </strong>';
      echo $mensaje;
      echo '</div>';
    }
  } 

?>
    
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
    
    
    
    
