<?php
       
	require_once('funciones.php');
        require_once('conexion.php');
	
	

	If(isset($_POST['nidentidadE'])){
		
		$n_identidad=$_POST['nidentidadE'];
                 $codigo=$_POST['codigoE'];
		 $id_departamento=$_POST['departE'];
                 $id_cargo=$_POST['cargoE'];
                 $fechaIngreso=$_POST['fechaE'];
                 $obs=$_POST['obsE'];
		
                 
              
		 
	$query= mysql_query("UPDATE empleado SET 
	No_Empleado='$codigo',
        Id_departamento='$id_departamento',
	Fecha_ingreso='$fechaIngreso',
        Observacion='$obs'
        WHERE N_identidad='".$n_identidad."'");
        
        $query2=mysql_query("UPDATE `empleado_has_cargo` SET `ID_cargo`='$id_cargo' WHERE No_empleado ='".$codigo."'");
	
	
	
	if($query && $query2 ){
	
		//echo '<META HTTP-EQUIV="REFRESH" CONTENT="2">' ;
		echo mensajes('Actualizado con Exito','verde');
	
	
	
	}else{
            
            echo mensajes('No se pudo actualizar ','rojo');
            
        }
	
        
	
        

	
	}
        
     //include '../pages/recursos_humanos/Empleados.php';
?>
