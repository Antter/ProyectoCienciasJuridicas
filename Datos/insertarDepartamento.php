<?php

include '../Datos/conexion.php';
    if (isset($_POST['departamento'])) 
    {
        $depto = $_POST['departamento']; 
        $query = "INSERT INTO departamento_laboral(nombre_departamento) VALUES('$depto')";
        mysql_query($query); 

    }
    include '../Datos/cargarDepartamentos.php';   
?>
