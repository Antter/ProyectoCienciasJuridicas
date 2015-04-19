<?php

$root = \realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root\sistemaCienciasJuridicas\Datos\Conexion.php";




//echo $_POST['nombre'];
if (isset($_POST['titulo'])) {
    $nombre1 = $_POST['titulo'];
    $query = "INSERT INTO titulo(titulo) VALUES('$nombre1')";

    mysql_query($query);
}
include "$root\sistemaCienciasJuridicas\Datos\cargarTitulos.php";
?>