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


<!--Las siguientes dos líneas hacen referencia a un par de archivos javascript que permite la utilizacion de algunas librerías -->
<!--<script type="text/javascript" src="../SistemaCienciasJuridicas/js/jquery-2.1.3.js"></script>-->
<script language="javascript" type="text/javascript">


    var f = new Date();
    var $fecha_a = (f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear()); //Este codigo obtiene los elementos de la fecha actual del sistema

//Esta función se realiza cuando el documento ya esta listo
    $(document).ready(function() {

        $("form").submit(//Se realiza cuando se ejecuta un "submit" en el formulario, el "submit" se encuentra en el boton "Envíar Solicitud"

		
		
		
		
                function(e) {

                    e.preventDefault();

                    data = {
                        idusuario: "<?php echo $idusuario; ?>",
                        nombre: $('input:text[name=nombre]').val(),
                        area: "<?php echo $row['nombre_departamento']?>",
                        motivo: $('select[name=motivo]').val(),
                        edificio: $('select[name=edificio]').val(),
                        horaf: $("#horaf").val(),
                        horai: $("#horai").val(),
                        fecha: $("#fecha").val(),
                        cantidad: $("#cantidad").val(),
                        fecha_solic: $fecha_a
                    };  //la seccion de codigo anterior almacena en un conjunto data las variables que 
                    //la funcion enviara para que se ejecute la consulta en el archivo php
					
                    $.ajax({
                        async: true,
                        type: "POST",
                        // dataType: "html",
                        // contentType: "application/x-www-form-urlencoded",
                        url: "../SistemaCienciasJuridicas/pages/permisos/Isolicitud.php",
                        success: llegadaGuardar,
                        data: data,
                        timeout: 4000,
                        error: problemas
                    }); //La función implemente ajax para enviar la información a otros 
                    //documentos que realizaran otros procedimientos sin necesidad de refrescar toda la pagina
                    return false;
                });
    });

    function llegadaGuardar(datos,reportePDF)
    {
        $("#bt").fadeOut("slow");
        alert(datos);
        $("#div_contenido").load('pages/permisos/permisos_principal.php', data);
    }

	function reportePDF(){
		data = {
                        idusuario: "<?php echo $idusuario; ?>",
                        nombre: $('input:text[name=nombre]').val(),
                        area: "<?php echo $row['nombre_departamento']?>",
                        motivo: $('select[name=motivo]').val(),
                        edificio: $('select[name=edificio]').val(),
                        horaf: $("#horaf").val(),
                        horai: $("#horai").val(),
                        fecha: $("#fecha").val(),
                        cantidad: $("#cantidad").val(),
                        fecha_solic: $fecha_a
                    };  //la seccion de codigo anterior almacena en un conjunto data las variables que 
                    //la funcion enviara para que se ejecute la consulta en el archivo php
					
                    $.ajax({
                        async: true,
                        type: "POST",
                        // dataType: "html",
                        // contentType: "application/x-www-form-urlencoded",
                        url: "../SistemaCienciasJuridicas/pages/permisos/pdf_solicitud.php",
                        data: data,
                        timeout: 4000,
                        error: problemas
                    }); 
					
		window.open('pages/gestion_folios/pdf_solicitud.php?id1=prueba123);
	}

</script>

<!DOCTYPE html>
<html lang="en">


    <head>


        <meta charset="utf-8">

<!--<script type="text/javascript" src="../sl/jquery-2.1.3.js"></script>
<script language="javascript" type="text/javascript"></script>-->

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
    </head>

    <body>

        <div id="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Solicitud</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Llene los campos con la información solicitada
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form id="formulario">
                                       
										<div class="form-group">
                                            <label>Nombre : </label>

												<?php echo strtoupper($_SESSION['nombreUsuario']) ?>

                                        </div>

                                        <div color: 'black' class="form-group" >
										<?php
										
											echo "Departamento:";
											echo '<label Id="area" name="area">  ';
												echo $row['nombre_departamento'];
											echo '</label>'

										?>											
                                        </div>
                                        <div class="form-group">
                                            <label>Solicito permiso por motivo de :</label>
                                            <select class="form-control" Id="motivo" name="motivo">


											<?php
											/* Este codigo jala los datos que hay en la tabla de motivos y los muestra en el 
											  combobox */
											  
												$rec1 = mysqli_query($conexion, "SELECT descripcion from motivos");
												while ($row = mysqli_fetch_array($rec1)) {
													echo "<option>";
													echo $row['descripcion'];
													echo "</option>";
												}
											?>
											</select>                                       
                                        </div>
										
                                        <div class="form-group">
                                            <label>Edificio donde tiene registrada su asistencia :</label>
                                            <select class="form-control" Id="edificio" name="edificio">
                                                <?php
													$rec2 = mysqli_query($conexion, "SELECT descripcion from edificios");
													while ($row = mysqli_fetch_array($rec2)) {
														echo "<option>";
														echo $row['descripcion'];
														echo "</option>";
													}
													mysqli_close($conexion);
                                                ?>
                                            </select>                                       
                                        </div>
                                        <div>
                                            <label>Cantidad de dias:</label>											 

                                            <p> <input type="number" id="cantidad" name="cantidad" min="0" max="5" value="0" required ></p>
                                        </div>
                                        <div>
                                            <label>Fecha:</label>

                                            <p> <input type="date" id="fecha" name="datepicker" required ></p>									
                                        </div>
                                        <div>
                                            <label>Hora Inicio:</label>											
                                            <p>	<input type="time" name="horai" min=9:00 max=17:00 step=900 id="horai" value="1:00 pm" required></p>
                                        </div>
                                        <div>
                                            <label>Hora Finalización:</label>
                                            <p><input type="time" name="horaf" min=9:00 max=17:00 step=900 id="horaf" value="2:00 pm" required></p>									

                                            <div>
                                                <input id="bt" class="btn btn-primary" type="submit"  value="Enviar Solicitud" /></td>
                                                <div id="respuesta"></div>
                                            </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
