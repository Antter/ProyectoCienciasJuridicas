<?php
//Este codigo hace una validación de la sesión del usuario y del tiempo que esta lleva inactiva, para proceder a cerrarla
$maindir = "../../";

if (isset($_GET['contenido'])) {
    $contenido = $_GET['contenido'];
} else {
    $contenido = 'gestion_de_folios';
}

require_once($maindir . "funciones/check_session.php");

require_once($maindir . "funciones/timeout.php");
?>
<?php
	//Esta seccion obtiene el nombre de usuario que ha iniciado sesión y lo guarda en una variable
	$idusuario = $_SESSION['user_id'];

	include("../../conexion/conn.php");  
	$conexion = mysqli_connect($host, $username, $password, $dbname);
	$rec = mysqli_query($conexion, "select departamento_laboral.nombre_departamento from departamento_laboral where Id_departamento_laboral in( SELECT Id_departamento FROM empleado where No_Empleado in (Select No_Empleado from usuario where id_Usuario='$idusuario'))");
	$row = mysqli_fetch_array($rec);
?> 


<?php

include '../../Datos/conexion.php';



$codigoE = $_POST['codigo'];

 $resultado=mysql_query("SELECT * FROM empleado inner join persona on empleado.N_identidad=persona.N_identidad inner join departamento_laboral on departamento_laboral.Id_departamento_laboral=empleado.Id_departamento Where estado_empleado='1' and No_Empleado='".$codigoE."'");
 //$resultado2=mysql_query("SELECT * FROM empleado_has_cargo inner join cargo on cargo.ID_cargo=empleado_has_cargo.ID_cargo where No_Empleado='".$codigoE."'");
 if($row=mysql_fetch_array($resultado)){
     
     
      $nombreE=$row['Primer_nombre'];
      $apellidoE=$row['Primer_apellido'];
      $depE=$row['nombre_departamento'];
      $depID=$row['Id_departamento_laboral'];
      $obsE=$row['Observacion'];
      $noE=$row['N_identidad'];
      $fechaE=$row['Fecha_ingreso'];
    
          
         
 }
 

 

?>

<!DOCTYPE html>
<html lang="utf-8">

<head>

    <meta charset="utf-8">
    
    
    
<script language="javascript" type="text/javascript">

//Esta función se realiza cuando el documento ya esta listo
    $(document).ready(function() {

        $("form").submit(//Se realiza cuando se ejecuta un "submit" en el formulario, el "submit" se encuentra en el boton "Envíar Solicitud"

		
                function(e) {

                    e.preventDefault();

                    data = {
                    codigoE:$('#codEm').val(),
					rol: $('select[name=rol]').val(),
					nombre: $("#nombreu").val(),
					id: $("#iduser").val(),
					pass: $("#pass").val(),
                    }; 

					//la seccion de codigo anterior almacena en un conjunto data las variables que 
                    //la funcion enviara para que se ejecute la consulta en el archivo php
					
                    $.ajax({
                        async: true,
                        type: "POST",
                        // dataType: "html",
                        // contentType: "application/x-www-form-urlencoded",
                        url: "../SistemaCienciasJuridicas/pages/permisos/guardar_usuario.php",
                        success: llegadaGuardar,
                        data: data,
                        timeout: 4000,
                        error: problemas
                    }); //La función implemente ajax para enviar la información a otros 
                    //documentos que realizaran otros procedimientos sin necesidad de refrescar toda la pagina
                    return false;
                });
    });

    function llegadaGuardar(datos)
    {
        $("#bt").fadeOut("slow");
        alert(datos);
        $("#div_contenido").load('pages/permisos/permisos_principal.php', data);
    }


</script>    


</head>

<body>
        
    <h1>Nuevo Usuario</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Datos Personales
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">       



                            <form role="form" action="#" method="Post">

                                <div class="form-group">
                                    <label>Codigo Empleado</label>
                                    <input class="form-control" name="cod_empleado" id="codEm" value= "<?Php echo $codigoE ?>"   required> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->

                                </div>

                                <div class="form-group">
                                    <label>Primer Nombre</label>
                                    <input class="form-control" name="Primer_nombre" id="pnE" value= "<?Php echo $nombreE ?>" readonly> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->

                                </div>




                                <!-- ---------------------------------------   -->

                            </form>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label>Numero de identidad</label>
                                <input class="form-control" name="Primer_nombre" id="idEm" value= "<?Php echo $noE ?>" readonly> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->

                            </div>


                            <div class="form-group">
                                <label>Primer Apellido</label>
                                <input class="form-control" name="Primer_apellido" id="paE" value= "<?Php echo $apellidoE ?>" readonly> <!-- agregue el atrributo name que mediante este vas a poder acceder al valor de la etiqueta -->

                            </div>

                        </div>



                    </div>
                    <!-- /.row (nested) -->

                </div>



                <!-- /.panel-body -->

            </div>

            <!-- /.panel -->

        </div>

        <!-- /.col-lg-12 -->
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Llene los campos a continuacion solicitados
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6"> 

                            <form role="form" action="#" method="Post">



                                <!-- ---------------------------------------   -->

                                <label><h5><strong>Id Usuario :</strong></h5></label>
                                <div class="form-group">

                                    <input type="text" name='iduser' id="iduser">

                                </div>
								<label><h5><strong>Nombre Usuario :</strong></h5></label>
                                <div class="form-group">

                                    <input type="text" name="nombreu" id="nombreu">

                                </div>
								<div class="form-group">
								 <label><h5><strong>Contraseña :</strong></h5>

                                    <input type="text" name='pass' id="pass">

								</div>
								
								<div class="form-group">
                                            <label>Edificio donde tiene registrada su asistencia :</label>
                                            <select class="form-control" Id="rol" name="rol">
                                                <?php
													$rec2 = mysqli_query($conexion, "SELECT id_Rol,descripcion from roles");
													while ($row = mysqli_fetch_array($rec2)) {
														echo "<option data-id='".$row['id_Rol']."'> ";
														echo $row['descripcion'];
														echo "</option>";
													}
													mysqli_close($conexion);
                                                ?>
                                            </select>                                       
                                        </div>







								<div class="form-group">
                                 <input id="bt" class="btn btn-primary" type="submit"  value="Guardar Cambios" /></td>
                                <button type="reset" class="btn btn-default">Cancelar</button>
								</div >
									

                            </form>




                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>




    
        
    </body>
    
 
            



