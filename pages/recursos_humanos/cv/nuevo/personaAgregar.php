<?php
session_start();

include "../../../../Datos/conexion.php";

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
            $fNac=limpiar($_POST['fecha']);
            $sexo = $_POST['sexo'];
            $direc=limpiar($_POST['direccion']);
            $email=limpiar($_POST['email']);
            $estCivil = $_POST['estCivil'];

           mysql_query("INSERT INTO persona (N_identidad, Primer_nombre, Segundo_nombre, Primer_apellido,
            Segundo_apellido, Fecha_nacimiento, Sexo, Direccion, Correo_electronico, Estado_Civil)
            VALUES ('$identi', '$pNombre','$sNombre','$pApellido','$sApellido','$fNac','$sexo','$direc', '$email', '$estCivil')");

            //Agregar multiples telefonos
            for($i=0; $i<count($_POST['numTel']); $i++){
                $telefono = $_POST['numTel'][$i];
                $tipo = $_POST['tipo'][$i];
                mysql_query("INSERT INTO telefono (ID_Telefono, Tipo, Numero, N_identidad)
                    VALUES (DEFAULT,'$tipo','$telefono','$identi')");
            }
            echo $pNombre." ".$pApellido." ha sido agregado(a) con éxito!";
        }

        //Formación Académica
        if(!empty($_POST['idforAcad'])){
                $tipo = $_POST['tipo'];
                $pa=mysql_query("SELECT ID_Tipo_estudio FROM tipo_estudio WHERE Tipo_estudio = '$tipo'");
                $row=mysql_fetch_array($pa);
                $idTipo = $row['ID_Tipo_estudio'];

                $nomTitulo = $_POST['titulo'];
                $nomUni = $_POST['universidad'];
                $p=mysql_query("SELECT Id_universidad FROM universidad WHERE nombre_universidad = '$nomUni'");
                $r=mysql_fetch_array($p);
                $idUni = $r['Id_universidad'];
                $identidad = $_POST['idforAcad'];

                mysql_query("INSERT INTO estudios_academico (ID_Estudios_academico, Nombre_titulo,ID_Tipo_estudio, N_identidad, Id_universidad)
                    VALUES (DEFAULT,'$nomTitulo','$idTipo','$identidad','$idUni')");
                echo "Formación Académica ha sido agregada con éxito!";
        }

        //Experiencia laboral
        if(!empty($_POST['ideLab'])){
                $nomEmp = $_POST['nombreEmpresa'];
                $tiempo = $_POST['tiempoLab'];
                $identi=$_POST['ideLab'];

                mysql_query("INSERT INTO experiencia_laboral (ID_Experiencia_laboral, Nombre_empresa, Tiempo, N_identidad)
                            VALUES (DEFAULT,'$nomEmp','$tiempo','$identi')");
            echo "Experiencia laboral ha sido agregada con éxito!";
        }

        //Experiencia Académica
        if(!empty($_POST['ideAcad'])){
                $nomInst = $_POST['nombreInst'];
                $tiempo = $_POST['tiempoAcad'];
                $identi=$_POST['ideAcad'];
                mysql_query("INSERT INTO experiencia_academica (ID_Experiencia_academica, Institucion, Tiempo, N_identidad)
                                    VALUES (DEFAULT,'$nomInst','$tiempo','$identi')");
            echo "Experiencia académica ha sido agregada con éxito!";
        }
?>
