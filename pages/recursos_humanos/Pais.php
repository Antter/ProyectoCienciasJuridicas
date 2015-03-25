<?php
 include ('../../Datos/conexion.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
        <meta charset="UTF-8">
        <title></title>
        
        
        <script>

            /* 
             * To change this license header, choose License Headers in Project Properties.
             * To change this template file, choose Tools | Templates
             * and open the template in the editor.
             */

            var x;
            x = $(document);
            x.ready(guardarPais);
            
            function guardarPais()
            {
                var x;
                x = $("#guardarpais");
                x.click(insertarpais);
                
            }


            function insertarpais()
            {
                
                
                
                data={
                    Pais:$('#nombrepais').val()
                };
                
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaInsertarPais,
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

            function llegadaInsertarPais()
            {
                $("#contenedor2").load('Datos/insertarPais.php',data);
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
            <h1 class="page-header">Ingreso de Datos del Pais</h1>
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
                            <form role="form" action="#" method="POST">
                                <div class="form-group">
                                    <label>Nombre Pais</label>
                                    <input type="text" class="form-control" id="nombrepais">
                                    <p class="help-block">Ejemplo: Honduras, Mexico, Estados Unidos</p>
                                </div>

                                <button type="button"  id="guardarpais" class="btn btn-primary" >Agregar</button>
                                <button type="reset" class="btn btn-default">Cancelar</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                            <form role="form">
                                <fieldset enabled>

                                    <h4>Pais Registrados</h4>
                                    <ol>
                                        <li>Honduras</li>
                                        <li>Mexico</li>
                                        <li>Estados unidos</li>
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
        
        

        include '../../Datos/cargaPais.php';
      
        
     
        ?>
    </div>
    
    
 


    


</body>

</html>
