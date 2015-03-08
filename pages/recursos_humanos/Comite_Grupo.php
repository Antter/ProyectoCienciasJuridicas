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
                <h1 class="page-header">Ingreso de Comites o Grupos</h1>
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
                                        <label>Nombre del Grupo o Comité</label>
                                        <input id="nombreComite" class="form-control" >

                                    </div>

                                    <button id="guardarComite" type="submit" class="btn btn-default">Agregar</button>
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

        <div id="contenedor2" >
            <?php
            $root = \realpath($_SERVER["DOCUMENT_ROOT"]);
            include "$root\ProyectoIS\ModuloCurricular\Datos\cargarComite.php";
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
            x.ready(guardarComite);
            function guardarComite()
            {
                var x;
                x = $("#guardarComite");
                x.click(insertarComite);

            }

            function insertarComite()
            {
                data = {
                    nombreComite: $('#nombreComite').val()
                }
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaInsertarComite,
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

            function llegadaInsertarComite()
            {
                $("#contenedor2").load('Datos/insertarComite.php', data);
                //$("#contenedor").load('../cargarPOAs.php');
            }

            function problemas()
            {
                $("#contenedor2").text('Problemas en el servidor.');
            }



        </script>



    </body>
</html>
