<?php


 $query = mysql_query(" SELECT empleado.No_Empleado,empleado.N_identidad,persona.Primer_nombre,
 persona.Primer_apellido, departamento_laboral.nombre_departamento FROM empleado
 inner join persona on empleado.N_identidad=persona.N_identidad 
 inner join departamento_laboral on departamento_laboral.Id_departamento_laboral =empleado.Id_departamento
 where empleado.No_Empleado not in (SELECT usuario.No_Empleado from usuario)
	");

?>


<html lang="en">
    
    <head>
        
        <meta charset="UTF-8">
        
       

        
        <script>

              /* 
               * To change this license header, choose License Headers in Project Properties.
               * To change this template file, choose Tools | Templates
               * and open the template in the editor.
               */


               $(document).ready(function(){
                  fn_dar_eliminar();               
            });

            var x;
            x = $(document);
            x.ready(inicio);



            function inicio()
            {

                var x;
                x = $(".crear");
                x.click(crear);

                var x;
                x = $(".verb");
                x.click(VerPerfil);
            }
            ;



            function fn_dar_eliminar() {

                $(".elimina").click(function() {
                    id1 = $(this).parents("tr").find("td").eq(0).html();



                    eliminarE();

                });
            }
            ;


            function eliminarE() {
                var respuesta = confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
                if (respuesta) {
                    data1 = {codigoE: id1};

                    $.ajax({
                        async: true,
                        type: "POST",
                        dataType: "html",
                        contentType: "application/x-www-form-urlencoded",
                        url: "Datos/eliminarUniversidad.php",
                        beforeSend: inicioEnvio,
                        success: EliminarEmpleado,
                        timeout: 4000,
                        error: problemas
                    });
                    return false;
                }
            }





            function crear()
            {
                var pid = $(this).parents("tr").find("td").eq(0).html();
               

                data = {codigo: pid};


                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    url:"pages/permisos/crear_usuario.php",  
                    beforeSend: inicioEnvio,
                    success: EditarEmpleado,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }


            function VerPerfil()
            {
                var pid = $(this).parents("tr").find("td").eq(0).html();
               


                data2 = {codigo: pid};


                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    //  url:"pages/recursos_humanos/modi_universidad.php",  
                    beforeSend: inicioEnvio,
                    success: verPerfilE,
                    timeout: 4000,
                    error: problemas
                });
                return false;
            }



            function inicioEnvio()
            {
                var x = $("#contenedor2");
                x.html('Cargando...');
            }

            function EditarEmpleado()
            {
                $("#contenedor").load('pages/permisos/crear_usuarios.php', data);
                //$("#contenedor").load('../cargarPOAs.php');
            }

            function EliminarEmpleado()
            {
                $("#contenedor").load('Datos/eliminarEmpleado.php', data1);
                //$("#contenedor").load('../cargarPOAs.php');
            }

            function verPerfilE()
            {
                $("#contenedor").load('pages/recursos_humanos/perfilEmpleado.php', data2);
                //$("#contenedor").load('../cargarPOAs.php');
            }

            function problemas()
            {
                $("#contenedor").text('Problemas en el servidor.');
            }



        </script>

        
        
      <script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#tabla_empleados').dataTable(); // example es el id de la tabla
    } );
    </script>
    
 <script type="text/javascript">
  // For demo to fit into DataTables site builder...
  $('#tabla_empleados')
    .removeClass( 'display' )
    .addClass('table table-striped table-bordered');
</script>
           
    </head>

    <body>
        
             <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Lista de Empleados sin Usuario</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        
       
                   
          <div class="box">
           <div class="box-header">
           
           </div><!-- /.box-header -->
           <div class="box-body table-responsive">
               <?php
              
                   echo <<<HTML
                                    <table id="tabla_empleados" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>                                            
                                            <th>No empleado</th>
                                            <th>No identidad</th>
                                            <th>nombre</th>
                                            <th>Apellido</th>
                                            <th>Departamento</th>
                                            <th>Seleccionar</th>
                                        
                                        </tr>
                                        </thead>
                                        <tbody>
HTML;

            while ($row = mysql_fetch_array($query))  {

             $Noempleado = $row['No_Empleado'];
            $Noidentidad = $row['N_identidad'];
            $nombre = $row['Primer_nombre'];
            $apellido=$row['Primer_apellido'];
            $departamento=$row['nombre_departamento'];
            
                echo "<tr data-id='".$Noempleado."'>";
                echo <<<HTML
                <td>$Noempleado</td>

HTML;
                //echo <<<HTML <td><a href='javascript:ajax_("'$url'");'>$NroFolio</a></td>HTML;
                echo <<<HTML
                <td>$Noidentidad</td>

HTML;
                echo <<<HTML
                <td>$nombre</td>
HTML;
                echo <<<HTML
                <td>$apellido</td>
HTML;
                echo <<<HTML
                <td>$departamento</td>                        

               
            
             
                        
                 <td><center>
					<button class="crear btn btn-primary glyphicon glyphicon-edit"  title="Crear Usuario">
                </center></td>       
        
                    
             
                        
                        
HTML;
                echo "</tr>";

            }

                   echo <<<HTML
                                        </tbody>
                                        <tfoot>
                                        <tr>                                            
                                            <th>No empleado</th>
                                            <th>No identidad</th>
                                            <th>nombre</th>
                                            <th>Apellido</th>
                                            <th>Departamento</th>
                                            <th>Seleccionar</th>
                                            
                                        </tr>
                                        </tfoot>
									</table>
HTML;
             
               ?>
           </div><!-- /.box-body -->
       </div><!-- /.box -->
                           
                            <!-- /.table-responsive -->
    </body>
    

    
    
</html>