<?php

//include "../Datos/conexion.php";
//require_once('funciones.php');

//include "$root\curriculo\Datos\funciones.php";

$enlace = mysql_connect('localhost', 'root', '');
 mysql_select_db("sistema_ciencias_juridicas", $enlace);
        
        
          
	If(isset($_POST['cod_empleado'])){
	
          
            
		$no_empleado=$_POST['cod_empleado'];
		 $id_dep=$_POST['id_dep'];
		 $fecha=$_POST['fecha'];
		 $obs=$_POST['obs'];
		 $identi=$_POST['identi'];
                 $cargo=$_POST['cargo'];
               //  $fechaingreso=$_POST['fecha2'];
                 		 
 
	$query= mysql_query("INSERT INTO empleado(`No_Empleado`,`N_identidad`,`Id_departamento`,`Fecha_ingreso`,`Observacion`,`estado_empleado`,`foto_perfil`) VALUES ('$no_empleado','$identi','$id_dep','$fecha','$obs','1','null')");
	
	
	if($query){
            
            
            $query= mysql_query("INSERT INTO `empleado_has_cargo`(`No_Empleado`, `ID_cargo`, `Fecha_ingreso_cargo`) VALUES ('$no_empleado','$cargo','$fecha')");
            
            if($query){
                
                   $mensaje = 'Empleado agregado con Exito';
            $codMensaje = 1;
             
            
	
		//echo '<METAHTTP-EQUIV="REFRESH" CONTENT="2">' ;
		//echo mensajes('Ingresado exitosamente','verde');
            }
	
	
	}else{
             $mensaje = 'error al ingresar el registro o empleado actualmente existente';
             $codMensaje = 0;
            
        }
	
        }else{
            
             $mensaje = 'no se pudo agregar';
            $codMensaje = 0;
        }
        
        
    
        
  ?>