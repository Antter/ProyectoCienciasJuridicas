<?php
session_start();

        include "../../../../Datos/conexion.php";


        if(isset($_POST['identi'])){
            $identi=$_POST['identi'];
            $_SESSION['Nidenti'] = $identi;

            $s = mysql_query("SELECT * FROM persona WHERE N_identidad = '".$identi."'");
            if($row = mysql_fetch_array($s)){
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

            echo '<form role="form" method="post"><div class="panel-group" id="accordion">
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
                                                            <input id="identidad" class="form-control" name="identidad" value="'.$id.'" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Primer nombre</label>
                                                            <input id="primerNombre" class="form-control" name="primerNombre" value="'.$pNombre.'" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Segundo nombre</label>
                                                            <input id="segundoNombre" class="form-control" name="segundoNombre" value="'.$sNombre.'" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Primer Apellido</label>
                                                            <input id="primerApellido" class="form-control" name="primerApellido" value="'.$pApellido.'" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Segundo Apellido</label>
                                                            <input id="segundoApellido" class="form-control" name="segundoApellido" value="'.$sApellido.'" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <strong>Fecha de Nacimiento</strong>
                                                            <input id="fecha" type="date" name="fecha" autocomplete="off" class="input-xlarge" format="yyyy-mm-dd" value="'.$fNac.'" required><br>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sexo</label>';
                                                            if($sexo == 'F'){
                                                                echo '<input type="radio" name="sexo" id="sexoFem" value="F" checked>Femenino';
                                                                echo '<input type="radio" name="sexo" id="sexoMas" value="M">Masculino';
                                                            }
                                                            if($sexo == 'M'){
                                                                echo '<input type="radio" name="sexo" id="sexoFem" value="F">Femenino';
                                                                echo '<input type="radio" name="sexo" id="sexoMas" value="M" checked>Masculino';
                                                            }
                                                        echo '</div>
                                                        <div class="form-group">
                                                            <label>Dirección</label>
                                                            <textarea id="direccion" class="form-control" rows="3" name="direccion">'.$direc.'</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Correo electrónico</label>
                                                            <input id="email" class="form-control" name="email" value="'.$email.'" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Estado civil</label>
                                                            <select class="form-control" id="estCivil" name="estCivil">
                                                                <option value="soltero"';
                                                                if($estCivil == "Soltero") echo "selected";
                                                                echo '>Soltero</option>
                                                                <option value="casado"';
                                                                if($estCivil == "Casado") echo "selected";
                                                                echo '>Casado</option>
                                                                <option value="divorciado"';
                                                                if($estCivil == "Divorciado") echo "selected";
                                                                echo '>Divorciado</option>
                                                                <option value="viudo"';
                                                                if($estCivil == "Viudo") echo "selected";
                                                                echo'>Viudo</option>';
                                                            echo '
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nacionalidad</label>
                                                            <input id="nacionalidad" class="form-control" name="nacionalidad" value="'.$nacionalidad.'" required>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="actualizar" class="btn btn-primary">Guardar Información</button></form>';
            }
        }

		function limpiar($tags){
            $tags = strip_tags($tags);
            return $tags;
        }

        //Información Personal
	  	if(!empty($_POST['identidad']) and !empty($_POST['primerNombre']) and !empty($_POST['segundoNombre']) and !empty($_POST['primerApellido'])and !empty($_POST['segundoApellido'])
            and !empty($_POST['direccion'])and !empty($_POST['email'])){
            $identi=limpiar($_POST['identidad']);
            $pNombre=limpiar($_POST['primerNombre']);
            $sNombre=limpiar($_POST['segundoNombre']);
            $pApellido=limpiar($_POST['primerApellido']);
            $sApellido=limpiar($_POST['segundoApellido']);
            $fecha=$_POST['fecha'];
            $sexo = $_POST['sexo'];
            $direc=limpiar($_POST['direccion']);
            $email=limpiar($_POST['email']);
            $estCivil = $_POST['estCivil'];
            $nacionalidad = $_POST['nacionalidad'];


            $gId = $_SESSION['Nidenti'];
            //Agregar ON UPDATE CASCADE, ON DELETE CASCADE A LA TABLA telefono.
            mysql_query("UPDATE persona SET N_identidad = '$identi', Primer_nombre = '$pNombre', Segundo_nombre = '$sNombre', Primer_apellido = '$pApellido',
            Segundo_apellido = '$sApellido', Fecha_nacimiento = '$fecha', Sexo = '$sexo', Direccion = '$direc', Correo_electronico = '$email', Estado_Civil = '$estCivil', Nacionalidad = '$nacionalidad'
            WHERE N_identidad = '$gId'");

            echo " Datos personales se han actualizado con éxito!";
        }
?>
    
<script>

    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    var y;
    y = $(document);
    y.ready(inicioAct);

    function inicioAct()
    {
        var y;
        y = $("#actualizar");
        y.click(actualizarPer);
    }


    function actualizarPer()
    {
        data={
            identidad:$('#identidad').val(),
            primerNombre:$('#primerNombre').val(),
            segundoNombre:$('#segundoNombre').val(),
            primerApellido:$('#primerApellido').val(),
            segundoApellido:$('#segundoApellido').val(),
            fecha:$('#fecha').val(),
            sexo:$('#sexoMas').val(),
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
            beforeSend: inicioEnvioAct,
            success: llegadaActualPersona,
            timeout: 4000,
            error: problemas
        });
        return false;
    }

    function inicioEnvioAct()
    {
        var y = $("#contenedor");
        y.html('Cargando...');
    }

    function llegadaActualPersona()
    {
        $("#contenedor").load('pages/recursos_humanos/cv/actualizar/personaActualizar.php',data);
    }

    function problemasAct()
    {
        $("#contenedor").text('Problemas en el servidor.');
    }

</script>
