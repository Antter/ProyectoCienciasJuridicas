<?php

  $maindir = "../../";

  require_once($maindir."funciones/check_session.php");

  require_once($maindir."funciones/timeout.php");
  
  if(isset($_GET['contenido']))
  {
    $contenido = $_GET['contenido'];
  }
else
  {
    $contenido = 'gestion_de_folios';
	$navbar_loc = 'contenido';
  }
  
require_once($maindir.'pages/navbar.php');

require_once("datos/datos_nuevo_folio.php");

?>

<link href="css/datepicker.css" rel="stylesheet">
<link href="css/prettify.css" rel="stylesheet">
   
<script src="js/prettify.js"></script>
<script src="js/bootstrap-datepicker.js"></script>

<script>
    if (top.location != location) {
    top.location.href = document.location.href ;
  }
        $(function(){
            window.prettyPrint && prettyPrint();
            $('#dp1').datepicker({
                format: 'yyyy-mm-dd',
				language: "es",
                autoclose: true,
                todayBtn: true
            }).on('show', function() {
                var zIndexModal = $('#myModal').css('z-index');
                var zIndexFecha = $('.datepicker').css('z-index');
                $('.datepicker').css('z-index',zIndexModal+1);
            }).on('changeDate', function(ev){
                $('#dp1').datepicker('hide');
            });          

        });
</script>
<!-- Main -->
<div class="container-fluid">
<div class="row">
<?php
    require_once("navbar.php");
?>
    <div class="col-sm-10">
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h1> Datos del folio </h1>
                                </div><!-- /.box-header -->
								<hr>
                                <!-- form start -->
                                <form role="form" id="form" name="form" action="#">
                                    <div class="box-body">
									    <div class="row">
					                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Numero del folio</span>
                                                        <input type="text" name="NroFolio" class="form-control" id="NroFolio" placeholder="Folio" maxlength="25" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Fecha del folio:</span>
                                                        <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-m-d" data-link-field="dtp_input2" data-link-format="yyyy-m-d">
                                                            <input class="form-control" size="5" style="width: 345px" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="dp1" onkeypress="DenegarIngreso();" required>
                                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                        </div>   
                                                    </div>            
                                                </div>	
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Persona referente</span>
                                                        <input type="text" maxlength="50" name="personaReferente" class="form-control" id="personaReferente" placeholder="Persona Referente" title="Completa este campo" required>
                                                    </div>
                                                </div>
										        <h3 >Selecciones una organizacion o una unidad academica</h3>
										        <div class="col-sm-12">
											        <div class="col-sm-6">
										                <div class="form-group">
                                                            <div class="input-group">
                                                                <select id="Organizacion" class="form-control"name="Organizacion" >
                                                                    <option value=-1> -- Organizacion -- </option>
                                                                    <?php while($filas = mysqli_fetch_assoc($result2)) { ?>
                                                                    <option value="<?php echo $filas["Id_Organizacion"];?>"><?php echo $filas["NombreOrganizacion"];?></option><?php } mysqli_free_result($result2); ?>
														        </select>
                                                            </div>
                                                        </div>
											        </div>
									                <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <select id="unidadAcademica" class="form-control" name="unidadAcademica">
                                                                    <option value=-1> -- Unidad Academica -- </option>>
                                                                    <?php while($filas = mysqli_fetch_assoc($result1)) { ?>
                                                                    <option value="<?php echo $filas["Id_UnidadAcademica"];?>"><?php echo $filas["NombreUnidadAcademica"];?></option><?php } mysqli_free_result($result); ?>
														        </select>
                                                            </div>
                                                        </div>
											        </div>
										        </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Descripcion</span>
                                                        <textarea id="Descripcion" class="form-control" name="Descripcion" rows="3" maxlength="300" placeholder="Ingrese una descripcion..." title="Completa este campo" required></textarea>
                                                    </div>
                                                </div>
									        </div>
									        <div class="col-md-6">
									            <div class="form-group">
										            <label>Tipo de folio</label>
                                                    <div class="input-group">	    
                                                        <select id="TipoFolio" class="form-control" width="420" style="width: 420px" name="TipoFolio" required>
                                                            <option value=-1> Seleccione el tipo de folio </option>
                                                            <option value=0> folio de entrada</option>
                                                            <option value=1> folio de salida </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
											            <label>Ubicacion fisica del folio</label>
                                                        <select id="ubicacionFisica"class="form-control" width="420" style="width: 420px" name="ubicacionFisica" required>
                                                            <option value=-1> Seleccione la ubicacion fisica </option>
                                                            <?php while($filas = mysqli_fetch_assoc($result3)) { ?>
                                                            <option value="<?php echo $filas["Id_UbicacionArchivoFisico"];?>"><?php echo $filas["DescripcionUbicacionFisica"];?></option><?php } mysqli_free_result($result3); ?>
												        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
											            <label>Prioridad del folio</label>
                                                        <select id="Prioridad" class="form-control" width="420" style="width: 420px" name="Prioridad" required>
                                                            <option value=-1> Seleccione la prioridad del folio </option>
                                                            <?php while($filas = mysqli_fetch_assoc($result4)) { ?>
                                                            <option value="<?php echo $filas["Id_Prioridad"];?>"><?php echo $filas["DescripcionPrioridad"];?></option><?php } mysqli_free_result($result4); mysqli_close($conexion); ?>
											            </select>
                                                    </div>
                                                </div>
										        <div class="form-group">
										            <div class="input-group">
											            <label>Seguimiento inicial</label>
                                                        <select id="Seguimiento" name="Seguimiento" class="form-control" width="420" style="width: 420px" required>
                                                            <option value=-1> Seleccione el estado del seguimiento </option>
                                                            <?php while($filas = mysqli_fetch_assoc($result5)) { ?>
                                                            <option value="<?php echo $filas["Id_Estado_Seguimiento"];?>"><?php echo $filas["DescripcionEstadoSeguimiento"];?></option><?php } mysqli_free_result($result5); mysqli_close($conexion); ?>
											            </select>
                                                    </div>
										        </div>
												<div class="form-group">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input id="chkFinalizado" type="checkbox"/>
                                                             Comenzar seguimiento finalizado en este folio?
                                                        </label>
                                                    </div>
                                                </div>
										        <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"> Notas del seguimiento </span>
                                                        <textarea id="NotasSeguimiento" maxlength="300" class="form-control" name="NotasSeguimiento" rows="3" placeholder="Ingrese una nota referente al sequimiento..." required></textarea>
                                                    </div>
                                                </div>
                                            </div>
								        </div>
							        </div><!-- /.box-body -->
							    <div class="row">
								    <div class="col-md-12">
                                        <div class="box-footer">
                                            <button name="submit" id="submit" class="btn btn-primary" style="width:200px;"><i class="glyphicon glyphicon-check"></i> Guardar</button>
										    <button name="cancel" id="cancel" class="btn btn-default" style="width:200px;"><i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</button>
                                        </div>
									</div>
								</div>
                                </form>
                            </div><!-- /.box -->

                        </div><!--/.col (left) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    </div><!--/col-span-10-->

