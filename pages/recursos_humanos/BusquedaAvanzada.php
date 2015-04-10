
<?php

require_once('../../Datos/conexion.php');

 $consulta1 = "select Tipo_estudio from tipo_estudio";
 $resultado1 = mysql_query($consulta1);
 $tipo_estudio = mysql_fetch_array($resultado1);
 

?>

<html>
    
    <head>
        
        
        
         <script>
 
          $( document ).ready(function() {

           $("form").submit(function(e) {
	    e.preventDefault();

            data={
                    licencitura:$('#lic').val(),
                    maestria:$("#maestr").val(),
                    doctorado:$("#doc").val()
                   
                };
                
                
            
            $.ajax({
                   async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    beforeSend: inicioEnvio,
                    success: llegadaBusqueda,
                    timeout: 4000,
                    error: problemas
            }); 
            return false;
               
	});
        
                var x;
                x = $(".verb");
                x.click(VerPerfil);
        
        
        
   });
            
           
               function VerPerfil()
            {
                var pid = $(this).parents("tr").find("td").eq(0).html();
               


                data2 = {identi: pid};


                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
                    //  url:"pages/recursos_humanos/modi_universidad.php",  
                    beforeSend: inicioEnvio,
                    success: verPerfilP,
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

            function llegadaBusqueda()
            {
                $("#contenedor2").load('Datos/consultaRH.php',data);
                
            }
            
              function verPerfilP()
            {
                $("#contenedor").load('pages/recursos_humanos/cv/reportes/personaObtener.php',data2);
                
            }
            

            function problemas()
            {
                $("#contenedor2").text('Problemas en el servidor.');
            }

         </script>
        
        
    </head>
    
    <body>
 
        
      <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Busqueda por filtros
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" id="form" action="#" method="POST">

                                               <div class="form-group">
                                    <label class="col-lg-6"><h5><strong>Licenciatura :</strong></h5></label>
                               

                                   <div class="col-lg-6">
                                       <select name="lic" class="form-control" id="lic" required>
                                        
                                       
                                        <option value=-1>Ninguna</option>

                                        <?php
                                        $consulta_mysql = "SELECT distinct nombre_titulo FROM `estudios_academico` inner join tipo_estudio on estudios_academico.ID_Tipo_estudio=tipo_estudio.ID_Tipo_estudio where tipo_estudio.tipo_estudio='licenciatura'";
                                        $resultado3 = mysql_query($consulta_mysql);
                                        //$rec=mysql_fetch_array($resultado3);



                                        while ($row = mysql_fetch_array($resultado3)) {

                                          
                                                
                                            
                                                echo "<option value = '" . $row['nombre_titulo'] . "'>";
                                            

                                            echo $row["nombre_titulo"];

                                            echo "</option>";
                                        }
                                        ?>



                                    </select>
                                </div>
                               </div>
                                
                                <br>
                                <br>
                                <br>
                                
                                           <div class="form-group">
                                    <label class="col-lg-6"><h5><strong>Maestria :</strong></h5></label>
                               

                                   <div class="col-lg-6">
                                       <select name="maestr" class="form-control" id="maestr" required>
                                        
                                       
                                        <option value=-1>Ninguna</option>

                                        <?php
                                        $consulta_mysql = "SELECT distinct nombre_titulo FROM `estudios_academico` inner join tipo_estudio on estudios_academico.ID_Tipo_estudio=tipo_estudio.ID_Tipo_estudio where tipo_estudio.tipo_estudio='Maestria'";
                                        $resultado3 = mysql_query($consulta_mysql);
                                        //$rec=mysql_fetch_array($resultado3);



                                        while ($row = mysql_fetch_array($resultado3)) {

                                       
                                            echo "<option value = '" . $row['nombre_titulo'] . "'>";
                                            

                                            echo $row["nombre_titulo"];

                                            echo "</option>";
                                        }
                                        ?>



                                    </select>
                                </div>
                               </div>
                                
                                
                                <br>
                                <br>
                                
                                
                                
                                
                                                 <div class="form-group">
                                    <label class="col-lg-6"><h5><strong>Doctorado :</strong></h5></label>
                               

                                   <div class="col-lg-6">
                                       <select name="doc" class="form-control" id="doc" required>
                                        
                                         
                                        <option value=-1>Ninguno</option>

                                        <?php
                                        $consulta_mysql = "SELECT distinct nombre_titulo FROM `estudios_academico` inner join tipo_estudio on estudios_academico.ID_Tipo_estudio=tipo_estudio.ID_Tipo_estudio where tipo_estudio.tipo_estudio='Doctorado'";
                                        $resultado3 = mysql_query($consulta_mysql);
                                        //$rec=mysql_fetch_array($resultado3);



                                        while ($row = mysql_fetch_array($resultado3)) {

                            
                                           echo "<option value = '" . $row['nombre_titulo'] . "'>";
                                           

                                            echo $row["nombre_titulo"];

                                            echo "</option>";
                                        }
                                        ?>



                                    </select>
                                </div>
                               </div>
                                
                                
                                
                                <br>
                                <br>
                                
                              
                              <button type="submit" name="submit"  id="submit" class="submit btn btn-primary glyphicon glyphicon-search" > Buscar</button>
                           


                            </form>
                        </div>
                       
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>


                <!-- /.panel-body -->
                

        
        
        
        
 <div id="contenedor2" class="panel-body">
        <?php
        
       

      require_once("../../Datos/cargarPersonas.php");
         
     
        ?>
 </div>
        
        
        
    </body>
    
    
</html>