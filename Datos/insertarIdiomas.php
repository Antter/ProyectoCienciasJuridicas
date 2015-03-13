<?php

$root = \realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root\sistemaCienciasJuridicas\Datos\Conexion.php";

if (isset($_POST['nombreIdioma'])) {
    $Language = $_POST['nombreIdioma'];

    $query = "INSERT INTO idioma(Idioma) VALUES('$Language')";

    mysql_query($query);
}

include "$root\sistemaCienciasJuridicas\Datos\cargarIdiomas.php";
?>