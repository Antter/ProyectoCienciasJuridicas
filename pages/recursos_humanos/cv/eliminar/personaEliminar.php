<?php
session_start();
include "../../../../Datos/conexion.php";

        //Información Personal
	  	if(isset($_POST['id'])){
            //Borrar persona
                $identi = $_POST['id'];
                mysql_query("DELETE FROM telefono WHERE N_identidad = '$identi'");
                mysql_query("DELETE FROM empleado WHERE N_identidad = '$identi'");
                mysql_query("DELETE FROM estudios_academico WHERE N_identidad = '$identi'");
                mysql_query("DELETE FROM experiencia_laboral WHERE N_identidad = '$identi'");
                mysql_query("DELETE FROM experiencia_academica WHERE N_identidad = '$identi'");
                mysql_query("DELETE FROM telefono WHERE N_identidad = '$identi'");
                mysql_query("DELETE FROM persona WHERE N_identidad = '$identi'");
                echo "La persona se ha eliminado correctamente!";
        }

        //Formación Académica
        if(isset($_POST['idformAc'])){
                $identi = $_POST['idformAc'];
                mysql_query("DELETE FROM estudios_academico WHERE N_identidad = '$identi'");
                echo "La formación académica se ha eliminado correctamente!";
        }

        //Experiencia laboral
        if(isset($_POST['idLab'])){
                $identi = $_POST['idLab'];
                mysql_query("DELETE FROM experiencia_laboral WHERE N_identidad = '$identi'");
                echo "La experiencia laboral se ha eliminado correctamente!";
        }

        //Experiencia Académica
        if(isset($_POST['idAcad'])){
                $identi = $_POST['idAcad'];
                mysql_query("DELETE FROM experiencia_academica WHERE N_identidad = '$identi'");
                echo "La experiencia académica se ha eliminado correctamente!";
        }
        //Experiencia Académica
        if(isset($_POST['idTel'])){
            $identi = $_POST['idTel'];
            mysql_query("DELETE FROM telefono WHERE N_identidad = '$identi'");
            echo "Los teléfonos asociados se han eliminado correctamente!";
        }
?>

