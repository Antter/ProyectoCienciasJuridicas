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
                                    <label>Experiencia Académica</label>
                                </h4>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Número de identidad</label>
                                            <select id="ideAcad" name="ideAcad" class="form-control">
                                                <?php
                                                $pa=mysql_query("SELECT N_identidad FROM persona");
                                                while($row=mysql_fetch_array($pa)){
                                                    echo '<option value="'.$row['N_identidad'].'">'.$row['N_identidad'].'</option>';
                                                }
                                                ?>
                                            </select>
                                                        <div class="form-group">
                                                            </br><label><h3>Nueva experiencia académica</h3></label></br>
                                                            </br><label>Nombre de la empresa</label>
                                                            <input class="form-control" name="nombreInst" id="nombreInst" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tiempo (número de meses)</label>
                                                            <input class="form-control" name="tiempoAcad" id="tiempoAcad" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Clases</label>
                                                            <select name="clases" class="form-control" id="clases">
                                                                <?php
                                                                $p=mysql_query("SELECT Clase FROM clases");
                                                                while($row=mysql_fetch_array($p)){
                                                                    echo '<option value="'.$row['Clase'].'">'.$row['Clase'].'</option>';
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
                    <button type="submit" class="btn btn-primary" id="expac">Guardar Información</button>
                </form>
            </div>
            <!-- .panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<script src="pages/recursos_humanos/cv/validacion.js"></script>
<script>
    $(function(){
        $('#tiempoAcad').validCampo('0123456789');
        $('#nombreInst').validCampo(' abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ');
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
        x = $("#expac");
        x.click(agregarexpacad);
    }


    function agregarexpacad()
    {
        data={
            ideAcad:$('#ideAcad').val(),
            nombreInst:$('#nombreInst').val(),
            tiempoAcad:$('#tiempoAcad').val(),
            clases:$('#clases').val()
        };

        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            beforeSend: inicioEnvio,
            success: llegadaExpAcad,
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

    function llegadaExpAcad()
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