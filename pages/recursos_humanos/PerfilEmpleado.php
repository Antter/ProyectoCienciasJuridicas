  <?php

include '../../Datos/conexion.php';



$codigoE = $_POST['codigo'];

 $resultado=mysql_query("SELECT * FROM empleado inner join persona on empleado.N_identidad=persona.N_identidad inner join departamento_laboral on departamento_laboral.Id_departamento_laboral=empleado.Id_departamento Where estado_empleado='1' and No_Empleado='".$codigoE."'");
 $resultado2=mysql_query("SELECT * FROM empleado_has_cargo inner join cargo on cargo.ID_cargo=empleado_has_cargo.ID_cargo where No_Empleado='".$codigoE."'");
 if($row=mysql_fetch_array($resultado)){
     
     
      $nombreE=$row['Primer_nombre'];
      $apellidoE=$row['Primer_apellido'];
      $depE=$row['nombre_departamento'];
      $depID=$row['Id_departamento_laboral'];
      $obsE=$row['Observacion'];
      $noE=$row['N_identidad'];
    
     
 $nombreC =$nombreE." ".$apellidoE;
 

          
         
 }
 
 
 if($row2=mysql_fetch_array($resultado2)){
     
      $cargoE=$row2['Cargo'];
     $idCargoE=$row2['ID_cargo'];
      $fechaE=$row2['Fecha_ingreso_cargo'];
 }
 
 

?>  




    <!-- /.row -->
    <div class="row">
        
         <h3 class="page-header">
          <i class="glyphicon glyphicon-user"></i>Perfil empleado
                               
          </h3>
        
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Informacion personal
                </div>
                <div class="panel-body">
                 <div class="row">
                        <div class="col-xs-12">
                             
                            <strong> Nombre :</strong> <?php echo $nombreC ?>
                            <small class="pull-right">Codigo empleado: <?php echo $codigoE ?></small>
                            
                           
                        </div><!-- /.col -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                
                
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>