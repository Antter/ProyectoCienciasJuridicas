<?php

include '../Datos/conexion.php';
$id = $_POST['idA'];

$consulta = $conectar->prepare("CALL pa_eliminar_area(?)");
$consulta->bind_param('i', $id);
$resultado = $consulta->execute();

if ($resultado == 1) {
    echo '<div id="resultado" class="alert alert-success">
        se ha Eliminado Un Elemento
         
         </div>';
} else {
    echo '<div id="resultado" class="alert alert-danger">
        No se Elimino ningun  elemento 
         
         </div>';
}
include '../Datos/mostrarAreas.php';
?>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $("#resultado").fadeOut(1500);
    },3000);
});
</script>
