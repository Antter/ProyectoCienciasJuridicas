<?php
//include "../../../../Datos/conexion.php";
session_start();
if (isset($_POST['id'])) {
    $institucion = $_POST['institucion'];
    $tiempo = $_POST['tiempo'];
    echo '<div class="form-group">
                                                            <label>Institución</label>
                                                            <input id="modInst" class="form-control" value="'.$institucion.'" required>
                                                        </div>';
    echo '<div class="form-group">
                                                            <label>Tiempo (meses)</label>
                                                            <input id="modTiem" class="form-control" value="'.$tiempo.'" required>
                                                        </div>';
    echo '<button class="btn btn-primary" id="btActualizar">Guardar Información</button>';
    $_SESSION['id'] = $_POST['id'];
}
?>

<script>

    var x;
    x = $(document);
    x.ready(inicio);

    function inicio()
    {
        var x;
        x = $("#btActualizar");
        x.click(actexAc);
    }


    function actexAc()
    {
        data={
            modInst:$('#modInst').val(),
            modTiem:$('#modTiem').val()
        };

        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            beforeSend: inicioEnvio,
            success: llegadaSelecPersona,
            timeout: 4000,
            error: problemas
        });
        return false;
    }

    function inicioEnvio()
    {
        var x = $("#cuerpoAct");
        x.html('Cargando...');
    }

    function llegadaSelecPersona()
    {
        $("#cuerpoAct").load('pages/recursos_humanos/cv/actualizar/eAcAct.php',data);
    }

    function problemas()
    {
        $("#cuerpoAct").text('Problemas en el servidor.');
    }

</script>
<script src="pages/recursos_humanos/cv/validacion.js"></script>
<script>
    $(function(){
        $('#modInst').validCampo('-+/*abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ ');
        $('#modTiem').validCampo('0123456789');
    });
</script>
