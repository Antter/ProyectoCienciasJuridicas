
<?php

include '../Datos/conexion.php';
$query = mysql_query("Select distinct area.id_area,area.nombre, tipo_area.nombre as n, tipo_area.id_tipo_area as id, area.observacion from area,tipo_area where area.id_tipo_area=tipo_area.id_tipo_area order by area.id_area desc", $enlace);
?>
<!DOCTYPE html>
<html lang="en">
    <head>

    </head>
    <body>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>   
                            <th>id Area</th>
                            <th>Nombre</th>
                            <th>Tipo de Area</th>
                            <th>Observaciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contador = 0;
                        while ($row = mysql_fetch_array($query)) {
                            $id = $row['id_area'];
                            ?>
                            <tr>
                                <td><?php echo $row['id_area'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td id="<?php echo $row['id'] ?>"><?php echo $row['n'] ?></td>
                                <td><?php echo $row['observacion'] ?></td>
                                <td><a class="eEditarArea btn btn-primary"  class="btn btn-success" type="button" data-toggle="modal" data-target="#emodal">Editar</a></td>
                                <td><a class="eliminarArea btn btn-primary">Eliminar</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $("#resultado").fadeOut(1500);
            }, 3000);
        });
    </script>
    <script src='js/funcionesDeAreas.js' type="text/javascript"></script>
</html>

