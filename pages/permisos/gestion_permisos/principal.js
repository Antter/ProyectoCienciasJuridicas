/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Recibe las variables del formulario que esta llamando el archivo javascript
	var x;
	x=$(document);
	x.ready(inicio);

	//Funcion inicio recibe las acciones realizadas en el formulario y llama a las funciones correspondientes a cada una
	function inicio()
	{
		var x;
		x=$("#solicitud");
		x.click(Solicitud);
		
		var x;
		x=$("#motivos");
		x.click(motivos);
	  
	  
		var x;
		x=$("#edificios");
		x.click(Edificios);
		
		var x;
		x=$("#unidad");
		x.click(Unidad);
		
		var x;
		x=$("#revision");
		x.click(Revision);
		
		var x;
		x=$("#reportes");
		x.click(reportes);
	}

	//Carga en el area de trabajo de la pantalla el formulario correspondiente para la realizacion de las solicitudes 
	function Solicitud()
	{
		$.ajax({
			async:true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"pages/permisos/Solicitudes.php",    
			// url:"../solicitudes.php",  
			beforeSend:inicioEnvio,
			success:llegadaSolic,
			timeout:4000,
			error:function(result){  
            alert('ERROR ' + result.status + ' ' + result.statusText);  
          }  
		}); 
		return false;
	}
	
	//Carga en el area de trabajo de la pantalla el formulario correspondiente para la ingresar motivos en la base de datos 
	function motivos()
	{
		$.ajax({
			async:true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"pages/permisos/motivo.php",    
			// url:"../Motivos.php",  
			beforeSend:inicioEnvio,
			success:llegadaMotivos,
			timeout:4000,
			error:problemas
		}); 
		return false;
	}

	//Carga en el area de trabajo de la pantalla el formulario correspondiente para la ingresar edificios en la base de datos 
	function Edificios()
	{
		$.ajax({
			async:true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"pages/permisos/Edificios.php",    
			// url:"../Edificios.php",  
			beforeSend:inicioEnvio,
			success:llegadaEdificios,
			timeout:4000,
			error:problemas
		}); 
		return false;
	}

	//Carga en el area de trabajo de la pantalla el formulario correspondiente para la ingresar unidades academicas en la base de datos 
	function Unidad()
	{
		$.ajax({
			async:true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"pages/permisos/Unidad_Academica.php",    
			// url:"../Unidad_Academica.php",  
			beforeSend:inicioEnvio,
			success:llegadaUnidad,
			timeout:4000,
			error:problemas
		}); 
		return false;
	}
	
	//Carga en el area de trabajo de la pantalla el formulario correspondiente para la visualización de los reportes 
	function reportes()
	{
		$.ajax({
			async:true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"pages/permisos/reportes.php",    
			// url:"../Unidad_Academica.php",  
			beforeSend:inicioEnvio,
			success:llegadareporte,
			timeout:4000,
			error:problemas
		}); 
		return false;
	}
	
	function Revision()
	{
		$.ajax({
			async:true,
			type: "POST",
			dataType: "html",
			contentType: "application/x-www-form-urlencoded",
			url:"pages/permisos/revision.php",    
			// url:"../revision.php",  
			beforeSend:inicioEnvio,
			success:llegadaRevision,
			timeout:4000,
			error:problemas
		}); 
		return false;
	}
	
	//Esta función desaparece momentaneamente el formulario mientras las de guardado son realizadas
	function inicioEnvio()
	{
		var x=$("#contenedor");
		x.html('Cargando...');
	}
	
	//Esta función carga nuevamente el formulario solicitado 
	function llegadaSolic()
	{
		$("#contenedor").load('pages/permisos/Solicitud.php');
		 //$("#contenedor").load('../permisos/solicitudes.php');
	}
	
	//Esta función carga nuevamente el formulario solicitado 
	function llegadareporte()
	{
		$("#contenedor").load('pages/permisos/reportes.php');
		 //$("#contenedor").load('../permisos/reportes.php');
	}
	
	//Esta función carga nuevamente el formulario solicitado 
	function llegadaMotivos()
	{
		$("#contenedor").load('pages/permisos/motivo.php');
		 //$("#contenedor").load('../permisos/motivos.php');
	}
	
	//Esta función carga nuevamente el formulario solicitado 
	function llegadaEdificios()
	{
		$("#contenedor").load('pages/permisos/Edificios.php');
		 //$("#contenedor").load('../permisos/Edificios.php');
	}

	//Esta función carga nuevamente el formulario solicitado 
	function llegadaUnidad()
	{
		$("#contenedor").load('pages/permisos/Unidad_Academica.php');
		 //$("#contenedor").load('../permisos/Unidad_Academica.php');
	}
	
	//Esta función carga nuevamente el formulario solicitado 
	function llegadaRevision()
	{
		$("#contenedor").load('pages/permisos/revision.php');
		 //$("#contenedor").load('../permisos/revision.php');
	}

	//Muestra un mensaje de error cuando la transacción falla
	function problemas()
	{
		$("#contenedor").text();
	}