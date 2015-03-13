<?php

include ('../../Datos/conexion.php');

?>


<!--mysql_connect("localhost","root",""); 
mysql_select_db("sistema_ciencias_juridicas"); -->


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    
    
    
      <script>
        
           var x;
            x = $(document);
            x.ready(guardarUni);
            
            function guardarUni()
            {
                var x;
                x = $("#guardarUni");
                x.click(insertarUni);
                
            }


            function insertarUni()
            {
                var pnombre= $("#nombreU").val();
                //alert(pnombre);
                var pais=$("#idpais").val();
               // alert(pais);
                
                data={
                    nombre:$('#nombreU').val(),
                    pais:$("#idpais").val()
                };
                
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaInsertarUni,
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

            function llegadaInsertarUni()
            {
                $("#contenedor2").load('Datos/insertarUniversidad.php',data);
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
                <h1 class="page-header">Ingreso de Datos de Universidad</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Llene los campos a continuación solicitados
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">

                                <form role="form" action="#" method='POST'>
                                    <div class="form-group">
                                        <label>Nombre de la Universidad</label>
                                        <input class="form-control" id="nombreU"  name="nombre" required>

                                    </div>



                                    <div class="form-group">
                                        <label>Pais</label>

                                        <select name='pais' id="idpais">
                                            <?php
                                            $consulta_mysql = "SELECT * FROM `pais`";
                                            $rec = mysql_query($consulta_mysql);



                                            while ($row = mysql_fetch_array($rec)) {
                                                echo "<option value = '" . $row['Id_pais'] . "'>";

                                                echo $row["Nombre_pais"];

                                                echo "</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>


                                    <button id="guardarUni" class="btn btn-primary">Guardar</button>
                                    <button type="reset" class="btn btn-default">Cancelar</button>


                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">
                                <form role="form">
                                    <fieldset enabled>

                                        <h4>Ejemplo Universidades </h4>
                                        <ol>
                                            <li>UNAH</li>
                                            <li>Unitec</li>
                                            <li>José Cecilio del Valle</li>
                                        </ol>										 
                                    </fieldset>
                                </form>
                            </div>
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
        <!-- /.row -->

        <!-- /#page-wrapper -->





   


  <div id="contenedor2" class="panel-body">
        <?php
        
        

        include '../../Datos/cargarUniversidad.php';
      
        
     
        ?>
    </div>
    
        
        

</body>

</html>



