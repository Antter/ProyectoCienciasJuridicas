<?php

  $maindir = "../../";

  if(isset($_GET['contenido']))
  {
    $contenido = $_GET['contenido'];
  }
  else
  {
    $contenido = 'gestion_de_folios';
	$navbar_loc = 'contenido';
  }
  
  require_once($maindir."funciones/check_session.php");
  
  require_once($maindir."funciones/timeout.php");
  
  require_once($maindir.'pages/navbar.php');

  require_once($maindir."conexion/config.inc.php");
  
  require_once('datos/obtener_datos_notificacionFolio.php');
  require_once('datos/obtener_datos_usuario.php');

  if(isset($_POST['tipoProcedimiento'])){
    $tipoProcedimiento =  $_POST['tipoProcedimiento'];
     if($tipoProcedimiento == 'insertar'){
      require_once("Enviar_notificacion.php");}
    if ($tipoProcedimiento == 'eliminar'){
      require_once("datos/Eliminar_notificaciones.php");
      require_once("datos/Eliminar_notificaciones2.php");} 
     
    if ($tipoProcedimiento == 'actualizar_enviada'){
      require_once("Basurero_Enviadas.php");
    }
    if ($tipoProcedimiento == 'actualizar_recibida'){
        require_once("Basurero_Reicibidas.php");
    }
  }

if(isset($_POST['tipoNotificacion'])){
    $tipoNotificacion = $_POST['tipoNotificacion'];
    if($tipoNotificacion == 'NotificacionRecibida'){
    require_once('datos/datos_notificacion_recibida.php');
  }elseif($tipoNotificacion == 'NotificacionEnviada'){
    require_once('datos/datos_notificacion_enviada.php');
  }
  elseif($tipoNotificacion == 'Basurero'){
    require_once('datos/datos_basurero.php');
  }

  else{
    require_once('datos/datos_notificaciones.php');
  }
  }
  else{
  require_once('datos/datos_notificaciones.php');
  }

 $db = null;
 $usuario=$_SESSION['nombreUsuario'];    
  $user=$_SESSION['user_id'];
?>

<!-- Main -->
<div class="container-fluid">
<div class="row">
    <?php 
        require_once("../gestion_folios/navbar.php");
    ?>
    <div class="col-sm-10">
        <section class="content">

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

                    <!-- MAILBOX BEGIN -->
                    <div class="mailbox row">
                        <div class="col-xs-12">
                            <div class="box box-solid">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3">
                                            <!-- BOXES are complex enough to move the .box-header around.
                                                 This is an example of having the box header within the box body -->
                                            <div class="box-header">
                                                <i class="fa fa-inbox"></i>
                                                <h3 class="box-title"> Notificaciones </h3>
                                            </div>
                                            <!-- compose message btn -->
                                            <!-- <a class="btn btn-block btn-primary" id="nuevo_folio" href="javascript:ajax_('pages/gestion_folios/nuevo_folio.php');"><i class="fa fa-pencil"></i> Nuevo Folio</a> -->
                                            <!-- Navigation - folders-->
                                            <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> Nueva Notificacion</a>
                                            <div style="margin-top: 15px;">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li class="header">Bandeja Notificaciones</li>
                                         
                                                   <?php


                            if(isset($_POST['tipoNotificacion'])){
                              $tipoNotificacion = $_POST['tipoNotificacion'];

                                   if($tipoNotificacion == 'NotificacionRecibida'){
                                echo '<li class="active"><a id="recibidas" href="#"><i class="glyphicon glyphicon-download-alt"></i>  Recibidas </a></li>';
                            }else{
                                echo '<li><a id="recibidas" href="#"><i class="glyphicon glyphicon-download-alt"></i> Recibidas </a></li>';
                            }

                              if($tipoNotificacion == 'NotificacionEnviada'){
                                echo '<li class="active"><a id="enviadas" href="#"><i class="fa fa-inbox"></i> Enviadas</a></li>';    
                            }else{
                                echo '<li><a id="enviadas" href="#"><i class="fa fa-inbox"></i> Enviadas </a></li>';
                            }
                        
                            
                            if($tipoNotificacion == 'Basurero'){
                                echo '<li class="active"><a id="basurero" href="#"><i class="glyphicon glyphicon-send"></i> Basurero</a></li>';
                            }else{
                                echo '<li><a id="basurero" href="#"><i class="glyphicon glyphicon-send"></i> Basurero</a></li>';
                            }
                          }else{
                            echo '<li class="active"><a id="recibidas" href="#"><i class="fa fa-inbox"></i> Recibidas</a></li>';    
                            echo '<li><a id="enviadas" href="#"><i class="glyphicon glyphicon-download-alt"></i>Enviadas </a></li>';
                            echo '<li><a id="basurero" href="#"><i class="glyphicon glyphicon-send"></i> Basurero</a></li>';
                          }
                        ?>                     										                                          
                                                </ul>
                                            </div>
                                        </div><!-- /.col (LEFT) -->
                                        <div class="col-md-9 col-sm-8">
                            <div class="box">
                            <div class="box-header">
							   <?php
                             if(isset($_POST['tipoNotificacion'])){
                                        $tipoNotificacion = $_POST['tipoNotificacion'];
                                       if($tipoNotificacion == 'NotificacionEnviada'){
                                            echo '<h3 class="box-title">Enviadas</h3>';    
                                        }elseif($tipoNotificacion == 'NotificacionRecibida'){
                                          echo '<h3 class="box-title">Recibidas</h3>';
                                        }elseif($tipoNotificacion == 'Basurero'){
                                          echo '<h3 class="box-title">Basurero</h3>';
                                          }
                                          else{

                                            echo '<h3 class="box-title">Recibidas</h3>';

                                          }
                                          
                                         }else{

                                            echo '<h3 class="box-title">Recibidas</h3>';

                                          }
                                         
                  ?>  
                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
