<?php


require_once('../Datos/conexion.php');



    $licenciatura=$_POST['licencitura'];
    $maestria= $_POST['maestria'];
    $doctorado= $_POST['doctorado'];
    $RB;
    
    
    if($licenciatura=='-1' or $maestria=='-1' or $doctorado=='-1'){
        
        
        if($licenciatura!='-1' and ($maestria=='-1' and $doctorado=='-1')){
            
             $query = "Select * from persona where ((N_identidad in (Select N_identidad from estudios_academico "
            . "where ID_Tipo_estudio=1 and  Nombre_titulo='$licenciatura')))";
            
            $RB=mysql_query($query);
        
        }
        
        
        else if($maestria!='-1' and ($licenciatura=='-1' and $doctorado=='-1')){
            
              $query = "Select * from persona where ((N_identidad in (Select N_identidad from estudios_academico "
            . "where ID_Tipo_estudio=2 and  Nombre_titulo='$maestria')))";
            
            $RB=mysql_query($query);
            
            
            
        
        }else if($doctorado!='-1' and ($licenciatura=='-1' and $maestria=='-1' )){
            
              $query = "Select * from persona where ((N_identidad in (Select N_identidad from estudios_academico "
            . "where ID_Tipo_estudio=3 and  Nombre_titulo='$doctorado')))";
            
            $RB=mysql_query($query);
            
            
        }else if($licenciatura!='-1' or $maestria!='-1'){
            $query = "Select * from persona where ((N_identidad in (Select N_identidad from estudios_academico "
            . "where ID_Tipo_estudio=1 and  Nombre_titulo='$licenciatura'))and "
            . "(N_identidad in (Select N_identidad from estudios_academico "
            . "where ID_Tipo_estudio=2 and  Nombre_titulo='$maestria'))or"
            . "(N_identidad in (Select N_identidad from estudios_academico "
            . "where ID_Tipo_estudio=3 and  Nombre_titulo='$doctorado')))";
            
            $RB=mysql_query($query);
            
        }else{
    
    $query = "Select * from persona where ((N_identidad in (Select N_identidad from estudios_academico "
            . "where ID_Tipo_estudio=1 and  Nombre_titulo='$licenciatura'))or "
            . "(N_identidad in (Select N_identidad from estudios_academico "
            . "where ID_Tipo_estudio=2 and  Nombre_titulo='$maestria'))or"
            . "(N_identidad in (Select N_identidad from estudios_academico "
            . "where ID_Tipo_estudio=3 and  Nombre_titulo='$doctorado')))";
    
          $RB=mysql_query($query);
    
        }

   
    
    }else{
        
           $query = "Select * from persona where ((N_identidad in (Select N_identidad from estudios_academico "
            . "where ID_Tipo_estudio=1 and  Nombre_titulo='$licenciatura'))and "
            . "(N_identidad in (Select N_identidad from estudios_academico "
            . "where ID_Tipo_estudio=2 and  Nombre_titulo='$maestria'))and"
            . "(N_identidad in (Select N_identidad from estudios_academico "
            . "where ID_Tipo_estudio=3 and  Nombre_titulo='$doctorado')))";
           
        $RB=mysql_query($query);
        var_dump($RB);
        
    }
    
    

?>


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
           

<div class="box">
           <div class="box-header">
           
           </div><!-- /.box-header -->
           <div class="box-body table-responsive">
               <?php
              
                   echo <<<HTML
                                    <table id="tabla_empleados" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>                                            
 
                                            <th>No identidad</th>
                                            <th>nombre</th>
                                            <th>Apellido</th>
                                        
                             
                                         <th>Ver perfil</th>
                                        </tr>
                                        </thead>
                                        <tbody>
HTML;

            while ($rowCE = mysql_fetch_array($RB))  {

      
            $Noidentidad = $rowCE['N_identidad'];
            $nombre = $rowCE['Primer_nombre'];
            $apellido=$rowCE['Primer_apellido'];
          
            
                echo "<tr data-id='".$Noidentidad."'>";
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
                                     

               
            
                    
                  <td>

                <center>
                    <button class="verb btn btn-success glyphicon glyphicon-folder-open"  title="Ver_perfil">
                      </button>
                </center>



                </td>          
                        
                        
HTML;
                echo "</tr>";

            }

                   echo <<<HTML
                                        </tbody>
                                        <tfoot>
                                        <tr>                                            
                                    
                                            <th>No identidad</th>
                                            <th>nombre</th>
                                            <th>Apellido</th>
                                          
                                      
                                         
                                            <th>Ver perfil</th>
                                        </tr>
                                        </tfoot>
									</table>
HTML;
             
               ?>
           </div><!-- /.box-body -->
       </div><!-- /.box -->
                           
                            <!-- /.table-responsive -->
    </body>
    