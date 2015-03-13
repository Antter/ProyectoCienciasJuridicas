<?php

$root = \realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root\sistemaCienciasJuridicas\Datos\Conexion.php";




//echo $_POST['nombre'];
if (isset($_POST['nombreComite'])) {
    $nombre1 = $_POST['nombreComite'];
    $query = "INSERT INTO grupo_o_comite(Nombre_Grupo_o_comite) VALUES('$nombre1')";

    mysql_query($query);
}
include "$root\sistemaCienciasJuridicas\Datos\cargarComite.php";
?>