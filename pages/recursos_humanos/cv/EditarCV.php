<?php
//session_start();

include "../../../Datos/conexion.php";



    if(isset($_POST["tipoProcedimiento"])){
    $tipoProcedimiento = $_POST["tipoProcedimiento"];
    
    if($tipoProcedimiento == "insetarTEL"){
       
    require_once('../../../pages/recursos_humanos/cv/nuevo/personaAgregar.php');
    }
     if($tipoProcedimiento == "insetarFA"){
    require_once("../../../pages/recursos_humanos/cv/nuevo/personaAgregar.php");
    }
     if($tipoProcedimiento == "insetarEL"){
    require_once("../../../pages/recursos_humanos/cv/nuevo/personaAgregar.php");
    }
     if($tipoProcedimiento == "insetarEA"){
    require_once("../../../pages/recursos_humanos/cv/nuevo/personaAgregar.php");
    }
    
    if($tipoProcedimiento == "Eliminar"){
    require_once("../../../pages/recursos_humanos/cv/eliminar/personaEliminar.php");
    }
      
      
    
    
    
}

if(isset($_POST['identi'])){
    $queryTEL = mysql_query("SELECT ID_Telefono, Tipo, Numero FROM telefono WHERE N_identidad= '".$_POST['identi']."'");
}


if (isset($_POST['identi'])) {
    $identi = $_POST['identi'];
    $_SESSION['Nidenti'] = $identi;

    $s = mysql_query("SELECT * FROM persona WHERE N_identidad = '" . $identi . "'");
    if ($row = mysql_fetch_array($s)) {
        $id = $row['N_identidad'];
        $pNombre = $row['Primer_nombre'];
        $sNombre = $row['Segundo_nombre'];
        $pApellido = $row['Primer_apellido'];
        $sApellido = $row['Segundo_apellido'];
        $fNac = $row['Fecha_nacimiento'];
        $sexo = $row['Sexo'];
        $direc = $row['Direccion'];
        $email = $row['Correo_electronico'];
        $estCivil = $row['Estado_Civil'];
        $nacionalidad = $row['Nacionalidad'];

        //Experiencia Académica
        $queryEA = mysql_query("SELECT experiencia_academica.ID_Experiencia_academica, Institucion, Tiempo,Clase FROM experiencia_academica inner join clases_has_experiencia_academica on clases_has_experiencia_academica.ID_Experiencia_academica=experiencia_academica.ID_Experiencia_academica inner join clases on clases.ID_Clases=clases_has_experiencia_academica.ID_Clases WHERE N_identidad='". $_POST['identi'] ."'");
        //Formación académica
        $queryFA = mysql_query("SELECT ID_Estudios_academico, Nombre_titulo, ID_Tipo_estudio, Id_universidad FROM estudios_academico WHERE N_identidad= '".$_POST['identi']."'");
        //Experiencia laboral
        $queryEL = mysql_query("SELECT experiencia_laboral.ID_Experiencia_laboral, Nombre_empresa, Tiempo, cargo FROM experiencia_laboral inner join experiencia_laboral_has_cargo on experiencia_laboral_has_cargo.ID_Experiencia_laboral=experiencia_laboral.ID_Experiencia_laboral inner join cargo on cargo.ID_cargo=experiencia_laboral_has_cargo.ID_cargo WHERE experiencia_laboral.N_identidad='".$_POST['identi']."'");
    
        
        
    }

    
}
?>
        
 <html lang="es">      

