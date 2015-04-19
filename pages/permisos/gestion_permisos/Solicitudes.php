<?php

?>

<!DOCTYPE html>
<html lang="en">
<body>
<div id="wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Solicitud</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
            <!-- /.row -->
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
										<label>Nombre</label>
										<input class="form" Id="nombre" type="text" name="nombre" >
										</div>
									<div class="form-group">
										<label>Unidad Académica</label>
										
										<select class="form-control" Id="area" name="area">
											<?php
												require_once("conexion.php");
												$rec = mysqli_query($conexion, "SELECT descripcion from tbl_unidad_academica");
												while($row=mysqli_fetch_array($rec))
												{
													echo "<option>";
													echo $row['descripcion'];
													echo "</option>";
												}

											?>
										
										</select>
									</div>
									<div class="form-group">
										<label>Solicito permiso por motivo de</label>
										<select class="form-control" Id="motivo" name="motivo">
											<?php
												require_once("conexion.php");
												$rec1 = mysqli_query($conexion, "SELECT descripcion from tbl_motivos");
												while($row=mysqli_fetch_array($rec1))
												{
													echo "<option>";
													echo $row['descripcion'];
													echo "</option>";
												}
											?>
										</select>                                       
									</div>
									
									<div class="form-group">
										<label>Edificio donde tiene registrada su asistencia</label>
										<select class="form-control" Id="edificio" name="edificio">
											<?php
												require_once("conexion.php");
												$rec2 = mysqli_query($conexion, "SELECT descripcion from tbl_edificios");
												while($row=mysqli_fetch_array($rec2))
												{
													echo "<option>";
													echo $row['descripcion'];
													echo "</option>";
												}
												mysqli_close($conexion);
											?>
										</select>                                       
									</div>
									
									<div >
										  <label>Cantidad de dias:</label>

										 
									<!--Date: <input type="text" id="datepicker" name="datepicker" ></p-->
									<p> <input type="number" id="cantidad" name="cantidad" min="0" max="5" ></p>
					
								
											</div>
									
									<div >
									<div >
										  <label>Fecha</label>

										 
									<!--Date: <input type="text" id="datepicker" name="datepicker" ></p-->
									< <input type="date" id="fecha" name="datepicker" ></p>
								
											</div>
									
									<div >
											<label>Hora Inicio</label>
										
											<input type="time" name="horai" min=9:00 max=17:00 step=900 id="horai" val="1:00 pm">
										  </div>
									<div >
											<label>Hora Finalización</label>
											<input type="time" name="horaf" min=9:00 max=17:00 step=900 id="horaf" val="2:00 pm">
								
									</div >

								   <input id="bt" class="btn btn-primary" type="submit"  value="Enviar Solicitud" /></td>
								 
								</form>
									 <span></span>  
									

                                </div>
								 <div id="destino"> </div>

                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
</body>

</html>