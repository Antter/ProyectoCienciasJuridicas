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
                                    <label>Experiencia Laboral</label>
                                </h4>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Número de identidad</label>
                                            <select id="ideLab" name="ideLab" class="form-control">
                                                <?php
                                                $pa=mysql_query("SELECT N_identidad FROM persona");
                                                while($row=mysql_fetch_array($pa)){
                                                    echo '<option value="'.$row['N_identidad'].'">'.$row['N_identidad'].'</option>';
                                                }
                                                ?>
                                            </select>
                                            <div class="form-group">
                                                </br><label><h3>Nueva experiencia laboral</h3></label></br>
                                                </br><label>Nombre de la empresa</label>
                                                <input id="nombreEmpresa" class="form-control" name="nombreEmpresa" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tiempo (número de meses)</label>
                                                <input id="tiempoLab" class="form-control" name="tiempoLab" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Cargo</label>
                                                <select id="cargo" name="cargo" class="form-control">
                                                    <?php
                                                    $pa=mysql_query("SELECT Cargo FROM cargo");
                                                    while($row=mysql_fetch_array($pa)){
                                                        echo '<option value="'.$row['Cargo'].'">'.$row['Cargo'].'</option>';
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
                    <button type="submit" class="btn btn-primary" id="explab">Guardar Información</button>
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
        x = $("#explab");
        x.click(agregarexplab);
    }


    function agregarexplab()
    {
        data={
            ideLab:$('#ideLab').val(),
            nombreEmpresa:$('#nombreEmpresa').val(),
            tiempoLab:$('#tiempoLab').val()
        };

        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            beforeSend: inicioEnvio,
            success: llegadaExpLab,
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

    function llegadaExpLab()
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