<?php 
        if($notificacion == 1){
echo <<<HTML
                                    <table id="tabla_notificacinoes" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                 <th>Numero de Folio</th>
                                                <th>Titulo</th>
                                                <th>Fecha</th>

                                               
HTML;


                                       
                            
 if(isset($_POST['tipoNotificacion'])){
                                        $tipoNotificacion = $_POST['tipoNotificacion'];
                                       if($tipoNotificacion == 'NotificacionEnviada'){
                                               echo <<<HTML
                                           <th>Para </th>

HTML;
                                        }elseif($tipoNotificacion == 'NotificacionRecibida'){
                                       echo <<<HTML
                                           <th>Enviada por</th>

HTML;
                                        }elseif($tipoNotificacion == 'Basurero'){
                                         echo <<<HTML
                                           <th>Usuario</th>

HTML;
                                          }
                                         } else{

echo <<<HTML
                                           <th>Enviada por</th>

HTML;


                                         }                     
                                         
                                       
                   
 

 echo <<<HTML


                                        <th>Folio</th>
                                         <th>Notificacion</th>
                                          <th></th>
                                        </thead>
                                        <tbody>

HTML;
                                       


foreach( $rows as $row ){ 
     
           
            $NroFolio = $row['NroFolio'];
            $Titulo = $row['Titulo'];
            $nombre=$row['nombre'];
            $FechaCreacion = $row['FechaCreacion'];
            $IdNotificacion=$row['Id_Notificacion'];
            $EliminarUsuario=$row['idUsuario'];

                echo "<tr>";

                echo <<<HTML
                <td><a href="#">$NroFolio</a></td>

HTML;
                //echo <<<HTML <td><a href='javascript:ajax_("'$url'");'>$NroFolio</a></td>HTML;
                echo <<<HTML
                <td><a href="#">$Titulo</a></td>

HTML;
                echo <<<HTML
                   <td><a href="#">$FechaCreacion</a></td>

HTML;
                echo <<<HTML
                <td><a href="#">$nombre</a></td>

HTML;
                
                
echo '<td><a class="btn btn-block btn-primary" data-mode="folio"  data-id="'.$NroFolio.'"  ></i>Ver Folio</a></td>';
echo '<td><a class="btn btn-block btn-primary" data-mode="notificacion"  data-id="'.$IdNotificacion.'" data-usuario="'.$nombre.'" ></i>Ver Notificacion</a></td>';

if (isset($_POST['tipoNotificacion'])) {
  if ($tipoNotificacion == 'Basurero') {
 

                  echo '<td><a class="btn btn-block btn-primary" data-mode="eliminar" data-id="'.$IdNotificacion.'" data-usuario="'.$EliminarUsuario.'" ></i>Eliminar</a></td>';
  }
  else if($tipoNotificacion == 'NotificacionEnviada'){
echo '<td><a class="btn btn-block btn-primary" data-mode="basurero_enviada"  data-id="'.$IdNotificacion.'" ></i>Basurero</a></td>';}

else if($tipoNotificacion == 'NotificacionRecibida'){

echo '<td><a class="btn btn-block btn-primary" data-mode="basurero_recibida"  data-id="'.$IdNotificacion.'" data-usuario="'.$user.'"></i>Basurero</a></td>';}
 
}else { 
 echo '<td><a class="btn btn-block btn-primary" data-mode="basurero_recibida" data-id="'.$IdNotificacion.'"   data-usuario="'.$user.'"></i>Basurero</a></td>';}


                echo "</tr>";

            

            }
                
echo <<<HTML
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               <th>Numero de Folio</th>
                                                <th>Titulo</th>
                                                <th>Fecha</th>
                                                

HTML;


                            
 if(isset($_POST['tipoNotificacion'])){
                                        $tipoNotificacion = $_POST['tipoNotificacion'];
                                       if($tipoNotificacion == 'NotificacionEnviada'){
                                               echo <<<HTML
                                           <th>Para </th>

HTML;
                                        }elseif($tipoNotificacion == 'NotificacionRecibida'){
                                       echo <<<HTML
                                           <th>Enviada por</th>

HTML;
                                        }elseif($tipoNotificacion == 'Basurero'){
                                         echo <<<HTML
                                           <th>Usuario</th>

HTML;
                                          }
                                         } else{

echo <<<HTML
                                           <th>Enviada por</th>

HTML;


                                         }                     
                                         
                                       
                   
 

 echo <<<HTML
                                        <th>Folio</th>
                                        <th>Notificacion</th>
                                        <th></th>
                                        </thead>
                                        <tbody>

HTML;



        }
        else
        {
            echo "<tr>";
            echo "<td>No hay notificaciones en el buzón </td>";
            echo "</tr>";
        }

