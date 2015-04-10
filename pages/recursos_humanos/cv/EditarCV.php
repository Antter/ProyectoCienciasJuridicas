<?php
session_start();

include "../../../Datos/conexion.php";

if(isset($_POST['identi'])){
    $queryTEL = mysql_query("SELECT ID_Telefono, Tipo, Numero FROM telefono WHERE N_identidad= '".$_POST['identi']."'");
}

if (isset($_POST['identi'])) {
    $identi = $_POST['identi'];
    $_SESSION['Nidenti'] = $identi;

    $s = mysql_query("SELECT * FROM persona WHERE N_identidad = '" . $identi . "'");
    if ($row = mysql_fetch_array($s)) {
        $id = $row['N_identidad'];
        $pNombre = $row['Primer_nombre'];
        $sNombre = $row['Segundo_nombre'];
        $pApellido = $row['Primer_apellido'];
        $sApellido = $row['Segundo_apellido'];
        $fNac = $row['Fecha_nacimiento'];
        $sexo = $row['Sexo'];
        $direc = $row['Direccion'];
        $email = $row['Correo_electronico'];
        $estCivil = $row['Estado_Civil'];
        $nacionalidad = $row['Nacionalidad'];

        //Experiencia Académica
        $query = mysql_query("SELECT ID_Experiencia_academica, Institucion, Tiempo FROM experiencia_academica WHERE N_identidad= '" . $_POST['identi'] . "'");
        //Formación académica
        $queryFA = mysql_query("SELECT ID_Estudios_academico, Nombre_titulo, ID_Tipo_estudio, Id_universidad FROM estudios_academico WHERE N_identidad= '".$_POST['identi']."'");
        //Experiencia laboral
        $queryEL = mysql_query("SELECT ID_Experiencia_laboral, Nombre_empresa, Tiempo FROM experiencia_laboral WHERE N_identidad= '".$_POST['identi']."'");

        echo '<form role="form" method="post" class="form-horizontal">
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <h1>Curriculum Vitae</h1>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <label><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Datos Generales</label>
                                            </h4>
                                        </div>
                                            <div class="panel-body">
                                                <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Número de Identidad: </label>
                                                            <div class="col-sm-7 control-label">' . $id . '</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Nombre Completo: </label>
                                                            <div class="col-sm-7 control-label">' . $pNombre . ' ';
        if ($sNombre != '') {
            echo $sNombre . ' ';
        }
        echo $pApellido . ' ' . $sApellido . '.</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Sexo: </label>';
        if ($sexo == 'F') {
            echo '<div class="col-sm-7 control-label">Femenino</div>';
        }
        if ($sexo == 'M') {
            echo '<div class="col-sm-7 control-label">Masculino</div>';
        }
        echo '</div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Nacionalidad: </label>
                                                            <div class="col-sm-7 control-label">' . $nacionalidad . '</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><strong>Fecha de Nacimiento</strong></label>
                                                            <div class="col-sm-7 control-label">' . $fNac . '</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Estado civil: </label>
                                                            <div class="col-sm-7 control-label">';
        if ($estCivil == "Soltero")
            echo 'Soltero';
        if ($estCivil == "Casado")
            echo 'Casado';
        if ($estCivil == "Divorciado")
            echo 'Divorciado';
        if ($estCivil == "Viudo")
            echo 'Viudo';
        echo '
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <label><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Información de contacto</label>
                                            </h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label">Dirección</label>
                                                    <div class="col-sm-7 control-label">' . $direc . '</div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label">Correo electrónico</label>
                                                    <div class="col-sm-7 control-label">' . $email . '</div>
                                               </div>
                                            </div>
                                        </div>
                                    </div> ';
        
        
    }
}
 ?>  

<head>
    <script>
    $(document).ready(function(){
        $("form").submit(function(e) {
            e.preventDefault();
            $("#actualTel").modal('hide');
        });

        $(".actual").click(function() {
            id = $(this).parents("tr").find("td").eq(0).html();
            tipo = $(this).parents("tr").find("td").eq(1).html();
            numero = $(this).parents("tr").find("td").eq(2).html();
            data = {id:id, tipo:tipo, numero:numero};
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                success: llegadaActTelefono,
                timeout: 4000,
                error: problemas
            });
            return false;
        });
    });

    function llegadaActTelefono()
    {
        $("#cuerpoAct").load('pages/recursos_humanos/cv/actualizar/cuerpoAct.php', data);
        $('#actualTel').modal('show');
        $('#actualTel').on('hidden.bs.modal', function () {
            $("#container").load('pages/recursos_humanos/cv/actualizar/telefono.php');
        })
    }

    function problemas()
    {
        $("#contenedor").text('Problemas en el servidor.');
    }
</script>
    
    
    
</head>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista de Teléfonos</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<div class="box">
    <div class="box-header">
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <?php

        echo <<<HTML
                                    <table id="tabla_telefonos" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>                                            
                                            <th>ID</th>
                                            <th>Tipo</th>
                                            <th>Número</th>
                                            <th>Editar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
HTML;

        while ($row = mysql_fetch_array($queryTEL)){
            $id = $row['ID_Telefono'];
            $tipo = $row['Tipo'];
            $numero = $row['Numero'];

            echo "<tr data-id='".$id."'>";
            echo <<<HTML
                <td>$id</td>
HTML;
            echo <<<HTML
                <td>$tipo</td>
HTML;
            echo <<<HTML
            <td>$numero</td>
HTML;
            echo <<<HTML
                <td>
                <center>
                    <button type="submit" class="actual btn btn-primary glyphicon glyphicon-edit" title="Editar">
                      </button>
                </center>
                </td>
HTML;
            echo "</tr>";

        }
        ?>
    </div><!-- /.box-body -->
</div><!-- /.box -->

<div class="modal fade" id="actualTel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Teléfono</h4>
            </div>
            <div class="modal-body" id="cuerpoAct"></div>
        </div>
    </div>
</div>

