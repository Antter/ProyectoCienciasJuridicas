<?php

$root = \realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root\sistemaCienciasJuridicas\Datos\Conexion.php";

if (isset($_POST['rol'])&&isset($_POST['descripcion'])) {
    $nombre1 = $_POST['rol'];
    $descripcion1 = $_POST['descripcion'];
    $query = "INSERT INTO roles(nombre_Rol,Descripcion) VALUES('$nombre1','$descripcion1')";

    mysql_query($query);
}
include "$root\sistemaCienciasJuridicas\Datos\cargarRoles.php";
?>