?>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                                        </div><!-- /.col (RIGHT) -->
                                    </div><!-- /.row -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col (MAIN) -->
                      </div>
                  </div><!-- MAILBOX END -->

</section><!-- /.content -->
</div>
</div><!--/col-span-10-->

</div><!-- /Main -->


<!-- Formulario modal para componer una nueva notificacion -->
<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-floppy-disk"></i> Enviar Notificacion</h4>
      </div>
	  <!-- form start -->
      <form role="form" id="form" name="form" action="#">
          <div class="modal-body">  
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Componer nueva notificacion</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
				  <div class="form-group">
					<input type ="hidden" name="Usuario" id="Insertar_Emisor" class="form-control"  readonly="readonly"  value="<?php echo $user;?>"/>
					<input type="hidden" name="FechaCreacion" id="FechaCreacion" class="form-control"  readonly="readonly" value="<?php echo date('Y-m-d');?>" />
					<?php echo $usuario;?>
					<div class="pull-right">
                      Fecha: <?php echo date('Y-m-d');?>
                    </div>					  
                  </div>   
				  <div class="form-group">
				    <div class="input-group">
                      <span class="input-group-addon">Numero Folio :</span>
                      <select id="NroFolio" class="form-control"name="NroFolio" >
                                            <option value=-1> -- Seleccione -- </option>
                                            <?php foreach( $filas as $row ) { ?>
                                            <option value="<?php echo $row["NroFolio"];?>"><?php echo $row["NroFolio"];?></option><?php } 
                                             ?></select>
	                </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                       <span class="input-group-addon">Para :</span>
                          <select multiple id="Destinatarios" class="form-control" name="Destinatarios[]" >                  
                            <?php foreach( $filas2 as $row ) {if($row["nombre"]!=$usuario and $row['Id_Rol']>=40){ ?>
                            <option value="<?php echo $row["id_Usuario"];?>"><?php echo $row["nombre"];?></option><?php }} ?>
							</select>      
                    </div>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="Titulo" id="Insertar_Titulo" placeholder="Titulo:"/ required>
                  </div>
                  <div class="form-group">
                    <textarea name="Mensaje" id="Insertar_Mensaje" class="form-control" style="height: 150px" placeholder="Mensaje..." required></textarea>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
					<button type="submit" name="submit" id="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
                  </div>
                  <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Descartar</button>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
      </div><!-- /.modal-content -->
	</form><!-- /.form -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Script para inicializar el funcionamiento de la tabla -->
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {

    $('#tabla_notificacinoes').dataTable({
	  "order": [[ 2, "desc" ]],
	  "fnDrawCallback": function( oSettings ) {
	  
	    $(".btn-primary").unbind("click");
	  
	    $(".btn-primary").on('click',function(){
        mode = $(this).data('mode');
        id = $(this).data('id');
        if(mode == "folio"){
          data={
            idFolio:id
          };
          $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/datos_folio.php", 
                success:Ver,
                timeout:4000,
                error:problemas
          }); 
          return false;
        }else if(mode == "notificacion"){
          data={
            Usuario:$(this).data('usuario'),
            idNotificacion:id

          };
         
          $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/datos_notificacion.php", 
                success:InfoNotifificacion,
                timeout:4000,
                error:problemas
          }); 
          
          return false;
        }

        else if(mode == "eliminar"){
          data={
            
                
                IdNotificacion:id,
                IdUsuario:$(this).data('usuario'),
                tipoProcedimiento:"eliminar",
                tipoNotificacion:"Basurero"
          };
         if (confirm('Esta seguro que desea eliminar esta notificacion?')) {
          $.ajax({
              async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/Notificacion.php", 
                success:notificacion,
                timeout:4000,
                error:problemas
          }); }
          
          return false;
        }
        else if(mode =="basurero_enviada"){
          data={
            idNotificacion:id,
            tipoProcedimiento:"actualizar_enviada",
            tipoNotificacion:"NotificacionEnviada"
          };
          if (confirm('Esta seguro que desea enviar al basurero esta notificacion?')) {
        
          $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/Notificacion.php", 
                success:notificacion,
                timeout:4000,
                error:problemas
          }); 
          }
          return false;
        }

        else if(mode =="basurero_recibida"){
          data={
            idNotificacion:id,
            IdUsuario:$(this).data('usuario'),
            tipoProcedimiento:"actualizar_recibida",
            tipoNotificacion:"NotificacionRecibida"
          };
          if (confirm('Esta seguro que desea enviar al basurero esta notificacion?')) {
        
          $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/Notificacion.php", 
                success:notificacion,
                timeout:4000,
                error:problemas
          }); 
          }
          return false;
        }
       });
	  }
	}); // example es el id de la tabla
	
	
	$('#tabla_notificaciones')
    .removeClass( 'display' )
    .addClass('table table-striped table-bordered');

});

function Ver(){

    $("#div_contenido").load('pages/gestion_folios/datos_folio.php',data);
}

function InfoNotifificacion(){

    $("#div_contenido").load('pages/gestion_folios/datos_notificacion.php',data);
}

function notificacion(){

    $("#div_contenido").load('pages/gestion_folios/Notificacion.php',data);
}
</script>

<script type="text/javascript" src="js/gestion_folios/Notificaciones.js" ></script>

<script type="text/javascript" src="js/gestion_folios/navbar_lateral.js" ></script>