<head>
    
    <meta charset="utf-8">
    
    <script>
    $(document).ready(function(){
        
        fn_dar_eliminar();  
        
        fn_Agregar();
        
        $("form").submit(function(e) {
            e.preventDefault();
            
            $("#actualTel").modal('hide');
           // $("#actualFA").modal('hide');
           // $("#actualexLab").modal('hide');
           // $("#actualexAc").modal('hide');
           // $("#agregarTelVM").modal('hide');
      
       $(".actualTB").click(function() {
            id = $(this).parents("tr").find("td").eq(0).html();
            tipo = $(this).parents("tr").find("td").eq(1).html();
            numero = $(this).parents("tr").find("td").eq(2).html();
            data = {id:id, tipo:tipo, numero:numero};
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                success: llegadaActTelefono,
                timeout: 4000,
                error: problemas
            });
            return false;
        });
        
        });
        
        $("form").submit(function(e) {
            e.preventDefault();
            
             $("#actualFA").modal('hide');
        
           $(".actualFAB").click(function() {
            id = $(this).parents("tr").find("td").eq(0).html();
            titulo = $(this).parents("tr").find("td").eq(1).html();
            tipo = $(this).parents("tr").find("td").eq(2).html();
            universidad = $(this).parents("tr").find("td").eq(3).html();
            data = {id:id, titulo:titulo, tipo:tipo, universidad:universidad};
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                success: llegadaActFA,
                timeout: 4000,
                error: problemas
            });
            return false;
        });
        
        });
        
        
         $("form").submit(function(e) {
            e.preventDefault();
             $("#actualexLab").modal('hide');
        
            $(".actualELB").click(function() {
            id = $(this).parents("tr").find("td").eq(0).html();
            empresa = $(this).parents("tr").find("td").eq(1).html();
            tiempo = $(this).parents("tr").find("td").eq(2).html();
            data = {id:id, empresa:empresa, tiempo:tiempo};
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                success: llegadaActExLab,
                timeout: 4000,
                error: problemas
            });
            return false;
        });
        
        });
        
              $("form").submit(function(e) {
            e.preventDefault();
             $("#actualexAc").modal('hide');
            
           $(".actualEAB").click(function() {
            id = $(this).parents("tr").find("td").eq(0).html();
            institucion = $(this).parents("tr").find("td").eq(1).html();
            tiempo = $(this).parents("tr").find("td").eq(2).html();
            data = {id:id, institucion:institucion, tiempo:tiempo};
            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                success: llegadaActExAc,
                timeout: 4000,
                error: problemas
            });
            return false;
        });
        
         });
        
        
      
       
       
    
     
     
     

      
      
      
    
     
     
     
     function fn_Agregar(){
         
       $("#formTEL").submit(function(e) {
            e.preventDefault();

          var id = "<?php echo $id; ?>" ;
        data={
            identi:id,
            tipo:$('#tipo').val(),
            telef:$('#telef').val(),
            agregarTEL:"si",
            tipoProcedimiento:"insetarTEL"
        };

        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            beforeSend: inicioEnvio,
            success: Telagregar,
            timeout: 4000,
            error: problemas
        });
        return false;
    
     });
     
     
      $("#formFA").submit(function(e) {
            e.preventDefault();
          
            var id = "<?php echo $id; ?>" ;
    
        data={
            identi:id,
            tipoEFA:$('#tipoE').val(),
            tituloFA:$('#tituloFA').val(),
            universidadFA:$('#universidadFA').val(),
            agregarFA:"si",
            tipoProcedimiento:"insetarFA"
        };

        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            beforeSend: inicioEnvio,
            success: ExpLabAgregar,
            timeout: 4000,
            error: problemas
        });
        return false;
     });
     
     
     
         $("#formEL").submit(function(e) {
            e.preventDefault();
         
          var id = "<?php echo $id; ?>" ;
        data={
            identi:id,
            nombreEmpresa:$('#nombreEmpresa').val(),
            tiempoLab:$('#tiempoLab').val(),
            cargoEL:$('#cargo').val(),
            agregarEL:"si",
            tipoProcedimiento:"insetarEL"
        };

        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            beforeSend: inicioEnvio,
            success: llegadaExpLab,
            timeout: 4000,
            error: problemas
        });
        return false;
     });
     
     
       
        $("#formEA").submit(function(e) {
            e.preventDefault();
       
          var id = "<?php echo $id; ?>" ;
          var idc = $('#clases').val();
                  alert(idc);
        data={
            identi:id,
            nombreInst:$('#nombreInst').val(),
            tiempoAcad:$('#tiempoAcad').val(),
            clases:$('#clasesEA').val(),
            agregarEA:"si",
            tipoProcedimiento:"insetarEA"
        };

        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            beforeSend: inicioEnvio,
            success: llegadaExpAcad,
            timeout: 4000,
            error: problemas
        });
        return false;
     });
     
 
         
         
     }
     
      
      
      
      
        

      function fn_dar_eliminar() {

                $(".eliminaTelB").click(function() {
                var respuesta = confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
                if (respuesta) {
                     var id = "<?php echo $id; ?>" ;
                    id1=$(this).parents("tr").find("td").eq(0).html();
                    data = {
                        identi:id,                
                       IdTel: id1,
                    tipoProcedimiento:"Eliminar",  
                    
            };

                    $.ajax({
                        async: true,
                        type: "POST",
                        dataType: "html",
                        contentType: "application/x-www-form-urlencoded",
                        url: "Datos/eliminarUniversidad.php",
                        beforeSend: inicioEnvio,
                        success: Eliminar,
                        timeout: 4000,
                        error: problemas
                    });
                    return false;
                }
            });
            
            
                  $(".eliminaFAB").click(function() {
                var respuesta = confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
                if (respuesta) {
                     var id = "<?php echo $id; ?>" ;
                    id1=$(this).parents("tr").find("td").eq(0).html();
                    data = {
                        identi:id,                
                       IdForAc: id1,
                    tipoProcedimiento:"Eliminar",  
                    
            };

                    $.ajax({
                        async: true,
                        type: "POST",
                        dataType: "html",
                        contentType: "application/x-www-form-urlencoded",
                        url: "Datos/eliminarUniversidad.php",
                        beforeSend: inicioEnvio,
                        success: Eliminar,
                        timeout: 4000,
                        error: problemas
                    });
                    return false;
                }
            });
            
            
              $(".eliminaELB").click(function() {
                var respuesta = confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
                if (respuesta) {
                     var id = "<?php echo $id; ?>" ;
                    id1=$(this).parents("tr").find("td").eq(0).html();
                    data = {
                        identi:id,                
                       IdExLA: id1,
                    tipoProcedimiento:"Eliminar",  
                    
            };

                    $.ajax({
                        async: true,
                        type: "POST",
                        dataType: "html",
                        contentType: "application/x-www-form-urlencoded",
                        url: "Datos/eliminarUniversidad.php",
                        beforeSend: inicioEnvio,
                        success: Eliminar,
                        timeout: 4000,
                        error: problemas
                    });
                    return false;
                }
            });
            
            $(".eliminaEAB").click(function() {
                var respuesta = confirm("¿Esta seguro de que desea eliminar el registro seleccionado?");
                if (respuesta) {
                     var id = "<?php echo $id; ?>" ;
                    id1=$(this).parents("tr").find("td").eq(0).html();
                    data = {
                        identi:id,                
                       IdExAc: id1,
                    tipoProcedimiento:"Eliminar",  
                    
            };

                    $.ajax({
                        async: true,
                        type: "POST",
                        dataType: "html",
                        contentType: "application/x-www-form-urlencoded",
                        url: "Datos/eliminarUniversidad.php",
                        beforeSend: inicioEnvio,
                        success: Eliminar,
                        timeout: 4000,
                        error: problemas
                    });
                    return false;
                }
            });
            
            
            
            };






       
       
    });
    
      function inicioEnvio()
    {
        var x = $("#contenedor");
        x.html('Cargando...');
    }

     function Telagregar()
    {
        $('body').removeClass('modal-open');
        $("#contenedor").load('pages/recursos_humanos/cv/EditarCV.php',data);
    }
    
      function ExpLabAgregar()
    {
        $('body').removeClass('modal-open');
        $("#contenedor").load('pages/recursos_humanos/cv/EditarCV.php',data);
    }
    
      function llegadaExpLab()
    {
         $('body').removeClass('modal-open');
        $("#contenedor").load('pages/recursos_humanos/cv/EditarCV.php',data);
    }
    
       function llegadaExpAcad()
    {
         $('body').removeClass('modal-open');
        $("#contenedor").load('pages/recursos_humanos/cv/EditarCV.php',data);
    }




    function llegadaActTelefono()
    {
        $("#cuerpoAct").load('pages/recursos_humanos/cv/actualizar/cuerpoAct.php', data);
        $('#actualTel').modal('show');
        $('#actualTel').on('hidden.bs.modal', function () {
            $("#container").load('pages/recursos_humanos/cv/actualizar/telefono.php');
        })
    }
    
      function llegadaActFA()
    {
        $("#cuerpoActFA").load('pages/recursos_humanos/cv/actualizar/cuerpoActform.php', data);
        $('#actualFA').modal('show');
        $('#actualFA').on('hidden.bs.modal', function () {
            $("#container").load('pages/recursos_humanos/cv/actualizar/formAcademica.php');
        })
    }
    
        function llegadaActExLab()
    {
        $("#cuerpoActEL").load('pages/recursos_humanos/cv/actualizar/cuerpoActexLab.php', data);
        $('#actualexLab').modal('show');
        $('#actualexLab').on('hidden.bs.modal', function () {
            $("#container").load('pages/recursos_humanos/cv/actualizar/expLaboral.php');
        })
    }
    
       function llegadaActExAc()
    {
        $("#cuerpoActEA").load('pages/recursos_humanos/cv/actualizar/cuerpoActexAc.php', data);
        $('#actualexAc').modal('show');
        $('#actualexAc').on('hidden.bs.modal', function () {
            $("#container").load('pages/recursos_humanos/cv/actualizar/expAcademica.php');
        })
    }
    
    
         function Eliminar()
    {
     
        $("#contenedor").load('pages/recursos_humanos/cv/EditarCV.php',data);
    }
    
    


    function problemas()
    {
        $("#contenedor").text('Problemas en el servidor.');
    }
