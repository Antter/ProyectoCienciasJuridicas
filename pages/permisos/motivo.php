<?php
//include 'conexion.php';
require_once("../../conexion/conn.php");  

$conexion = mysqli_connect($host, $username, $password, $dbname);

$rec = mysqli_query($conexion, "SELECT * from motivos");
?>

<!DOCTYPE html>
<html lang="en">

<head>

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
                    <h1 class="page-header">Motivos</h1>
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
                                    <form role="form" action="#", method="GET">
									
                                        <div class="form-group">
                                            <label>Motivo</label>
                                            <input class="form-control" id ="motivo" name="motivo">
                                        </div>
										
                                        <button id = "guardar" class="guardarMotivo btn btn-default">Agregar</button>
										
                                        <button type="reset" class="btn btn-default">Cancelar</button><br><br>
										
									<?php
              
                   echo <<<HTML
                                    <table id="tabla_Motivos" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th><strong>ID Motivo</strong></th>
                                             <th><strong>Descripcion Motivo</strong></th>
                                             <th><strong>Eliminar</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
HTML;

               while ($row = mysqli_fetch_array($rec))  {

				$idM = $row['Motivo_ID'];
				$dmotivo = $row['descripcion'];
            
            
                echo "<tr data-id='".$idM."'>";
                echo <<<HTML
                <td>$idM</td>

HTML;
                //echo <<<HTML <td><a href='javascript:ajax_("'$url'");'>$NroFolio</a></td>HTML;
                echo <<<HTML
				
                <td>$dmotivo</td>
				
				  <td><center>
                    <button name="Motivo_ID"  class="elimina btn btn-danger glyphicon glyphicon-edit"> </button>
                </center></td>


HTML;
                echo "</tr>";

            }

                   echo <<<HTML
                                       
									</table>
HTML;
             
               ?>
									
									
									</form>
								</div>
							</div>
						</div>
					</div>					
				</div>						
			</div>							
	</div>

<script>
$(document).ready(function(){
                fn_dar_eliminar();               
            });
			
 var id;
 var data;
 var x;
 x=$(document);
 x.ready(inicio);
 
    function inicio(){
        var x;
        x=$("#guardar");
        x.click(consulta);
        
       /* var x;
        x=$(".eliminar");
        x.click(ver);*/
	}
	
	function consulta() {
            var dmotivo=$("#motivo").val(); 
			var patron = /[0-9]/;
			if(dmotivo != '' && !(patron.test(dmotivo))){
            //alert(dmotivo);
               data ={ dmotivo:$("#motivo").val()};
               $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/permisos/insertarMotivos.php", 
                beforeSend:inicioEnvio,
                success:llegadaGuardar,
				data:data,
                timeout:4000,
                error:function(result){  
            alert('ERROR ' + result.status + ' ' + result.statusText);  
          }
            }); 
			}else{alert('El campo esta vacio ó contiene numeros');}
            return false;
    }

	
	function inicioEnvio(){
    var x=$("#contenedor");
    x.html('Cargando...');
	}
	
	function llegadaGuardar(){
		alert("Transacción completada correctamente");
		$("#contenedor").load('pages/permisos/motivo.php', data);
	}
	
	function problemas()
	{
    $("#contenedor").text('Problemas en el servidor.');
	}
	
	function eliminarMotivo(){
        var respuesta=confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
        if (respuesta){  
             data1 ={ Motivo_ID:id1};
			
		$.ajax({
			async:true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"pages/permisos/eliminarMotivos.php",     
			beforeSend:inicioEnvio,
			//data:data,
			success:llegadaEliminarMotivo,
			timeout:4000,
			error:problemas
		}); 
		return false;
		}
	}

	function llegadaEliminarMotivo()
            {
                $("#contenedor").load('pages/permisos/eliminarMotivos.php',data1);
				alert("Transacción completada correctamente");
				$("#contenedor").load('pages/permisos/motivo.php');
            }
			
	function fn_dar_eliminar(){
          
		$(".elimina").click(function(){
			id1 = $(this).parents("tr").find("td").eq(0).html();
			//alert(id1);
			eliminarMotivo();
		  
		});
	};
	
</script>
	
</body>

</html>	