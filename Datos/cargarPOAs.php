<?php
include '../Datos/conexion.php';

$query = mysql_query("SELECT * FROM poa  ORDER BY fecha_Fin",$enlace);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    
        
    
    

    
</head>

<body>
<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>   
                                            <th>id</th>
                                            <th>Titulo</th>
                                            <th>DEL</th>
                                            <th>Al</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
				while($row = mysql_fetch_array($query))
				{
					$id = $row['id_Poa'];
					?>
					<tr>
                                            <td><?php echo $row['id_Poa']?></td>
                        <td><div class="text" id="titulo-<?php echo $id ?>"><?php echo $row['nombre']?></div></td>
                        <td><div class="text" id="del-<?php echo $id ?>"><?php echo $row['fecha_de_Inicio']?></div></td>
                        <td><div class="text" id="al-<?php echo $id ?>"><?php echo $row['fecha_Fin']?></div></td>
                        <td><a class="ver btn btn-success  fa fa-arrow-right "></a>
                            <a class="editar btn btn-info fa fa-pencil "></a>
                            <a class="elimina btn btn-danger fa fa-trash-o"></a>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
					<?php
				}
				 ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
   
  
   
    



 


</body>
<script>

            $(document).ready(function() {

                
                $(".ver").click(function() {
                id = $(this).parents("tr").find("td").eq(0).html();
                //alert(id);      
                data1 = {ide: id};
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    url: "pages/crearObjetivo.php",
                    beforeSend: inicioVer,
                    success: llegadaVer,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            });
            $(".elimina").click(function() {
                var respuesta = confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
                if (respuesta)
                {

                    id = $(this).parents("tr").find("td").eq(0).html();
                    // alert(id);      
                    data = {id: id};
                    $.ajax({
                        async: true,
                        type: "POST",
                        dataType: "html",
                        contentType: "application/x-www-form-urlencoded",
                        url: "Datos/eliminarPOA.php",
                        beforeSend: inicioEliminar,
                        success: llegadaEliminar,
                        timeout: 4000,
                        error: problemas
                    });
                    return false;
                }
            });
            
            $(".editar").click(function() {
                

                    id = $(this).parents("tr").find("td").eq(0).html();
                    // alert(id);      
                    data4 = {id: id};
                    $.ajax({
                        async: true,
                        type: "POST",
                        dataType: "html",
                        //: "application/x-www-form-urlencoded",
                        //url: "pages/editarPOA.php",
                        //beforeSend: inicioEliminar,
                        success: llegadaEditarPOA,
                        timeout: 4000,
                        error: problemas
                    });
                    return false;
                
            });


            });

            



            function inicioVer()
            {
                var x = $("#contenedor");
                x.html('Cargando...');
            }

            function inicioEliminar()
            {
                var x = $("#contenedor2");
                x.html('Cargando...');
            }
            function inicioEnvio()
            {
                var x = $("#contenedor2");
                x.html('Cargando...');
            }
            function llegadaEditarPOA()
            {
                $("#cuerpoEditar").load('pages/editarPOA.php', data4);
                $('#editarPOA').modal('show');
            }
            function llegadaEliminar()
            {
                $("#contenedor2").load('Datos/eliminarPOA.php', data);
            }
            function llegadaVer()
            {
                $("#contenedor").load('pages/crearObjetivo.php', data1);
            }
            function llegadaGuardar()
            {
                $("#contenedor2").load('Datos/insertarPOA.php', data2);
            }

            function problemas()
            {
                $("#contenedor2").text('Problemas en el servidor.');
            }

        </script>
 
</html>