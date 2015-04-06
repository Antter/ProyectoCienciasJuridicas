<?php
session_start();

include "../../../../Datos/conexion.php";

function limpiar($tags)
{
    $tags = strip_tags($tags);
    return $tags;
}

//Información Personal
if (!empty($_POST['identidad']) and !empty($_POST['primerNombre']) and !empty($_POST['segundoNombre']) and !empty($_POST['primerApellido']) and !empty($_POST['segundoApellido'])
    and !empty($_POST['direccion']) and !empty($_POST['email'])
) {
    $identi = limpiar($_POST['identidad']);
    $pNombre = limpiar($_POST['primerNombre']);
    $sNombre = limpiar($_POST['segundoNombre']);
    $pApellido = limpiar($_POST['primerApellido']);
    $sApellido = limpiar($_POST['segundoApellido']);
    $fNac = limpiar($_POST['fecha']);
    $sexo = $_POST['sexo'];
    $direc = limpiar($_POST['direccion']);
    $email = limpiar($_POST['email']);
    $estCivil = $_POST['estCivil'];
    $nacionalidad = $_POST['nacionalidad'];

    $date = date('Y-m-d');
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if ($fNac < $date) {
            mysql_query("INSERT INTO persona (N_identidad, Primer_nombre, Segundo_nombre, Primer_apellido,
                Segundo_apellido, Fecha_nacimiento, Sexo, Direccion, Correo_electronico, Estado_Civil, Nacionalidad)
                VALUES ('$identi', '$pNombre','$sNombre','$pApellido','$sApellido','$fNac','$sexo','$direc', '$email', '$estCivil','$nacionalidad')");
            echo $pNombre . " " . $pApellido . " ha sido agregado(a) con éxito!";
        } else echo 'Fecha incorrecta, datos no serán guardados!';
    } else {
        echo 'Correo electrónico inválido, datos no serán guardados!';
    }
}

//Formación Académica
if (!empty($_POST['idforAcad'])) {
    $tipo = $_POST['tipo'];
    $pa = mysql_query("SELECT ID_Tipo_estudio FROM tipo_estudio WHERE Tipo_estudio = '$tipo'");
    $row = mysql_fetch_array($pa);
    $idTipo = $row['ID_Tipo_estudio'];

    $nomTitulo = $_POST['titulo'];
    $nomUni = $_POST['universidad'];
    $p = mysql_query("SELECT Id_universidad FROM universidad WHERE nombre_universidad = '$nomUni'");
    $r = mysql_fetch_array($p);
    $idUni = $r['Id_universidad'];
    $identidad = $_POST['idforAcad'];

    mysql_query("INSERT INTO estudios_academico (ID_Estudios_academico, Nombre_titulo,ID_Tipo_estudio, N_identidad, Id_universidad)
                    VALUES (DEFAULT,'$nomTitulo','$idTipo','$identidad','$idUni')");
    echo "Formación Académica ha sido agregada con éxito!";
}

//Experiencia laboral
if (!empty($_POST['ideLab'])) {
    $nomEmp = limpiar($_POST['nombreEmpresa']);
    $tiempo = limpiar($_POST['tiempoLab']);
    $identi = $_POST['ideLab'];

    mysql_query("INSERT INTO experiencia_laboral (ID_Experiencia_laboral, Nombre_empresa, Tiempo, N_identidad)
                            VALUES (DEFAULT,'$nomEmp','$tiempo','$identi')");
    echo "Experiencia laboral ha sido agregada con éxito!";
}

//Experiencia Académica
if (!empty($_POST['ideAcad'])) {
    $nomInst = limpiar($_POST['nombreInst']);
    $tiempo = limpiar($_POST['tiempoAcad']);
    $identi = $_POST['ideAcad'];
    mysql_query("INSERT INTO experiencia_academica (ID_Experiencia_academica, Institucion, Tiempo, N_identidad)
                                    VALUES (DEFAULT,'$nomInst','$tiempo','$identi')");
    echo "Experiencia académica ha sido agregada con éxito!";
}

if (!empty($_POST['idTel'])) {
    $tipo = $_POST['tipo'];
    $telef = limpiar($_POST['telef']);
    $identi = $_POST['idTel'];
    mysql_query("INSERT INTO telefono (ID_Telefono, Tipo, Numero, N_identidad)
             VALUES (DEFAULT,'$tipo','$telef','$identi')");
    echo "Teléfono ha sido agregado con éxito!";
}
?>
