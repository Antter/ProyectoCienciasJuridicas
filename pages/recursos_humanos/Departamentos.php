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
            x.ready(guardarDepartamento);

            function guardarDepartamento()
            {
                var x;
                x = $("#guardarDepartamento");
                x.click(insertarDepartamento);

            }


            function insertarDepartamento()
            {



                data = {
                    departamento: $('#nombreDepartamento').val()
                };

                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaInsertarDepartamento,
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

            function llegadaInsertarDepartamento()
            {
                $("#contenedor2").load('Datos/insertarDepartamento.php', data);
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
                <h1 class="page-header">Ingreso de Datos del Departamento</h1>
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
                                        <label>Nombre Departamento</label>
                                        <input type="text" class="form-control" id="nombreDepartamento">
                                    </div>

                                    <button type="button"  id="guardarDepartamento" class="btn btn-primary">Agregar</button>
                                    <button type="reset" class="btn btn-default">Cancelar</button>
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
            include '../../Datos/cargarDepartamentos.php';
            ?>
        </div>

    </body>

</html>
