<?php
require_once("../../conexion/conn.php");  

$conexion = mysqli_connect($host, $username, $password, $dbname);

$rec = mysqli_query($conexion, "SELECT * from unidad_acad");
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
                    <h1 class="page-header">Unidad Academica</h1>
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
                                            <label>Nombre Unidad</label>
                                            <input id = "descripcionUnidad" class="form-control" name ="dunidad">
                                        </div>
										<button id = "guardarUnidad" class="btn btn-default">Agregar</button>
										
                                        <button type="reset" class="btn btn-default">Cancelar</button><br><br>
										
<?php
              
                   echo <<<HTML
                                    <table id="tabla_Unidad" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th><strong>Unidad_ID</strong></th>
                                             <th><strong>Nombre_unidad</strong></th>
                                             <th><strong>Eliminar</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
HTML;

               while ($row = mysqli_fetch_array($rec))  {

             $idU = $row['Unidad_ID'];
            $nombreU = $row['descripcion'];
            
            
                echo "<tr data-id='".$idU."'>";
                echo <<<HTML
                <td>$idU</td>

HTML;
                //echo <<<HTML <td><a href='javascript:ajax_("'$url'");'>$NroFolio</a></td>HTML;
                echo <<<HTML
				
                <td>$nombreU</td>
				
				  <td><center>
                    <button name="Unidad_ID"  class="elimina btn btn-danger glyphicon glyphicon-edit"> </button>
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

    var x;
	var id;
	var data;
	var x;
	x=$(document);
	x.ready(inicio);
 
    function inicio(){
        var x;
        x=$("#guardarUnidad");
		x.click(consultaUnidad);
		
        
        
       /* var x;
        x=$(".eliminar");
        x.click(ver);*/
	}
	
	function consultaUnidad() {
	var dunidad=$("#descripcionUnidad").val();
	var patron = /[0-9]/;
	         if(dunidad != '' && !(patron.test(dunidad))){		
            //alert(dmotivo);
            data ={ dunidad:$("#descripcionUnidad").val()};
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/permisos/insertarUnidad.php", 
                beforeSend:inicioEnvio,
				data:data,
                success:llegadaGuardar,
                timeout:4000,
                error:function(result){  
            alert('ERROR ' + result.status + ' ' + result.statusText);  
          }
            }); 
			}else{alert ('El nombre esta vacío ó contiene numeros');}
            return false;
    }
	
	function inicioEnvio(){
    var x=$("#contenedor");
    x.html('Cargando...');
	}
	
	function llegadaGuardar(){
		alert("Transacción completada correctamente");
		$("#contenedor").load('pages/permisos/Unidad_Academica.php', data);
	}
	
	function problemas()
	{
    $("#contenedor").text('Problemas en el servidor.');
	}
	
	//Eliminar Unidad Academica
	
	
	   function eliminarUnidad(){
	 // var Unidad_ID=$("#Unidad_ID").val();
	   //data ={ Unidad_ID:$("#Unidad_ID").val()};
        var respuesta=confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
        if (respuesta){  
             data1 ={ Unidad_ID:id1};
			
    $.ajax({
        async:true,
        type: "POST",
        dataType: "html",
        contentType: "application/x-www-form-urlencoded",
        url:"pages/permisos/eliminarUnidad.php",     
        beforeSend:inicioEnvio,
		//data:data,
        success:llegadaEliminarUnidad,
        timeout:4000,
        error:problemas
    }); 
    return false;
        }
} 

    function llegadaEliminarUnidad()
            {
                $("#contenedor").load('pages/permisos/eliminarUnidad.php',data1);
				alert("Transacción completada correctamente");
				$("#contenedor").load('pages/permisos/Unidad_Academica.php');
            }
			
	function fn_dar_eliminar(){
          
		$(".elimina").click(function(){
			id1 = $(this).parents("tr").find("td").eq(0).html();
			//alert(id1);
			eliminarUnidad();
		  
		});
	};

	  function problemas()
            {
                $("#contenedor").text('Problemas en el servidor.');
            }

</script>


</html>										
										
										
										
										
										