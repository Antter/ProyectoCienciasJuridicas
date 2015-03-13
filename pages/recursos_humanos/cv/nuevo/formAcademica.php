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
        <div class="panel panel-default">
            <div class="panel-heading">
                Agregar Persona
            </div>
            <!-- .panel-heading -->
            <div class="panel-body">
                <form role="form" method="post">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <label>Formación Académica</label>
                                </h4>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Número de identidad</label>
                                            <select id="idforAcad" name="idforAcad" class="form-control">
                                                <?php
                                                $pa=mysql_query("SELECT N_identidad FROM persona");
                                                while($row=mysql_fetch_array($pa)){
                                                    echo '<option value="'.$row['N_identidad'].'">'.$row['N_identidad'].'</option>';
                                                }
                                                ?>
                                            </select>
                                            <div class="form-group">
                                                </br><label><h3>Nueva formación académica</h3></label></br></br>
                                                </br><label>Típo</label>
                                                <select id="tipo" name="tipo" class="form-control">
                                                    <?php
                                                    $pa=mysql_query("SELECT Tipo_estudio FROM tipo_estudio");
                                                    while($row=mysql_fetch_array($pa)){
                                                        echo '<option value="'.$row['Tipo_estudio'].'">'.$row['Tipo_estudio'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Título</label>
                                                <select id="titulo" name="titulo" class="form-control">
                                                    <?php
                                                    $pa=mysql_query("SELECT titulo FROM titulo");
                                                    while($row=mysql_fetch_array($pa)){
                                                        echo '<option value="'.$row['titulo'].'">'.$row['titulo'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Universidad</label>
                                                <select id="universidad" name="universidad" class="form-control">
                                                    <?php
                                                    $pa=mysql_query("SELECT nombre_universidad FROM universidad");
                                                    while($row=mysql_fetch_array($pa)){
                                                        echo '<option value="'.$row['nombre_universidad'].'">'.$row['nombre_universidad'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="foracad">Guardar Información</button>
                </form>
            </div>
            <!-- .panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
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
        x = $("#foracad");
        x.click(agregarforacad);
    }


    function agregarforacad()
    {
        data={
            idforAcad:$('#idforAcad').val(),
            tipo:$('#tipo').val(),
            titulo:$('#titulo').val(),
            universidad:$('#universidad').val()
        };

        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            beforeSend: inicioEnvio,
            success: llegadaForAcad,
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

    function llegadaForAcad()
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