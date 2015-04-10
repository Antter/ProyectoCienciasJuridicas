<?php
$idAct = $_POST['idAct'];
$idSubAct = $_POST['idSubAct'];
include '../Datos/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">

    <head>



    </head>

    <body>

        <input type="hidden" id="idAct" value="<?php echo $idAct; ?>">  
        <input type="hidden" id="idSubAct" value="<?php echo $idSubAct; ?>"> 
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-default">
                    <div class="panel-heading">
                        <?php
                        $consulta = "SELECT * FROM sub_actividad where id_sub_Actividad='" . $idSubAct . "'";

                        if ($resultado = $conectar->query($consulta)) {
                            $fila = $resultado->fetch_row()
                            ?>
                            <h2><strong> Sub Actividad:</strong> <?php echo $fila[2] ?>  </h2>
                        </div>
                        <div class="panel-body">


                            <div class="col-lg-5">
                                <table>

                                    <tr>
                                        <td>
                                            <strong> Descripción:</strong>
                                        </td>
                                        <td>
                                            <?php echo $fila[3] ?> 
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong> Fecha de Realización:  </strong>  </td>
                                        <td><?php echo $fila[4] ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong> Encargado:  </strong></td>
                                        <td>
                                            <?php
                                            $consulta2 = "select * from persona where N_identidad in(SELECT N_identidad FROM empleado where No_Empleado=" . $fila[5] . ")";

                                            if ($resultado2 = $conectar->query($consulta2)) {
                                                $fila2 = $resultado2->fetch_row();
                                                $nombre = $fila2[1] . " " . $fila2[2] . " " . $fila2[3] . " " . $fila2[4];
                                                echo $nombre;
                                            }
                                            ?>

                                        </td>
                                    </tr>

                                </table>

                            </div>           
                            <div class="col-lg-5">
                                <table>
                                    <tr>
                                        <td><strong> Porcentaje:   </strong></td>
                                        <td>  <?php echo $fila[6] ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Costo:   </strong></td>
                                        <td><?php echo $fila[7] ?></td> 
                                    </tr>
                                    <tr>
                                        <td><strong>Observación:    </strong></td>
                                        <td><?php echo $fila[8] ?></td>

                                </table> 
                            </div>


                            <?php
                            $resultado->close();
                        }

                        //$conectar->close();
                        ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-12">

                <?php
                $consulta2 = "SELECT * FROM sub_actividades_realizadas where id_SubActividad=" . $idSubAct;

                if ($resultado2 = $conectar->query($consulta2)) {


                    if ($fila2 = $resultado2->fetch_row()) {

                        $fecha = $fila2[2];
                        $obs = $fila2[3];
                        //echo $fecha;
                        ?>

                        <div class="panel-default">
                            <div class="panel-heading">
                                Esta Sub Actividada Ya Se Dio por Realizada
                            </div>
                            <div class="panel-body">
                                <div>
                                    <strong>Fecha de Realización:  </strong> <?php echo $fecha; ?>
                                </div>
                                <div>
                                    <strong>Observación:  </strong> <?php echo $obs; ?>
                                </div>
                            </div>

                        </div> 



                        <?php
                    } else {
                        ?>

                        <div class="panel-default">
                            <div class="panel-heading">
                                Dar  Sub Actividad Por Realizada 
                            </div>
                            <div class="panel-body">
                                <div>
                                    <button id="finalizar" type="button" class="btn btn-success "><i class="fa fa-check"></i>
                                    </button>
                                </div>
                                <div>
                                    haciendo click podras dar por finalizada esta sub Actividad
                                </div>
                            </div>

                        </div>



                        <?php
                    }
                }
                ?>

            </div>









            <div class="modal fade" id="subActividadRealizada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Finalizar Sub Actividad</h4>
                        </div>
                        <div class="modal-body" id="cuerpoSubActividadRealizada">

                        </div>

                    </div>
                </div>

            </div>  

        </div>      











        <script>

            $(document).ready(function () {

                $("#finalizar").click(function () {


                    //id = $(this).parents("tr").find("td").eq(0).html();
                    // alert(id);      
                    data4 = {
                        idSubAct: $('#idSubAct').val()
                    };
                    $.ajax({
                        async: true,
                        type: "POST",
                        dataType: "html",
                        //: "application/x-www-form-urlencoded",
                        //url: "pages/editarPOA.php",
                        //beforeSend: inicioEliminar,
                        success: llegadaFinalizarSubActividad,
                        timeout: 4000,
                        error: problemas
                    });
                    return false;

                });


            });

            function llegadaFinalizarSubActividad()
            {
                $("#cuerpoSubActividadRealizada").load('pages/subActividadRealizada.php', data4);
                $("#subActividadRealizada").modal('show');
            }

            function problemas()
            {
                $("#contenedor2").text('Problemas en el servidor.');
            }




        </script>



    </body>

</html>


<?php
$conectar->close();
?>