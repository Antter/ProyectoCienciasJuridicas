$( document ).ready(function() {

    $("form").submit(function(e) {
	    e.preventDefault();
            data ={ 
                NroFolio:$("#NroFolio").val(),
                fechaCreacion:$("#dp1").val(),
                personaReferente:$("#personaReferente").val(),
                unidadAcademica:$("#unidadAcademica option:selected").val(),
                organizacion:$("#Organizacion option:selected").val(),
                descripcion:$("#Descripcion").val(),
                tipoFolio:$("#TipoFolio option:selected").val(),
                ubicacionFisica:$("#ubicacionFisica option:selected").val(),
                prioridad:$("#Prioridad option:selected").val(),
				seguimiento:$("#Seguimiento option:selected").val(),
				notas:$("#NotasSeguimiento").val(),
                tipoProcedimiento:"insertar"
            };
            $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/folios.php", 
                success:llegadaGuardar,
                timeout:4000,
                error:problemas
            }); 
            return false;
	});

	$( "#cancel" ).click(function() {
	    $.ajax({
                async:true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                url:"pages/gestion_folios/folios.php", 
                success:cargarFolios,
                timeout:4000,
                error:problemas
        }); 
        return false;
    });		
	
});

    function cargarFolios()
    {
        $("#div_contenido").load('pages/gestion_folios/folios.php');
    }
	
    function llegadaGuardar()
    {
        $("#div_contenido").load('pages/gestion_folios/folios.php',data);
    }

    function problemas()
    {
        $("#div_contenido").text('Problemas en el servidor.');
    }