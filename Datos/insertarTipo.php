<?php

$root = \realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root\ProyectoIS\ModuloCurricular\Datos\Conexion.php";




//echo $_POST['nombre'];
if (isset($_POST['nombre'])) {
    $nombre1 = $_POST['nombre'];
    $query = "INSERT INTO tipo_estudio(Tipo_estudio) VALUES('$nombre1')";

    mysql_query($query);
}
include "$root\ProyectoIS\ModuloCurricular\Datos\cargarTipos.php";
?>