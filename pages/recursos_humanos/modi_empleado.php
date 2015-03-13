<?php

include '../../Datos/conexion.php';



$codigoE = $_POST['codigo'];

 $resultado=mysql_query("SELECT * FROM empleado inner join persona on empleado.N_identidad=persona.N_identidad inner join departamento_laboral on departamento_laboral.Id_departamento_laboral=empleado.Id_departamento Where estado_empleado='1' and No_Empleado='".$codigoE."'");
 $resultado2=mysql_query("SELECT * FROM empleado_has_cargo inner join cargo on cargo.ID_cargo=empleado_has_cargo.ID_cargo where No_Empleado='".$codigoE."'");
 if($row=mysql_fetch_array($resultado)){
     
     
      $nombreE=$row['Primer_nombre'];
      $apellidoE=$row['Primer_apellido'];
      $depE=$row['nombre_departamento'];
      $depID=$row['Id_departamento_laboral'];
      $obsE=$row['Observacion'];
      $noE=$row['N_identidad'];
    
     
 

          
         
 }
 
 
 if($row2=mysql_fetch_array($resultado2)){
     
      $cargoE=$row2['Cargo'];
     $idCargoE=$row2['ID_cargo'];
      $fechaE=$row2['Fecha_ingreso_cargo'];
 }
 
 

?>

<!DOCTYPE html>
<html lang="utf-8">

<head>

    <meta charset="utf-8">
    
    
    
    
    
     <script>

            /* 
             * To change this license header, choose License Headers in Project Properties.
             * To change this template file, choose Tools | Templates
             * and open the template in the editor.
             */
           alert('hola como le va');
            var x;
            x = $(document);
            x.ready(ActualizarEmpleado);
            
            function ActualizarEmpleado()
            {
               
                var x;
                x = $("#ActualizarE");
                x.click(Actualizar);
                
            }


            function Actualizar()
            {
               
               
                alert('holaaaaa');
                data={
                    codigoE:$('#codEm').val(),
                    nidentidadE:$('#idEm').val(),
                    cargoE:$('#cargoEm').val(),
                    departE:$('#depEm').val(),
                    fechaE:$('#fechaEm').val(),
                    obsE:$('#obsEm').val()
                };
                
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: ActualizarEmple,
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

            function ActualizarEmple()
            {
                $("#contenedor").load('Datos/actualizarEmpleado.php',data);
                //$("#contenedor").load('../cargarPOAs.php');
            }
            

            function problemas()
            {
                $("#contenedor").text('Problemas en el servidor.');
            }



        </script>
        
    
    


</head>

<body>
        
    <h1>Editar datos de empleado</h1>
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
                                    <label>Codigo Empleado</label>
                                    <input class="form-control" name="cod_empleado" id="codEm" value= "<?Php echo $codigoE ?>"   required> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->

                                </div>

                                <div class="form-group">
                                    <label>Primer Nombre</label>
                                    <input class="form-control" name="Primer_nombre" id="pnE" value= "<?Php echo $nombreE ?>" readonly> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->

                                </div>




                                <!-- ---------------------------------------   -->

                            </form>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label>Numero de identidad</label>
                                <input class="form-control" name="Primer_nombre" id="idEm" value= "<?Php echo $noE ?>" readonly> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->

                            </div>


                            <div class="form-group">
                                <label>Primer Apellido</label>
                                <input class="form-control" name="Primer_apellido" id="paE" value= "<?Php echo $apellidoE ?>" readonly> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->

                            </div>

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



                                <!-- ---------------------------------------   -->

                                <label><h5><strong>Departamento laboral :</strong></h5></label>
                                <div class="form-group">


                                    <select name='depar' id="depEm">

                                        <?php
                                        $consulta_mysql = "SELECT * FROM `departamento_laboral`";
                                        $resultado3 = mysql_query($consulta_mysql);
                                        //$rec=mysql_fetch_array($resultado3);



                                        while ($row = mysql_fetch_array($resultado3)) {

                                            $id = $row['Id_departamento_laboral'];

                                            if ($id == $depID) {
                                                echo "<option selected value = '" . $row['Id_departamento_laboral'] . "'>";
                                            } else {
                                                echo "<option value = '" . $row['Id_departamento_laboral'] . "'>";
                                            }

                                            echo $row["nombre_departamento"];

                                            echo "</option>";
                                        }
                                        ?>



                                    </select>
                                </div>

                                <div>
                                    <label></label>
                                </div>


                                <label><h5><strong>Cargo :</strong></h5></label>
                                <div class="form-group" >


                                    <select name='cargo' id="cargoEm">

<?php
$consulta_mysql = "SELECT * FROM `cargo`";
$rec = mysql_query($consulta_mysql);



while ($row = mysql_fetch_array($rec)) {
    $id = $row['ID_cargo'];

    if ($id == $idCargoE) {
        echo "<option selected value = '" . $row['ID_cargo'] . "'>";
    } else {
        echo "<option value = '" . $row['ID_cargo'] . "'>";
    }

    echo $row['Cargo'];

    echo "</option>";
}
?>
                                    </select>
                                </div>








                                <label><h5><strong>Fecha de ingreso como empleado :</strong></h5></label>
                                <div class="form-group" >


                                    <input type="date" name="Fecha" id="fechaEm" value="<?Php echo $fechaE ?>" /> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->


                                </div>



                                <div class="form-group">
                                    <label><h4><strong>Obeservaciones :</strong></h4></label> <br /><textarea name="comentarios" rows="3" cols="50" id="obsEm" value=" <?php echo $obsE; ?> " ><?php echo $obsE; ?></textarea>
                                </div>




                             
                                <button id="ActualizarE" class="btn btn-primary">Guardar cambios</button>
                                <button type="reset" class="btn btn-default">Cancelar</button>
                           


                            </form>




                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>




    
        
    </body>
    
 
            



