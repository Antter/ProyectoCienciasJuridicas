<script type="text/javascript" src="../SistemaCienciasJuridicas/js/jquery-2.1.3.js"></script>
<script language="javascript" type="text/javascript">

$(document).ready(function(){
		$("form").submit(function(e){
		e.preventDefault();
		var idusuario="<?php echo $idusuario; ?>" ;
		var nombre=$('input:text[name=nombre]').val();
		var area=$('select[name=area]').val();
	    var  motivo=$('select[name=motivo]').val();
	   	var edificio=$('select[name=edificio]').val();
		var horaf= $( "#horaf" ).val();
		var horai= $( "#horai" ).val();
		var fecha= $( "#fecha" ).val();
		var cantidad= $("#cantidad" ).val();
	     
		 $.post("../SistemaCienciasJuridicas/pages/permisos/Isolicitud.php",
		 {	name:nombre,
		 	area: area,
			motivo:motivo,
			edificio:edificio,
			fecha:fecha,
			fecha:fecha,
			horai:horai,
			horaf:horaf,
			cantidad:cantidad,
			idusuario:idusuario },llegadaDatos)	
		 .done(function() {
			
				 $("#r").html( "La solicitud se ha completado correctamente." );
				 
		 })
		 .fail(function() {
			
				 $("#r").html( "La solicitud a fallado: " );

				 
				 
	    });
	})
	
})

function llegadaDatos(datos)
{
	//$( "#nombre" ).val(datos);
	 //$("#r").html( Datos );

 // alert(datos);
 // $('span').php(datos);
 //  $('span').html( "La solicitud se ha completado correctamente." );
  		
}



</script>