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
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Agregar Persona
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <form role="form" method="post">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <label >Información personal</label>
                                            </h4>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <label>Número de Identidad</label>
                                                            <input id="identidad" class="form-control" name="identidad" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Primer nombre</label>
                                                            <input id="primerNombre" class="form-control" name="primerNombre"required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Segundo nombre</label>
                                                            <input id="segundoNombre" class="form-control" name="segundoNombre" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Primer Apellido</label>
                                                            <input id="primerApellido" class="form-control" name="primerApellido" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Segundo Apellido</label>
                                                            <input id="segundoApellido" class="form-control" name="segundoApellido" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <strong>Fecha de Nacimiento</strong>
                                                            <input id="fecha" type="date" name="fecha" autocomplete="off" class="input-xlarge" format="yyyy-mm-dd"><br>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sexo</label>
                                                            <input type="radio" name="sexo" id="sexoFem" value="F" checked>Femenino
                                                            <input type="radio" name="sexo" id="sexoMas" value="M">Masculino
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Dirección</label>
                                                            <textarea id="direccion" class="form-control" rows="3" name="direccion"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Correo electrónico</label>
                                                            <input id="email" class="form-control" name="email" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Estado civil</label>
                                                            <select class="form-control" id="estCivil" name="estCivil">
                                                                <option>Soltero</option>
                                                                <option>Casado</option>
                                                                <option>Divorciado</option>
                                                                <option>Viudo</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nacionalidad</label>
                                                            <input id="nacionalidad" class="form-control" name="nacionalidad" required>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="guardarp" class="btn btn-primary">Guardar Información</button>
                            </form>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <script>

        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

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
            data={
                identidad:$('#identidad').val(),
                primerNombre:$('#primerNombre').val(),
                segundoNombre:$('#segundoNombre').val(),
                primerApellido:$('#primerApellido').val(),
                segundoApellido:$('#segundoApellido').val(),
                sexo:$('#sexoMas').val(),
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



