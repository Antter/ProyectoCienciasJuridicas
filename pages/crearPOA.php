<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    
    <head>
    <meta charset="utf-8">
    <title></title>
    
    <link href="css/datepicker.css" rel="stylesheet">
	<style>
	.container {
		background: #fff;
	}
	#alert {
		display: none;
	}
	</style>
    <link href="css/prettify.css" rel="stylesheet">
    
    
    
    
    <script src="js/prettify.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
     
    <script>
 var id;
var data;
var data1;
var data2;
 var x;
 x=$(document);
 x.ready(crearPOA);
 
    function crearPOA(){
        
        var x;
        x=$("#guardar");
        x.click(consulta);
        
        var x;
        x=$(".ver");
        x.click(ver);
       
       var x;
        x=$(".elimina");
        x.click(eliminar);
       
    }
    
    function eliminar(){
        var respuesta=confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
        if (respuesta)
    {    
      
            id = $(this).parents("tr").find("td").eq(0).html();
             // alert(id);      
               data ={id:id};     
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"Datos/eliminarPOA.php", 
                beforeSend:inicioEliminar,
                success:llegadaEliminar,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }
        }
        
        function ver(){
            id = $(this).parents("tr").find("td").eq(0).html();
              //alert(id);      
                data1 ={ ide:id};     
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/crearObjetivo.php", 
                beforeSend:inicioVer,
                success:llegadaVer,
                timeout:4000,
                error:problemas
            }); 
            return false;
        }
        
        function consulta() {
            var pnombre=$("#titulo").val(); 
            alert(pnombre);
            data2 ={ titulo:$("#titulo").val(),
                inicio:$("#dp1").val(),
                fin:$("#dp2").val(),
                observacion:$("#observacion").val()
            };
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"Datos/insertarPOA.php", 
                beforeSend:inicioEnvio,
                success:llegadaGuardar,
                timeout:4000,
                error:problemas
            }); 
            return false;
        } 
        
        
            function inicioVer()
{
    var x=$("#contenedor");
    x.html('Cargando...');}
    
    function inicioEliminar()
{
    var x=$("#contenedor2");
    x.html('Cargando...');
}
    function inicioEnvio()
{
    var x=$("#contenedor2");
    x.html('Cargando...');
}
function llegadaEliminar()
{
    $("#contenedor2").load('Datos/eliminarPOA.php',data);
}
function llegadaVer()
{
    $("#contenedor").load('pages/crearObjetivo.php',data1);
}
function llegadaGuardar()
{
    $("#contenedor2").load('Datos/insertarPOA.php',data2);
}

function problemas()
{
    $("#contenedor2").text('Problemas en el servidor.');
}


    </script>
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
			$('#dp2').datepicker({
                                 language: "es",
				format: 'yyyy-mm-dd'
			});
			$('#dp3').datepicker();
			$('#dp3').datepicker();
			$('#dpYears').datepicker();
			$('#dpMonths').datepicker();
			
			
			var startDate = new Date(2012,1,20);
			var endDate = new Date(2012,1,25);
			$('#dp4').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() > endDate.valueOf()){
						$('#alert').show().find('strong').text('The start date can not be greater then the end date');
					} else {
						$('#alert').hide();
						startDate = new Date(ev.date);
						$('#startDate').text($('#dp4').data('date'));
					}
					$('#dp4').datepicker('hide');
				});
			$('#dp5').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() < startDate.valueOf()){
						$('#alert').show().find('strong').text('The end date can not be less then the start date');
					} else {
						$('#alert').hide();
						endDate = new Date(ev.date);
						$('#endDate').text($('#dp5').data('date'));
					}
					$('#dp5').datepicker('hide');
				});

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
	
</script>
<script type="text/javascript">
_uacct = "UA-106117-1";
urchinTracker();
</script>
    
    
    
    
    
    
    </head> 
    <body>
    
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Agregar Plan Operativo Anual (POA)
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                               <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="col-lg-8">
                                                
                                                    
                                                     <button class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                Nuevo POA
                            </button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <label >Mis POA</label>
                                        </h4>
                                    </div>
                                    <div >
                                        <div id="contenedor2" class="panel-body">
                                            <?php 
                                            include '../Datos/cargarPOAs.php';                                           
                                            
                                            ?>
                                        </div>
                                    </div>
                                </div> 
                                
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

    
    
    
    
       
    
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Plan Operativo Anual</h4>
            </div>
            <div class="modal-body">
               <div class="form-group">
                   <label>Titulo Del POA</label>
                   <input id="titulo" class="form-control" required>
               </div>
                <div class="form-group">
                    <label for="dtp_input2" class="col-md-2 control-label">Del</label>
                    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-m-d" data-link-field="dtp_input2" data-link-format="yyyy-m-d">
                        <input type="text" class="form-control" size="5"  id="dp1" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <label for="dtp_input2" class="col-md-2 control-label">Al</label>
                    <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-m-d" data-link-field="dtp_input2" data-link-format="yyyy-m-d">
                        <input type="text" class="form-control" size="5"  id="dp2" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" /><br/>
                </div>
                <div class="form-group">
                    <label>Observacion</label>
                    <textarea id="observacion" class="form-control" rows="3"></textarea>
                </div>
                
                
                
                
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="guardar" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>  
    
    
   
    
   

</body>
</html>

