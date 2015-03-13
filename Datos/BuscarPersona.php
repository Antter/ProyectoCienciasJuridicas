<?php

//include '../Datos/conexion.php';

     require_once('funciones.php');
	
	$nombre='';	
	$apellido='';
	$id='';
	$pais='';
	
	$enlace = mysql_connect('localhost', 'root', '');
mysql_select_db("sistema_ciencias_juridicas", $enlace);
	
	  if (isset($_POST['idpersona'])) 
    {
	  $id=$_POST['idpersona'];
	  $pa = mysql_query("SELECT * FROM persona WHERE N_identidad='".$id."'");
            
      //$pa=mysql_query("SELECT * FROM persona WHERE N_identidad='$id'");			  
		if($row=mysql_fetch_array($pa)){
			$existe=TRUE;
			
			
			$nombre=$row['Primer_nombre'] ;
                        $apellido=$row['Primer_apellido'] ;
			//echo $nombre;
			
			
		}
                else{
                    
               echo mensajes('No se encontro ningun registro','azul');

                    
                }
    }
    
   ?>
<!DOCTYPE html>
<html>
    
    <head>
        <script>
         var x;
            x = $(document);
            x.ready(inicio);
            
            function inicio()
            {
                
                var x;
                x = $("#Empleado");
                x.click(agregar);
                
            }


            function agregar()
            {
              // var c= $("$date("Y-m-d")").val();
               //alert(c);
                //var i=$("#idp").val();
                 //alert(i);
                 //var o=$("#obs").val();
                 //alert(o);
                 //var f=$("#fecha").val();
                 //alert(f);
                // var d=$("#cargo").val();
                // alert(d);
                
                data={
                    identi:$('#idp').val(),
                    cod_empleado:$('#cod').val(),
                    fecha:$('#fecha').val(),
                    obs:$('#obs').val(),
                    id_dep:$('#depar').val(),
                    cargo:$('#cargo').val()
                };
                
                
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadainsertarEmpleado,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }
            
           
            


            function inicioEnvio()
            {
                var x = $("#contenedor2");
                x.html('Cargando...');
            }

            function llegadainsertarEmpleado()
            {
                $("#contenedor2").load('Datos/insertarEmpleado.php',data);
                //$("#contenedor").load('../cargarPOAs.php');
            }
            

            function problemas()
            {
                $("#contenedor2").text('Problemas en el servidor.');
            }



        </script>
        
        
        
    </head>
    
    <body>


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos Personales
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">       



                                <form role="form" action="#" method="Post">

                                    <div class="form-group">
                                        <label>Numero de identidad</label>
                                        <input class="form-control" name="n_identidad" id="idp" value= "<?Php echo $id ?>"  readonly> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->

                                    </div>

                                    <div class="form-group">
                                        <label>Primer Nombre</label>
                                        <input class="form-control" name="Primer_nombre" value= "<?Php echo $nombre ?>"  readonly> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->

                                    </div>


                                    <div class="form-group">
                                        <label>Primer Apellido</label>
                                        <input class="form-control" name="Primer_apellido" value= "<?Php echo $apellido ?>"  readonly> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->

                                    </div>

                                    <!-- ---------------------------------------   -->

                                </form>

                            </div>
                            <!-- /.col-lg-6 (nested) -->

                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->

                    </div>
                    <!-- /.panel-body -->

                </div>

                <!-- /.panel -->

            </div>

            <!-- /.col-lg-12 -->
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Llene los campos a continuacion solicitados
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6"> 

                                <form role="form" action="#" method="Post">

                                    <div class="form-group">
                                        <label>Codigo Empleado</label>
                                        <input class="form-control" name="cod_empleado" id="cod" required=""> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->

                                    </div>

                                    <!-- ---------------------------------------   -->


                                    <div class="form-group">
                                        <label>Departamento</label>

                                        <select name='depar' id="depar">

                                            <?php
                                            $consulta_mysql = "SELECT * FROM `departamento_laboral`";
                                            $rec = mysql_query($consulta_mysql);



                                            while ($row = mysql_fetch_array($rec)) {
                                                echo "<option value = '" . $row['Id_departamento_laboral'] . "'>";

                                                echo $row["nombre_departamento"];

                                                echo "</option>";
                                            }
                                            ?>



                                        </select>
                                    </div>




                                    <!-- ---------------------------------------   -->

                                    <div class="form-group" >
                                        <label>Cargo</label>

                                        <select name='cargo' id="cargo">

                                            <?php
                                            $consulta_mysql = "SELECT * FROM `cargo`";
                                            $rec = mysql_query($consulta_mysql);



                                            while ($row = mysql_fetch_array($rec)) {
                                                echo "<option value = '" . $row['ID_cargo'] . "'>";

                                                echo $row["Cargo"];

                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group" >
                                        <label>Fecha de ingreso como empleado</label>
                                        <input type="date" name="Fecha" id="fecha" /> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->


                                    </div>



                                    <div class="form-group">
                                        <strong>Observacion:</strong> <br /><textarea name="comentarios" rows="3" cols="50" id="obs" ></textarea>
                                    </div>





                                    <button id="Empleado" class="btn btn-primary">Agregar empleado</button>
                                    <button type="reset" class="btn btn-default">Cancelar</button>



                                </form>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    </body>





</html>