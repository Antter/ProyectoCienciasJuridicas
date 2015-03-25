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
                        <div class="panel-footer">
                            <span class="pull-left">Ingresar</span>
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
                                <div>Actualizar</div>
                            </div>
                        </div>
                    </div>
                    <a id="actualizar" href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Ingresar</span>
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
                                <div>Eliminar</div>
                            </div>
                        </div>
                    </div>
                    <a id="eliminar" href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Ingresar</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Teléfono(s) de persona</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row ex2">
        <a>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
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
                    <a id="agregarTel" href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Ingresar</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </a>
        <a>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div>Actualizar</div>
                            </div>
                        </div>
                    </div>
                    <a id="actualizarTel" href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Ingresar</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </a>
        <a>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div>Eliminar</div>
                            </div>
                        </div>
                    </div>
                    <a id="eliminarTel" href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Ingresar</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </a>
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
            var x;
            x = $("#agregar");
            x.click(agregar);
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
            $("#container").load('pages/recursos_humanos/cv/actualizar/.php');
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
            $("#container").load('pages/recursos_humanos/cv/actualizar/.php');
        }
        function llegadaEliminarTel()
        {
            $("#container").load('pages/recursos_humanos/cv/eliminar/telefono.php');
        }

    </script>