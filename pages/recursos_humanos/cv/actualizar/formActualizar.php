<?php
include "../../../../Datos/conexion.php";

if(isset($_POST['identi'])){
    $query = mysql_query("SELECT ID_Estudios_academico, Nombre_titulo, ID_Tipo_estudio, Id_universidad FROM estudios_academico WHERE N_identidad= '".$_POST['identi']."'");
}
?>
<body>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista de Formaciones Académicas</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>



<div class="box">
    <div class="box-header">
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <?php

        echo <<<HTML
                                    <table id="tabla_formaciones" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>                                            
                                            <th>ID</th>
                                            <th>Nombre del Título</th>
                                            <th>Tipo de estudio</th>
                                            <th>Universidad</th>
                                            <th>Editar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
HTML;

        while ($row = mysql_fetch_array($query)){
            $id = $row['ID_Estudios_academico'];
            $titulo = $row['Nombre_titulo'];
            $s = mysql_query("SELECT Tipo_estudio FROM tipo_estudio WHERE ID_Tipo_estudio = '".$row['ID_Tipo_estudio']."'");
            $row1 = mysql_fetch_array($s);
            $tipoEs = $row1['Tipo_estudio'];
            $t = mysql_query("SELECT nombre_universidad FROM universidad WHERE Id_universidad = '".$row['Id_universidad']."'");
            $row2 = mysql_fetch_array($t);
            $univ = $row2['nombre_universidad'];

            echo "<tr data-id='".$id."'>";
            echo <<<HTML
                <td>$id</td>
HTML;
            echo <<<HTML
                <td>$titulo</td>
HTML;
            echo <<<HTML
            <td>$tipoEs</td>
HTML;
            echo <<<HTML
            <td>$univ</td>
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

<div class="modal fade" id="actualFA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Formación Académica</h4>
            </div>
            <div class="modal-body" id="cuerpoAct"></div>
        </div>
    </div>
</div>

<!-- /.table-responsive -->
<script>
    $(document).ready(function(){
        $("form").submit(function(e) {
            e.preventDefault();
            $("#actualFA").modal('hide');
        });

        $(".actual").click(function() {
            id = $(this).parents("tr").find("td").eq(0).html();
            titulo = $(this).parents("tr").find("td").eq(1).html();
            tipo = $(this).parents("tr").find("td").eq(2).html();
            universidad = $(this).parents("tr").find("td").eq(3).html();
            data = {id:id, titulo:titulo, tipo:tipo, universidad:universidad};
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                success: llegadaActFA,
                timeout: 4000,
                error: problemas
            });
            return false;
        });
    });

    function llegadaActFA()
    {
        $("#cuerpoAct").load('pages/recursos_humanos/cv/actualizar/cuerpoActform.php', data);
        $('#actualFA').modal('show');
        $('#actualFA').on('hidden.bs.modal', function () {
            $("#container").load('pages/recursos_humanos/cv/actualizar/formAcademica.php');
        })
    }

    function problemas()
    {
        $("#contenedor").text('Problemas en el servidor.');
    }
</script>