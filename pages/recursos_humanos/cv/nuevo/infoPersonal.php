<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Módulo Curricular</title>
    <!-- CSS -->

</head>

<body>
    
    <div class="row">
                <div class="col-lg-8">
                    <form role="form" method="post" class="form-horizontal">
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <h1>Ingreso de Información Personal</h1></br>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <label><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Datos Generales</label>
                                            </h4>
                                        </div>
                                            <div class="panel-body">
                                                <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Número de Identidad</label>
                                                            <div class="col-sm-7"><input id="identidad" class="form-control" name="identidad" required></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Primer nombre</label>
                                                            <div class="col-sm-7"><input id="primerNombre" class="form-control" name="primerNombre" required></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label">Segundo nombre</label>
                                                            <div class="col-sm-7"><input id="segundoNombre" class="form-control" name="segundoNombre"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Primer Apellido</label>
                                                            <div class="col-sm-7"><input id="primerApellido" class="form-control" name="primerApellido" required></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Segundo Apellido</label>
                                                            <div class="col-sm-7"><input id="segundoApellido" class="form-control" name="segundoApellido" required></div>
                                                        </div>
                                                        <div class="form-group"id="sexoOpcion">
                                                            <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Sexo</label>
                                                            <div class="col-sm-7"><input type="radio" name="sexo" id="sexoFem" value="F" checked>&nbsp;Femenino
                                                            <input type="radio" name="sexo" id="sexoMas" value="M">&nbsp;Masculino</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Nacionalidad</label>
                                                            <div class="col-sm-7"><input id="nacionalidad" class="form-control" name="nacionalidad" required></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><strong><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Fecha de Nacimiento</strong></label>
                                                            <div class="col-sm-7"><input id="fecha" type="date" name="fecha" autocomplete="off" class="input-xlarge" format="yyyy-mm-dd"><br></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Estado civil</label>
                                                            <div class="col-sm-7"><select class="form-control" id="estCivil" name="estCivil">
                                                                    <option>Soltero</option>
                                                                    <option>Casado</option>
                                                                    <option>Divorciado</option>
                                                                    <option>Viudo</option>
                                                                </select></div>
                                                        </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <label><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Información de contacto</label>
                                            </h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label">Dirección</label>
                                                    <div class="col-sm-7"><textarea id="direccion" class="form-control" rows="3" name="direccion"></textarea></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Correo electrónico</label>
                                                    <div class="col-sm-7"><input id="email" class="form-control" name="email" required></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </br><div class="alert alert-info" role="alert">IMPORTANTE: Los campos marcados con el signo <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> son obligatorios.</div>
                                    </br><button type="submit" id="guardarp" class="btn btn-primary">Guardar Información</button>
                                </div>
                        </div>
                    </form>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
    <script src="pages/recursos_humanos/cv/validacion.js"></script>
    <script>
        $(function(){
            $('#identidad').validCampo('0123456789-');
            $('#primerNombre').validCampo(' abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ');
            $('#segundoNombre').validCampo(' abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ');
            $('#primerApellido').validCampo(' abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ');
            $('#segundoApellido').validCampo(' abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ');
            $('#nacionalidad').validCampo(' abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ');
        });
    </script>

    <script>
        var x;
        x = $(document);
        x.ready(inicio);

        function inicio()
        {
            var x;
            x = $("#guardarp");
            x.click(insertarpersona);
        }


        function insertarpersona()
        {
            
           var sexo= document.getElementById('sexoOpcion').value; 
           alert(sexo);
         
            
            data={
                identidad:$('#identidad').val(),
                primerNombre:$('#primerNombre').val(),
                segundoNombre:$('#segundoNombre').val(),
                primerApellido:$('#primerApellido').val(),
                segundoApellido:$('#segundoApellido').val(),
                sexo:sexo,
                fecha:$('#fecha').val(),
                direccion:$('#direccion').val(),
                email:$('#email').val(),
                estCivil:$('#estCivil').val(),
                nacionalidad:$('#nacionalidad').val()
            };

            $.ajax({
                async: true,
                type: "POST",
                dataType: "html",
                contentType: "application/x-www-form-urlencoded",
                beforeSend: inicioEnvio,
                success: llegadaInsertarPersona,
                timeout: 4000,
                error: problemas
            });
            return false;
        }

        function inicioEnvio()
        {
            var x = $("#contenedor");
            x.html('Cargando...');
        }

        function llegadaInsertarPersona()
        {
            $("#contenedor").load('pages/recursos_humanos/cv/nuevo/personaAgregar.php',data);
        }

        function problemas()
        {
            $("#contenedor").text('Problemas en el servidor.');
        }

    </script>
</body>

</html>



