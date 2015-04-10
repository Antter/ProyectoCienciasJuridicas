<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Módulo Curricular</title>
    <!-- CSS -->
    <?php include "../../../../Datos/conexion.php";?>
</head>

<body>

<div class="row">
    <div class="col-lg-12">
            <!-- .panel-heading -->
            <div class="panel-body">
                <form role="form" method="post">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <label>Teléfono de Persona</label>
                                </h4>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Número de identidad</label>
                                            <select id="idTel" name="idTel" class="form-control">
                                                <?php
                                                $pa=mysql_query("SELECT N_identidad FROM persona");
                                                while($row=mysql_fetch_array($pa)){
                                                    echo '<option value="'.$row['N_identidad'].'">'.$row['N_identidad'].'</option>';
                                                }
                                                ?>
                                            </select>
                                            <div class="form-group">
                                                </br><label><h3>Nuevo teléfono</h3></label></br>
                                                <select id="tipo" class="form-control">
                                                    <option value="celular">Celular</option>
                                                    <option value="fijo">Fijo</option>
                                                    <option value="oficina">Oficina</option>
                                                    <option value="otro">Otro</option>
                                                </select>
                                                </br><label>Número de Teléfono</label>
                                                <input class="form-control" name="telef" id="telef" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="telefono">Guardar Información</button>
                </form>
            </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<script src="pages/recursos_humanos/cv/validacion.js"></script>
<script>
    $(function(){
        $('#telef').validCampo('0123456789-+ ');
    });
</script>
<script>

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    var x;
    x = $(document);
    x.ready(inicio);

    function inicio()
    {
        var x;
        x = $("#telefono");
        x.click(telefono);
    }


    function telefono()
    {
        data={
            idTel:$('#idTel').val(),
            tipo:$('#tipo').val(),
            telef:$('#telef').val()
        };

        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            beforeSend: inicioEnvio,
            success: llegadaTel,
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

    function llegadaTel()
    {
        $("#contenedor").load('pages/recursos_humanos/cv/nuevo/personaAgregar.php',data);
    }

    function problemas()
    {
        $("#contenedor").text('Problemas en el servidor.');
    }



</script>
</body>

</html>