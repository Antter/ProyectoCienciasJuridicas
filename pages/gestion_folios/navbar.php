<?php
    $rol = $_SESSION['user_rol'];
?>

<div class="col-sm-2">
    <!-- Left column -->
      
    <ul class="list-unstyled">
        <li class="nav-header"> <a id="gestion_folios" href="#"><i class="glyphicon glyphicon-home"></i> Inicio Gestion de Folios</a></li>
        <hr>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
            <h5><i class="fa fa-tags"></i> Manejo de folios <i class="glyphicon glyphicon-chevron-down"></i></h5>
            </a>
			<?php
                if($navbar_loc == "contenido"){
				    echo '<ul class="list-unstyled collapse in" id="userMenu">';
				}else{
				    echo '<ul class="list-unstyled collapse" id="userMenu">';
				}
            ?>			
                <li><a id="folios" href="#"><i class="glyphicon glyphicon-book"></i> Folios
                  <!-- <span class="badge badge-info">4</span>--></a></li>
                <li><a id="alertas"href="#"><i class="glyphicon glyphicon-bell"></i> Alertas 
                  <!-- <span class="badge badge-info">10</span>--></a></li>
                <li><a id="notificaciones" href="#"><i class="glyphicon glyphicon-flag"></i> Notificaciones
                  <!-- <span class="badge badge-info">6</span>--></a></li>
            </ul>
        </li>
		<?php
		    if($rol == 100){
			    echo '<li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2">';
			}else{
			    echo '<li class="nav-header" style="display: none"> <a href="#" data-toggle="collapse" data-target="#menu2">';
			}
		?>
            <h5><i class="glyphicon glyphicon-flash"></i> Mantenimiento <i class="glyphicon glyphicon-chevron-right"></i></h5>
            </a>
			
			<?php 
			    if($navbar_loc == "mantenimiento"){
				    echo '<ul class="list-unstyled collapse in" id="menu2">';
				}else{
				    echo '<ul class="list-unstyled collapse" id="menu2">';
				}
			?>
                <li><a id="mantenimiento_organizacion" href="#">Mantenimiento de Organizacion</a>
                </li>
                <li><a id="mantenimiento_unidadacademica" href="#">Mantenimiento de unidad academica</a>
                </li>
                <li><a id="mantenimiento_prioridad"href="#">Mantenimiento de prioridad</a>
                </li>
				<li><a id="mantenimiento_ubicacionfisica"href="#">Mantenimiento de ubicacion fisica</a>
                </li>
                <li><a id="mantenimiento_estado_seguimiento"href="#">Mantenimiento de estado seguimiento</a>
                </li>
                <li><a id="mantenimiento_ubicacion_notificaciones"href="#">Mantenimiento de ubicacion notificaciones</a>
                </li>
                <li><a id="mantenimiento_folios"href="#">Mantenimiento de folios</a>
                </li>				
            </ul>
        </li>
    </ul>   
    <hr>
</div><!-- /col-2 -->
<script type='text/javascript'>
        
  $(document).ready(function() {
    $(".alert").addClass("in").fadeOut(4500);
/* swap open/close side menu icons */
      $('[data-toggle=collapse]').click(function(){
      // toggle icon
        $(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
      });  
  });
        
</script>