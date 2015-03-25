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

  if(isset($_POST['idNotificacion'])){
  $VerNotificacion= $_POST['idNotificacion'];}
  if (isset($_POST['Usuario'])) {
    $Usuario=$_POST['Usuario'];
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
  require_once('datos/obtener_datos_notificacion.php');
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
                              if($tipoNotificacion == 'NotificacionEnviada'){
                                echo '<li class="active"><a id="enviadas" href="#"><i class="fa fa-inbox"></i> Enviadas</a></li>';    
                            }else{
                                echo '<li><a id="enviadas" href="#"><i class="fa fa-inbox"></i> Enviadas </a></li>';
                            }
                        
                            if($tipoNotificacion == 'NotificacionRecibida'){
                                echo '<li class="active"><a id="recibidas" href="#"><i class="glyphicon glyphicon-download-alt"></i>  Recibidas </a></li>';
                            }else{
                                echo '<li><a id="recibidas" href="#"><i class="glyphicon glyphicon-download-alt"></i> Recibidas </a></li>';
                            }
                            
                            if($tipoNotificacion == 'Basurero'){
                                echo '<li class="active"><a id="basurero" href="#"><i class="glyphicon glyphicon-send"></i> Basurero</a></li>';
                            }else{
                                echo '<li><a id="basurero" href="#"><i class="glyphicon glyphicon-send"></i> Basurero</a></li>';
                            }
                          }else{
                            echo '<li class="active"><a id="recibidas" href="#"><i class="fa fa-inbox"></i> Recibidas </a></li>';    
                            echo '<li><a id="enviadas" href="#"><i class="glyphicon glyphicon-download-alt"></i>Enviadas </a></li>';
                            echo '<li><a id="basurero" href="#"><i class="glyphicon glyphicon-send"></i> Basurero</a></li>';
                          }
                        ?>         


                                                </ul>

                                            </div>
                                        </div><!-- /.col (LEFT) -->

<div    class="col-md-9 col-sm-8">
<div class="box">
   <div class="box-body ">
   <aside  class=" box-body right-side">
      
      <div  id ="cajaNotif"class=" box-body content-wrapper">
        <!-- Content Header (Page header) -->
                <!-- Main content -->
        
        <article  data-folio="<?php echo $result['NroFolio']; ?>" ></article>
                
                    <!-- title row -->
                    <div id="id_notificacion"
                    class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="glyphicon glyphicon-list-alt"></i> Notificacion al folio: <?php echo $result['NroFolio']; ?>
                               
                              
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          <strong>Fecha:</strong> 
                            <?php echo $result['FechaCreacion']; ?><br>
                              <strong>Usuario: </strong>
                               <?php echo $Usuario ?><br>
                            
                        </div><!-- /.col -->
                        
                    </div><!-- /.row -->
                    <hr>
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <p class="lead">Mensaje: </p>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                            <?php echo $result['Cuerpo']; ?>
                            </p>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    
                   
          <br />
           
                
      </div>    
        </aside><!-- /.right-side -->


                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col (MAIN) -->
                      </div>
                  </div><!-- MAILBOX END -->

</section><!-- /.content -->
</div>
</div><!--/col-span-10-->


</div><!-- /Main -->

<!--Enviar una nueva notificacion-->

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
                            <?php foreach( $filas2 as $row ) {if($row["nombre"]!=$usuario and $row['Id_Rol']>40){ ?>
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

<script type="text/javascript" src="js/gestion_folios/Notificaciones.js" ></script>

<script type="text/javascript" src="js/gestion_folios/navbar_lateral.js" ></script>