</div>
<!-- /Main -->

<script>
    $( document ).ready(function() {
	
        $( "#unidadAcademica" ).change(function() {
            var unidadAcademica = this.value;	
	        if (unidadAcademica == -1) {
                $('#Organizacion').prop('disabled', false);
            }
            else {
	            $('#Organizacion').val(-1);
                $('#Organizacion').prop('disabled', 'disabled');
            }
        });
	
	    $( "#Organizacion" ).change(function() {
            var organizacion = this.value;	
	        if (organizacion == -1) {
                $('#unidadAcademica').prop('disabled', false);
            }
            else {
	            $('#unidadAcademica').val(-1);
                $('#unidadAcademica').prop('disabled', 'disabled');
            }
        });
		
		$( "#Seguimiento" ).change(function () {
		    var sel = $( "#Seguimiento option:selected" ).text();
			if( sel.indexOf("finalizado") >= 0 || sel.indexOf("terminado") >= 0){
			    if($("#chkFinalizado").prop('checked') == false){
				    $('#chkFinalizado').prop('checked', 'disabled');
					$('#Seguimiento').prop('disabled', true);
                }	    
			}else{
			    if($("#chkFinalizado").prop('checked') == true){
				    $('#chkFinalizado').prop('checked', false);
                }	  
			}
		});
		
		$("#chkFinalizado").change(function () {
		    if($("#chkFinalizado").prop('checked') == true){
			    $('#Seguimiento').prop('disabled', 'disabled');
				$('#Seguimiento').val(5);
			}else{
			    $('#Seguimiento').prop('disabled', false);
				$('#Seguimiento').val(-1);
			}
		});
		
	});
</script>

<script type="text/javascript">
    function DenegarIngreso() {
		    event.returnValue = false;
		}
</script>

<script type="text/javascript" src="js/gestion_folios/crear_folio.js" ></script>

<script type="text/javascript" src="js/gestion_folios/navbar_lateral.js" ></script>