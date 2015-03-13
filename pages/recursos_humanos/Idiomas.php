<?php
 include ('../../Datos/conexion.php');

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ingreso de Idiomas</h1>
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
                                            <label>Nombre del Idioma</label>
                                            <input id="nombreIdioma" class="form-control" >

                                        </div>

                                        <button id="guardarIdioma" type="submit" class="btn btn-default">Agregar</button>
                                        <button type="reset" class="btn btn-default">Cancelar</button>


                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">

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

            <div>
            
            </div>
            


            <div id="contenedor2" >
                <?php
                include '../../Datos/cargarIdiomas.php';
                ?>


            </div>

 <script>

            /* 
             * To change this license header, choose License Headers in Project Properties.
             * To change this template file, choose Tools | Templates
             * and open the template in the editor.
             */

            var x;
            x = $(document);
            x.ready(guardarIdioma);
            function guardarIdioma()
            {
                var x;
                x = $("#guardarIdioma");
                x.click(insertarIdioma);
             
            }

            function insertarIdioma()
            {
                data={
                    nombreIdioma:$('#nombreIdioma').val()
                }
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaInsertarIdiomas,
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

            function llegadaInsertarIdiomas()
            {
                $("#contenedor2").load('Datos/insertarIdiomas.php',data);
                //$("#contenedor").load('../cargarPOAs.php');
            }

            function problemas()
            {
                $("#contenedor2").text('Problemas en el servidor.');
            }



        </script>



</body>
</html>
