<?php
include "../../../../Datos/conexion.php";

if(isset($_POST['identi'])){
    $query = mysql_query("SELECT ID_Experiencia_academica, Institucion, Tiempo FROM experiencia_academica WHERE N_identidad= '".$_POST['identi']."'");
}
?>
<body>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista de Experiencias Académicas</h1>
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
                                            <th>Institución</th>
                                            <th>Tiempo (meses)</th>
                                            <th>Editar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
HTML;

        while ($row = mysql_fetch_array($query)){
            $id = $row['ID_Experiencia_academica'];
            $inst = $row['Institucion'];
            $tiempo = $row['Tiempo'];

            echo "<tr data-id='".$id."'>";
            echo <<<HTML
                <td>$id</td>
HTML;
            echo <<<HTML
                <td>$inst</td>
HTML;
            echo <<<HTML
            <td>$tiempo</td>
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

<div class="modal fade" id="actualexAc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Experiencia Académica</h4>
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
            $("#actualexAc").modal('hide');
        });

        $(".actual").click(function() {
            id = $(this).parents("tr").find("td").eq(0).html();
            institucion = $(this).parents("tr").find("td").eq(1).html();
            tiempo = $(this).parents("tr").find("td").eq(2).html();
            data = {id:id, institucion:institucion, tiempo:tiempo};
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                success: llegadaActExAc,
                timeout: 4000,
                error: problemas
            });
            return false;
        });
    });

    function llegadaActExAc()
    {
        $("#cuerpoAct").load('pages/recursos_humanos/cv/actualizar/cuerpoActexAc.php', data);
        $('#actualexAc').modal('show');
        $('#actualexAc').on('hidden.bs.modal', function () {
            $("#container").load('pages/recursos_humanos/cv/actualizar/expAcademica.php');
        })
    }

    function problemas()
    {
        $("#contenedor").text('Problemas en el servidor.');
    }
</script>