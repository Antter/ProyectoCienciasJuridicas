<?php
session_start();
include "../../../../Datos/conexion.php";
function limpiar($tags)
{
    $tags = strip_tags($tags);
    return $tags;
}

//Información Personal
if (isset($_POST['modInst']) && isset($_POST['modTiem']) && isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $inst = limpiar($_POST['modInst']);
    $tiem = $_POST['modTiem'];

//Agregar ON UPDATE CASCADE, ON DELETE CASCADE A LA TABLA telefono.
    mysql_query("UPDATE experiencia_academica SET Institucion = '$inst', Tiempo = '$tiem' WHERE ID_Experiencia_academica = '$id'");

    echo "Experiencia académica se ha actualizado con éxito!";
}