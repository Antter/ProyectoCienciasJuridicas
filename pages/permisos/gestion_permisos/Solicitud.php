<?php

  $maindir = "../../";

  if(isset($_GET['contenido']))
  {
    $contenido = $_GET['contenido'];
  }
  else
  {
    $contenido = 'gestion_de_folios';
  }

  require_once($maindir."funciones/check_session.php");

  require_once($maindir."funciones/timeout.php");
  

?>

<?php $idusuario= $_SESSION['user_id']; ?> 
<?php $fecha= date("Y-m-d "); ?> 

<script type="text/javascript" src="../SistemaCienciasJuridicas/js/jquery-2.1.3.js"></script>
<script language="javascript" type="text/javascript">
var f = new Date(); 
	var $fecha_a =(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear()); 
$(document).ready(function(){
	
	
	$("form").submit(

	function(e){
		
	e.preventDefault();
	
    
	
				 data = { 
               	 idusuario:"<?php echo $idusuario; ?>" ,
				 nombre:$('input:text[name=nombre]').val(),
				area:$('select[name=area]').val(),
				  motivo:$('select[name=motivo]').val(),
				edificio:$('select[name=edificio]').val(),
				 horaf:$( "#horaf" ).val(),
				horai:$( "#horai" ).val(),
				 fecha: $( "#fecha" ).val(),
			    cantidad: $("#cantidad" ).val(),
			    fecha_solic:$fecha_a
			   
 
					};
            $.ajax({
                async:true,
                type: "POST",
             //   dataType: "html",
               // contentType: "application/x-www-form-urlencoded",
                url:"../SistemaCienciasJuridicas/pages/permisos/Isolicitud.php", 
                success:llegadaGuardar,
		data:data,
                timeout:4000,
                error:problemas
            }); 
	 return false;
        }); 
 	    }); 
	
   function llegadaGuardar(datos)
    {
	$("#bt").fadeOut("slow");
     
        alert(datos);		
	
    }

 

</script>

<!DOCTYPE html>
<html lang="en">


<head>


  <meta charset="utf-8">

<script type="text/javascript" src="../sl/jquery-2.1.3.js"></script>
<script language="javascript" type="text/javascript"></script>

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
											 
											<?php echo strtoupper($_SESSION['nombreUsuario'])?>
											
											</div>
											
											<div color: 'blue'>
                                            <label>Unidad Académica :</label>  
											
											<select class="form-control" Id="area" name="area">
                                                <?php
														$bd = 'test8'; 
												$conexion = mysqli_connect('localhost', 'root', '123', $bd);

												$rec = mysqli_query($conexion, "SELECT descripcion from tbl_unidad_academica");
												while($row=mysqli_fetch_array($rec))
												{
													echo "<option>";
													echo $row['descripcion'];
													echo "</option>";
												}/*
													require_once("conexion.php");
													$rec = mysqli_query($conexion, "SELECT descripcion from tbl_unidad_academica");
													while($row=mysqli_fetch_array($rec))
													{
														echo "<option>";
														echo $row['descripcion'];
														echo "</option>";
													}*/
												?>											
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Solicito permiso por motivo de :</label>
											<select class="form-control" Id="motivo" name="motivo">
											 <?php
												$bd = 'test8'; 
												$conexion = mysqli_connect('localhost', 'root', '123', $bd);

												$rec1 = mysqli_query($conexion, "SELECT descripcion from tbl_motivos");
												while($row=mysqli_fetch_array($rec1))
												{
													echo "<option>";
													echo $row['descripcion'];
													echo "</option>";
												}
											?>
												<?php /*
													require_once("conexion.php");
													$rec1 = mysqli_query($conexion, "SELECT descripcion from tbl_motivos");
													while($row=mysqli_fetch_array($rec1))
													{
														echo "<option>";
														echo $row['descripcion'];
														echo "</option>";
													}
													*/
												?>
												
											</select>                                       
										</div>
										<div class="form-group">
                                            <label>Edificio donde tiene registrada su asistencia :</label>
											<select class="form-control" Id="edificio" name="edificio">
												<?php
												
														
												$bd = 'test8'; 
												$conexion = mysqli_connect('localhost', 'root', '123', $bd);

												$rec2 = mysqli_query($conexion, "SELECT descripcion from tbl_edificios");
												while($row=mysqli_fetch_array($rec2))
												{
													echo "<option>";
													echo $row['descripcion'];
													echo "</option>";
												}
												mysqli_close($conexion);
											
												
												/*
													require_once("conexion.php");
													$rec2 = mysqli_query($conexion, "SELECT descripcion from tbl_edificios");
													while($row=mysqli_fetch_array($rec2))
													{
														echo "<option>";
														echo $row['descripcion'];
														echo "</option>";
													}
													mysqli_close($conexion);*/
												?>
											</select>                                       
										</div>
										<div>
											<label>Cantidad de dias:</label>											 
											
											<p> <input type="number" id="cantidad" name="cantidad" min="0" max="5" value="0" ></p>
										</div>
										<div>
											  <label>Fecha:</label>
										
										<p> <input type="date" id="fecha" name="datepicker"  ></p>									
										</div>
										<div>
											<label>Hora Inicio:</label>											
											<p>	<input type="time" name="horai" min=9:00 max=17:00 step=900 id="horai" value="1:00 pm"></p>
										</div>
										<div>
											<label>Hora Finalización:</label>
											<p><input type="time" name="horaf" min=9:00 max=17:00 step=900 id="horaf" value="2:00 pm"></p>									
										
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
