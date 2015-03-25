<?php

$idAct= $_POST['ide'];
include '../Datos/conexion.php';
// aqui falta aplicar el filtro para que solo carge las actividades  de un solo indicador
$query = mysql_query("SELECT * FROM actividades where id_actividad='".$idAct."'",$enlace);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    
    
    
    <script>
        
        if (top.location != location) {
    top.location.href = document.location.href ;
  }
		$(function(){
			window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'yyyy-mm-dd',
                                autoclose: true,
                                todayBtn: true
			}).on('show', function() {
                            // Obtener valores actuales z-index de cada elemento
                           	var zIndexModal = $('#myModal').css('z-index');
                                var zIndexFecha = $('.datepicker').css('z-index');
                                //alert(zIndexModal + zIndexFEcha);
                                $('.datepicker').css('z-index',zIndexModal+1);
                            });
			
			
			var startDate = new Date(2012,1,20);
			var endDate = new Date(2012,1,25);
			
			
        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
		});
    
    
    </script>
    
</head>

<body>
    
    <input type="hidden" id="idAct" value="<?php echo $idAct;?>">  
    <div class="row">
        <div class="col-lg-8">
            <div class="panel-primary">
                <div class="panel-heading">
                    Información de la Actividad
                </div>
                <div class="panel-body">
                          <?php
                          while($row = mysql_fetch_array($query)){
                              $id = $row['id_actividad'];
                              ?>
                    <table class="table">
                        <thead>
                        <th></th>
                        <th></th>
                    </thead>
                    <tr>
                        <td><div class="text" id="correlativo-<?php echo $id ?>">Correlativo</div></td>
                        <td><div class="text" id="correlativo-<?php echo $id ?>"><?php echo $row['correlativo']?></div></td>
                    </tr>
                    <tr>
                        <td><div class="text" id="correlativo-<?php echo $id ?>">Actividad</div></td>
                        <td><div class="text" id="descripcion-<?php echo $id ?>"><?php echo $row['descripcion']?></div></td> 
                    </tr>
                    <tr>
                        <td><div class="text" id="correlativo-<?php echo $id ?>">Supusto</div></td>
                        <td><div class="text" id="supuestos-<?php echo $id ?>"><?php echo $row['supuesto']?></div></td>
                    </tr>
                    <tr>
                        <td><div class="text" id="correlativo-<?php echo $id ?>">Justificación</div></td>
                        <td><div class="text" id="justificacion-<?php echo $id ?>"><?php echo $row['justificacion']?></div></td>
                    </tr>
                    <tr>
                        <td><div class="text" id="correlativo-<?php echo $id ?>">Medio de Verificación</div></td>
                        <td><div class="text" id="medio_Verificacion-<?php echo $id ?>"><?php echo $row['medio_verificacion']?></div></td>
                    </tr>
                    <tr>
                        <td><div class="text" id="correlativo-<?php echo $id ?>">Población Objetivo</div></td>
                        <td><div class="text" id="poblacion_Objetivo-<?php echo $id ?>"><?php echo $row['poblacion_objetivo']?></div></td> 
                    </tr>
                    <tr>
                        <td><div class="text" id="correlativo-<?php echo $id ?>">Fecha de Inicio</div></td>
                        <td><div class="text" id="fecha_Inicio-<?php echo $id ?>"><?php echo $row['fecha_inicio']?></div></td>
                    <tr>
                        <td><div class="text" id="correlativo-<?php echo $id ?>">Fecha de Fin</div></td>
                        <td><div class="text" id="fecha_Fin-<?php echo $id ?>"><?php echo $row['fecha_fin']?></div></td>
                    </tr>
                    </table>
                        <?php
                        }
                        ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Responsable  de Actividad
                </div>
                <div class="panel-body">
                    <div class="panel-default ">
                        <button class="btn btn-success fa fa-file" data-toggle="modal" data-target="#myModal">
                            Asignar Responsable
                        </button>                        
                    </div>
                    <div id="responsables" class="panel-default">
                        
                        <table class="table">
                            <thead>
                            <th></th>
                            </thead>
                        
                        <?php
                    
                    $query = mysql_query("SELECT * FROM responsables_por_actividad inner join grupo_o_comite on responsables_por_actividad.id_Responsable=grupo_o_comite.ID_Grupo_o_comite where responsables_por_actividad.id_Actividad=".$idAct,$enlace);
                    while($row = mysql_fetch_array($query)){
                        //$idgrupo = $row['ID_Grupo_o_comite'];
                        $nombre=$row['Nombre_Grupo_o_comite'];
                        ?>
                            <tr>
                                <td><?php echo $nombre; ?></td>
                                <td> <button type="button" id="eliminar" class="btn btn-danger fa fa-times">Eliminar</button></td>
                            </tr>
                    
                    <?php
                        }
                        ?>
                    </table>
                    </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Sub Actividades
                </div>
                <div class="panel-body">
                    <div class="panel-default ">
                        <button id="asignarSubActividad" class="btn btn-success fa fa-file ">
                            Asignar Sub Actividades
                        </button>                        
                    </div>
                    
                    
                    
                    
                    <div id="subActividades" class="panel-default">
                        
                        <table class="table">
                            <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Fecha Monitoreo</th>
                            <th>Encargado</th>
                            <th>Porcentaje</th>
                            <th>Costo</th>
                            <th>Observación</th>
                            </thead>
                        
                        <?php
                    
                    $query = mysql_query("SELECT * FROM sub_actividad  where idActividad=".$idAct,$enlace);
                    while($row = mysql_fetch_array($query)){
                        //$idgrupo = $row['ID_Grupo_o_comite'];
                        
                        ?>
                            <tr>
                                <td><?php $row['id_sub_Actividad'] ?></td>
                                <td><?php $row['nombre'] ?></td>
                                <td><?php $row['descripcion'] ?></td>
                                <td><?php $row['fecha_monitoreo'] ?></td>
                                <td><?php $row['id_Encargado'] ?></td>
                                <td><?php $row['ponderacion'] ?></td>
                                <td><?php $row['costo'] ?></td>
                                <td><?php $row['observacion'] ?></td>
                            </tr>
                    
                    <?php
                        }
                        ?>
                    </table>
                        <div id="nuevaSub"></div>
                    </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
        
        
    </div>
    
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Responsable</h4>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label>Grupo o Comite </label>
                        <select id="grupo" class="form-control">
                            <option value="0">Seleccione..</option>
                            
                        
                    
                    <?php
                    
                    $query = mysql_query("SELECT * FROM grupo_o_comite",$enlace);
                    while($row = mysql_fetch_array($query)){
                        $idgrupo = $row['ID_Grupo_o_comite'];
                        $nombre=$row['Nombre_Grupo_o_comite'];
                        ?>
                    <option value="<?php echo $idgrupo; ?>"><?php echo $nombre; ?></option>
                    <?php
                        }
                        ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label>Observacion</label>
                        <textarea id="observacionres" class="form-control" rows="3"></textarea>
                    </div>
                        
                        
               
                <div class="modal-footer">
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="guardarRes" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    </div>
    
    
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Responsable</h4>
                </div>
                <div class="modal-body" id="myModal2body">
                    
                    
                
            </div>
                
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <script>
        var id;
     var data;
      var id2;
     var data2;
 var x;
 x=$(document);
 x.ready(inicio);
 
    function inicio(){
        
        var x;
        x=$("#guardarRes");
        x.click(responsable);
        
        var x;
        x=$("#asignarSubActividad");
        x.click(asignarSubActividad);
        
        
       
    }
    
    
    function insertarSubActividad(){
            //id2 = $(this).parents("tr").find("td").eq(0).html();
              //alert(id);      
                data2 ={
                idAct:$("#idAct").val()
            };  
            //alert($("#nombre").val()); 
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/crearSubActividad.php", 
                //beforeSend:inicioSub,
                success:llegadaInsertarSubActividad,
                timeout:4000,
                error:problemasSub
            }); 
            return false;
        }
        
        function asignarSubActividad(){
            //id2 = $(this).parents("tr").find("td").eq(0).html();
              //alert(id);      
                data2 ={
                idAct:$("#idAct").val()
            };  
            //alert($("#nombre").val()); 
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/crearSubActividad.php", 
                //beforeSend:inicioSub,
                success:llegadaasignarSubActividad,
                timeout:4000,
                error:problemasSub
            }); 
            return false;
        }
        
        
        function responsable() {
            var pnombre=$("#grupo").val(); 
            alert(pnombre);
            data ={ obs:$("#observacionres").val(),
                grupo:$("#grupo").val(),
                idAct:$("#idAct").val()
            };
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"Datos/insertarActividad.php", 
                beforeSend:inicioEnvio,
                success:llegadaGuardarRes,
                timeout:4000,
                error:problemasRes
            }); 
            return false;
        } 
        

    function inicioEnvio()
{
    var x=$("#responsables");
    x.html('Cargando...');
}
function llegadaInsertarSubActividad()
{
    $("#myModal2body").load('pages/crearSubActividad.php',data2);
    $('#myModal2').modal('show');
}

function llegadaasignarSubActividad()
{
    $("#myModal2body").load('pages/crearSubActividad.php',data2);
    $('#myModal2').modal('show');
}
function llegadaGuardarRes()
{
    $("#responsables").load('Datos/insertarResponsable.php',data);
}

function problemasSub()
{
    $("#nuevaSub").text('Problemas en el servidor.');
}


function problemasRes()
{
    $("#responsables").text('Problemas en el servidor.');
}


    </script>
    
    
    
    
    
    
    
</body>

</html>
