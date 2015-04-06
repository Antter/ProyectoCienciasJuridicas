<?php
session_start();
include "../../../../Datos/conexion.php";
function limpiar($tags)
{
    $tags = strip_tags($tags);
    return $tags;
}

//Información Personal
if (isset($_POST['modEmp']) && isset($_POST['modTiem']) && isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $emp = limpiar($_POST['modEmp']);
    $tiem = $_POST['modTiem'];

//Agregar ON UPDATE CASCADE, ON DELETE CASCADE A LA TABLA telefono.
    mysql_query("UPDATE experiencia_laboral SET Nombre_empresa = '$emp', Tiempo = '$tiem' WHERE ID_Experiencia_laboral = '$id'");

    echo "Experiencia laboral se ha actualizado con éxito!";
}