</script>
<script src="pages/recursos_humanos/cv/validacion.js"></script>
<script>
    $(function(){
        $('#tiempoAcad').validCampo('0123456789');
        $('#nombreInst').validCampo(' abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ');
        $('#tiempoLab').validCampo('0123456789');
        $('#nombreEmpresa').validCampo(' abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ');
        $('#telef').validCampo('0123456789-+ ');
    });  
</script>


</head>


<body>
    
    

    
    
    <form role="form" method="post" class="form-horizontal">
        
         <?php
 
   if(isset($codMensaje) and isset($mensaje)){
    if($codMensaje == 1){
      echo '<div class="alert alert-success">';
      echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
      echo '<strong>Exito! </strong>';
      echo $mensaje;
      echo '</div>';
    }else{
      echo '<div class="alert alert-danger">';
      echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
      echo '<strong>Error! </strong>';
      echo $mensaje;
      echo '</div>';
    }
  } 

?>

            <h1>Curriculum vitae</h1> <button id="exportar" type="submit" class="btn btn-warning" style="float: right;"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Exportar como PDF</button></br></br></br>
             <div class="row">
            <div class="panel-group" id="accordion">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <label><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Datos Generales</label>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Número de Identidad: </label>
                                <div class="col-sm-7 control-label" id="identidadP" value="<?php echo"$id"; ?>" > <?php echo"$id"; ?> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Nombre Completo: </label>
                                <div class="col-sm-7 control-label"><?php echo"$pNombre".' '; 
       
        if ($sNombre != '') {
            echo "$sNombre ". ' ';
        }
        echo "$pApellido".' '; echo"$sApellido"; ?> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Sexo: </label>
                                <?php
                                if ($sexo == 'F') {
                                    echo '<div class="col-sm-7 control-label">Femenino</div>';
                                }
                                if ($sexo == 'M') {
                                    echo '<div class="col-sm-7 control-label">Masculino</div>';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Nacionalidad: </label>
                                <div class="col-sm-7 control-label"> <?php echo utf8_encode($nacionalidad); ?></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label"><strong>Fecha de Nacimiento</strong></label>
                                <div class="col-sm-7 control-label"><?php echo "$fNac"?></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Estado civil: </label>
                                <div class="col-sm-7 control-label">

                                    <?php
                                    if ($estCivil == "Soltero")
                                        echo 'Soltero';
                                    if ($estCivil == "Casado")
                                        echo 'Casado';
                                    if ($estCivil == "Divorciado")
                                        echo 'Divorciado';
                                    if ($estCivil == "Viudo")
                                        echo 'Viudo';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>


       <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <label><span class="glyphicon glyphicon-book" aria-hidden="true" ></span> Información de contacto</label>
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Dirección</label>
                            <div class="col-sm-7 control-label"><?php echo "$direc"; ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Correo electrónico</label>
                            <div class="col-sm-7 control-label"><?php echo "$email"; ?></div>
                        </div>
                        
                        
                                
           
                    
             <div class="col-lg-12"> <button id="AgregarTel" type="submit" class="AgregarTB btn btn-warning" data-toggle="modal" data-target="#agregarTelVM" style="float: right;"><span class="glyphicon glyphicon-phone"  aria-hidden="true"></span> Agregar</button>
                <div class="form-group">
                    <h4>
                        <label><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Numeros de telefono</label>
                    </h4>
                  
<div class="box" >
    <div class="box-header">
    </div><!-- /.box-header -->
    <div class="table-responsive">
        

        
                               <table id="tabla_telefonos" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>                                            
                                            <th>ID</th>
                                            <th>Tipo</th>
                                            <th>Número</th>
                                            <th>Eliminar</th>
                                            <th>Editar</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                <?php
echo <<<HTML
HTML;

        while ($row = mysql_fetch_array($queryTEL)){
            $id = $row['ID_Telefono'];
            $tipo = $row['Tipo'];
            $numero = $row['Numero'];
         
            echo "<tr data-id='".$id."'>";
            echo <<<HTML
                <td>$id</td>
HTML;
            echo <<<HTML
                <td>$tipo</td>
HTML;
            echo <<<HTML
            <td>$numero</td>
HTML;
            echo <<<HTML
            <td>
            <center>
            <button id="eliminaTel" name="telefonoEliminar"  class="eliminaTelB btn btn-danger glyphicon glyphicon-trash"> </button>
                </center></td>
            
            
                <td>
                <center>
                    <button type="submit" class="actualTB btn btn-primary glyphicon glyphicon-edit" data-toggle="modal" data-target="#actualTel" title="Editar">
                      </button>
                </center>
                </td>
HTML;
            echo "</tr>";

        }
        ?>
                                            </tbody>
    </table>
        
    </div><!-- /.box-body -->
</div><!-- /.box -->



                    
                </div>
             </div>
           
        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
       </div>
            

            
       
            
   <div class="row"> 
            <div class="panel panel-primary"> 
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <label><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Formacion academica</label>
                        <button id="AgregarFA" type="submit" class="btn btn-primary right-side"  data-toggle="modal" data-target="#agregarFAVM"  title="Nueva formacion academica"  ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12">
                        
<div class="box">
    <div class="box-header">
        
    </div><!-- /.box-header -->
    <div class="table-responsive">
         
                                    <table id="tabla_formaciones" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>                                            
                                            <th>ID</th>
                                            <th>Nombre del Título</th>
                                            <th>Tipo de estudio</th>
                                            <th>Universidad</th>
                                             <th>Eliminar</th>
                                            <th>Editar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                             <?php

        echo <<<HTML
HTML;

        while ($row = mysql_fetch_array($queryFA)){
            $id = $row['ID_Estudios_academico'];
            $titulo = $row['Nombre_titulo'];
            $s = mysql_query("SELECT Tipo_estudio FROM tipo_estudio WHERE ID_Tipo_estudio = '".$row['ID_Tipo_estudio']."'");
            $row1 = mysql_fetch_array($s);
            $tipoEs = $row1['Tipo_estudio'];
            $t = mysql_query("SELECT nombre_universidad FROM universidad WHERE Id_universidad = '".$row['Id_universidad']."'");
            $row2 = mysql_fetch_array($t);
            $univ = $row2['nombre_universidad'];

            echo "<tr data-id='".$id."'>";
            echo <<<HTML
                <td>$id</td>
HTML;
            echo <<<HTML
                <td>$titulo</td>
HTML;
            echo <<<HTML
            <td>$tipoEs</td>
HTML;
            echo <<<HTML
            <td>$univ</td>
HTML;
            echo <<<HTML
                    <td>
            <center>
            <button name="FAEliminar"  class="eliminaFAB btn btn-danger glyphicon glyphicon-trash"> </button>
                </center></td>
            
                <td>
                <center>
                    <button type="submit" class="actualFAB btn btn-primary glyphicon glyphicon-edit" data-toggle="modal" data-target="actualFA" title="Editar">
                      </button>
                </center>
                </td>
HTML;
            echo "</tr>";

        }
        ?>
                                             </tbody>
    </table>

        

        
    </div><!-- /.box-body -->
</div><!-- /.box -->



                    </div>
                </div>
            </div>
         </div>
            


         <div class="row"> 
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <label><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Experiencia laboral</label>
                        <button id="AgregarEL" type="submit" class="btn btn-primary right-side" data-toggle="modal" data-target="#agregarELVM" title="Nueva experiencia laboral"  ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12">
<div class="box">
    <div class="box-header">
    </div><!-- /.box-header -->
    <div class="table-responsive">
        
      
                                    <table id="tabla_ExperienciaLaboral" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>                                            
                                            <th>ID</th>
                                            <th>Nombre de la Empresa</th>
                                            <th>Tiempo (meses)</th>
                                            <th>Cargo</th>
                                            <th>Eliminar</th>
                                            <th>Editar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                <?php

        echo <<<HTML
HTML;

        while ($row = mysql_fetch_array($queryEL)){
            $id = $row['ID_Experiencia_laboral'];
            $nomEmp = $row['Nombre_empresa'];
            $tiempo = $row['Tiempo'];
            $cargo =  $row['cargo'];

            echo "<tr data-id='".$id."'>";
            echo <<<HTML
                <td>$id</td>
HTML;
            echo <<<HTML
                <td>$nomEmp</td>
HTML;
            echo <<<HTML
            <td>$tiempo</td>
            <td>$cargo</td>      
HTML;
            echo <<<HTML
            
                   <td>
            <center>
            <button name="ELEliminar"  class="eliminaELB btn btn-danger glyphicon glyphicon-trash"> </button>
                </center></td>
            
                 <td>
            
      
                <center>
                    <button type="submit" class="actualELB btn btn-primary glyphicon glyphicon-edit" data-toggle="modal" data-target="actualexLab" title="Editar">
                      </button>
                </center>
                </td>
HTML;
            echo "</tr>";

        }
        ?>
             </tbody>
    </table>
        

        
        
    </div><!-- /.box-body -->
</div><!-- /.box -->



                    </div>
                </div>
            </div>
         </div>            

 
            
            
            
         <div class="row"> 
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <label><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Experiencia Academica</label>
                        <button id="AgregarEA" type="submit" class="btn btn-primary right-side" data-toggle="modal" data-target="#agregarEAVM"  title="Nueva Experiencia Academica"  ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12">
<div class="box">
    <div class="box-header">
    </div><!-- /.box-header -->
    <div class="table-responsive">
        
      
        
       
                                    <table id="tabla_ExperienciaAcademica" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>                                            
                                            <th>ID</th>
                                            <th>Institución</th>
                                            <th>Tiempo (meses)</th>
                                            <th>clase</th>
                                             <th>Eliminar</th>
                                            <th>Editar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                              <?php

        echo <<<HTML
HTML;

        while ($row = mysql_fetch_array($queryEA)){
            $id = $row['ID_Experiencia_academica'];
            $inst = $row['Institucion'];
            $tiempo = $row['Tiempo'];
            $clase=$row['Clase'];

            echo "<tr data-id='".$id."'>";
            echo <<<HTML
                <td>$id</td>
HTML;
            echo <<<HTML
                <td>$inst</td>
HTML;
            echo <<<HTML
            <td>$tiempo</td>
             <td>$clase</td>
                    
HTML;
            echo <<<HTML
                   <td>
            <center>
            <button name="EAliminar"  class="eliminaEAB btn btn-danger glyphicon glyphicon-trash"> </button>
                </center></td>
            
            
                <td>
                <center>
                    <button type="submit" class="actualEAB btn btn-primary glyphicon glyphicon-edit" data-toggle="modal" data-target="actualexAc"  title="Editar">
                      </button>
                </center>
                </td>
HTML;
            echo "</tr>";

        }
        ?>
              </tbody>
    </table>  
        
        
  
        

        
        
    </div><!-- /.box-body -->
</div><!-- /.box -->



                    </div>
                </div>
            </div>
         </div>               
            
                   


                
            
            
            


      
</form>
    
    
 
    
    
    <div class="modal fade" id="actualTel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Teléfono</h4>
            </div>
            <div class="modal-body" id="cuerpoAct"></div>
        </div>
    </div>
</div>   
  
<div class="modal fade" id="actualFA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Formación Académica</h4>
            </div>
            <div class="modal-body" id="cuerpoActFA"></div>
        </div>
    </div>
</div> 
    
    <div class="modal fade" id="actualexLab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Experiencia Laboral</h4>
            </div>
            <div class="modal-body" id="cuerpoActEL"></div>
        </div>
    </div>
</div>
    
    
    <div class="modal fade" id="actualexAc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Experiencia Académica</h4>
            </div>
            <div class="modal-body" id="cuerpoActEA"></div>
        </div>
    </div>
</div>
    
    
    
    
    
    
  <div class="modal fade" id="agregarTelVM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Telefonos</h4>
            </div>
            <div class="modal-body" id="AgregatTELM">
                <div class="row">
    <div class="col-lg-12">
            <!-- .panel-heading -->
            <div class="panel-body">
                <form role="form" id="formTEL" method="post">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <label>Teléfono de Persona</label>
                                </h4>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            
                                          
                                            <div class="form-group">
                                                </br><label><h3>Nuevo teléfono</h3></label></br>
                                                <select id="tipo" class="form-control">
                                                    <option value="celular">Celular</option>
                                                    <option value="fijo">Fijo</option>
                                                    <option value="oficina">Oficina</option>
                                                    <option value="otro">Otro</option>
                                                </select>
                                                </br><label>Número de Teléfono</label>
                                                <input class="form-control" name="telef" id="telef" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="TelB btn btn-primary" id="telefono">Guardar Información</button>
                </form>
            </div>
           
                
            </div>
        </div>
    </div>
      </div>
    </div>
  </div>
    
    
 <div class="modal fade" id="agregarFAVM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Nueva formacion academica</h4>
            </div>
            <div class="modal-body" id="AgregatFAM">
                
             
                <div class="row">
    <div class="col-lg-12">
            <!-- .panel-heading -->
            <div class="panel-body">
                <form role="form" id="formFA" method="post">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <label></label>
                                </h4>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            
                         
                                            <div class="form-group">
                                                
                                                </br><label>Típo</label>
                                                <select id="tipoE" name="tipoE" class="form-control">
                                                    <?php
                                                    $pa=mysql_query("SELECT * FROM tipo_estudio");
                                                    while($row=mysql_fetch_array($pa)){
                                                        echo '<option value="'.$row['ID_Tipo_estudio'].'">'.$row['Tipo_estudio'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Título</label>
                                                <select id="tituloFA" name="titulo" class="form-control">
                                                    <?php
                                                    $pa=mysql_query("SELECT * FROM titulo");
                                                    while($row=mysql_fetch_array($pa)){
                                                        echo '<option value="'.$row['titulo'].'">'.$row['titulo'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Universidad</label>
                                                <select id="universidadFA" name="universidad" class="form-control">
                                                    <?php
                                                    $pa=mysql_query("SELECT * FROM universidad");
                                                    while($row=mysql_fetch_array($pa)){
                                                        echo '<option value="'.$row['Id_universidad'].'">'.$row['nombre_universidad'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            
                                            
                                            
                                          
                                       
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="agregarFAB btn btn-primary" id="telefono">Guardar Información</button>
                </form>
            </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
                
                
                
                    
           </div>
                   
  
                
    </div>
      </div>
  </div>
    
    

 <div class="modal fade" id="agregarELVM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Nueva experiencia laboral</h4>
            </div>
            <div class="modal-body" id="AagregarEL">
                
             
                <div class="row">
    <div class="col-lg-12">
            <!-- .panel-heading -->
            <div class="panel-body">
                <form role="form" id="formEL" method="post">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <label></label>
                                </h4>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            
                         
                                         
                                            <div class="form-group">
                                               
                                                </br><label>Nombre de la empresa</label>
                                                <input id="nombreEmpresa" class="form-control" name="nombreEmpresa" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tiempo (número de meses)</label>
                                                <input id="tiempoLab" class="form-control" name="tiempoLab" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Cargo</label>
                                                <select id="cargo" name="cargo" class="form-control">
                                                    <?php
                                                    $pa=mysql_query("SELECT * FROM cargo");
                                                    while($row=mysql_fetch_array($pa)){
                                                        echo '<option value="'.$row['ID_cargo'].'">'.$row['Cargo'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            
                                            
                                            
                                          
                                       
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="agregarELB btn btn-primary" id="telefono">Guardar Información</button>
                </form>
            </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
                
                
                
                    
           </div>
                   
  
                
    </div>
      </div>
    </div>  
    
    
    
    
    
     <div class="modal fade" id="agregarEAVM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Nueva experiencia academica</h4>
            </div>
            <div class="modal-body" id="AagregarEA">
                
             
                <div class="row">
    <div class="col-lg-12">
            <!-- .panel-heading -->
            <div class="panel-body">
                <form role="form" id="formEA" method="post">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <label></label>
                                </h4>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            
                         
                                         
             
                                                        <div class="form-group">
                                                           
                                                            </br><label>Nombre de la empresa</label>
                                                            <input class="form-control" name="nombreInst" id="nombreInst" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tiempo (número de meses)</label>
                                                            <input class="form-control" name="tiempoAcad" id="tiempoAcad" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Clases</label>
                                                            <select id="clasesEA"  name="clases" class="form-control" >
                                                                <?php
                                                                $p=mysql_query("SELECT * FROM clases");
                                                                while($row=mysql_fetch_array($p)){
                                                                   
                                                                     echo '<option value="'.$row['ID_Clases'].'">'.$row['Clase'].'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                            
                                            
                                            
                                          
                                       
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="agregarEAB btn btn-primary" id="telefono">Guardar Información</button>
                </form>
            </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
                
                
                
                    
           </div>
                   
  
                
    </div>
      </div>
    </div>
    
  
   
    
    
    
    
    
    
    
    
    
    
    






</body>
</html>