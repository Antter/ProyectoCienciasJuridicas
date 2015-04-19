<?php
require_once("../../conexion/conn.php");  

$conexion = mysqli_connect($host, $username, $password, $dbname);

$rec = mysqli_query($conexion, "SELECT * from edificios");
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
                    <h1 class="page-header">Edificios</h1>
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
                                    <form role="form" action="#", method ="GET">
                                        <div class="form-group">
                                            <label>Nombre Edificio</label>
                                            <input id = "nmedificio" class="form-control" name ="edificio">
                                        </div>
										
                                        <button id = "guardarEdificio" class="btn btn-default">Agregar</button>
										
										
                                        <button type="reset" class="btn btn-default">Cancelar</button><br><br>
										
										<?php
              
                   echo <<<HTML
                                    <table id="tabla_Edificios" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th><strong>ID Edificio</strong></th>
                                             <th><strong>Nombre Edificio</strong></th>
                                             <th><strong>Eliminar</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
HTML;

               while ($row = mysqli_fetch_array($rec))  {

				$idE = $row['Edificio_ID'];
				$dedificio = $row['descripcion'];
            
            
                echo "<tr data-id='".$idE."'>";
                echo <<<HTML
                <td>$idE</td>

HTML;
                //echo <<<HTML <td><a href='javascript:ajax_("'$url'");'>$NroFolio</a></td>HTML;
                echo <<<HTML
				
                <td>$dedificio</td>
				
				  <td><center>
                    <button name="Edificio_ID"  class="elimina btn btn-danger glyphicon glyphicon-edit"> </button>
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
	
</body>


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
        x=$("#guardarEdificio");
        x.click(consultaEdificio);
        
        
	}
	
	function consultaEdificio() {
            var dedificio=$("#nmedificio").val(); 
			if(dedificio != ''){
            //alert(dmotivo);
            data ={ dedificio:$("#nmedificio").val()};
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/permisos/insertarEdificios.php", 
                beforeSend:inicioEnvio,
				data:data,
                success:llegadaGuardar,
                timeout:4000,
                error:function(result){  
            alert('ERROR ' + result.status + ' ' + result.statusText);  
          }
            }); 
			}else{alert('El campo esta vacio');}
            return false;
    }
	
	function inicioEnvio(){
    var x=$("#contenedor");
    x.html('Cargando...');
	}
	
	function llegadaGuardar(){
		alert("Transacción completada correctamente");
		$("#contenedor").load('pages/permisos/Edificios.php', data);
	}
	
	function problemas()
	{
    $("#contenedor").text('Problemas en el servidor.');
	}
	
	function eliminarEdificio(){
        var respuesta=confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
        if (respuesta){  
             data1 ={ Edificio_ID:id1};
			
		$.ajax({
			async:true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"pages/permisos/eliminarEdificios.php",     
			beforeSend:inicioEnvio,
			//data:data,
			success:llegadaeliminarEdificio,
			timeout:4000,
			error:problemas
		}); 
		return false;
		}
	}

	function llegadaeliminarEdificio()
            {
                $("#contenedor").load('pages/permisos/eliminarEdificios.php',data1);
				alert("Transacción completada correctamente");
				$("#contenedor").load('pages/permisos/edificios.php');
            }
			
	function fn_dar_eliminar(){
          
		$(".elimina").click(function(){
			id1 = $(this).parents("tr").find("td").eq(0).html();
			//alert(id1);
			eliminarEdificio();
		  
		});
	};

	
</script>

</html>	
											
											
											
											
											
										
										
										
										