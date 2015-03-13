<?php

$root = \realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root\sistemaCienciasJuridicas\Datos\Conexion.php";




//echo $_POST['nombre'];
if (isset($_POST['nombre'])) {
    $nombre1 = $_POST['nombre'];
    $query = "INSERT INTO cargo(Cargo) VALUES('$nombre1')";

    mysql_query($query);
}
include "$root\sistemaCienciasJuridicas\Datos\cargarCargos.php";
?>