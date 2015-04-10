<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

    </head>

    <body>

        <div id="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Revisión de Solicitudes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">Solicitudes Entrantes</div>
                <table class="table table-bordered">
                    <tr class="well">
                        <td><strong>No. Empleado</strong></td>
                        <td><strong>Primer Nombre</strong></td>
                        <td><strong>Segundo Nombre</strong></td>
                        <td><strong>Primer Apellido</strong></td>
                        <td><strong>Segundo Apellido</strong></td>
                        <td><strong>Fecha</strong></td>		
                        <td><strong> </strong></td>
                    </tr>

                    <?php
        
					require_once("../../conexion/conn.php");  
					$conexion = mysqli_connect($host, $username, $password, $dbname);
                    $pame = mysqli_query($conexion, "Select permisos.No_Empleado, Persona.Primer_nombre, Persona.Segundo_nombre,
					Persona.Primer_apellido, Persona.Segundo_apellido, permisos.Fecha from permisos inner join (Empleado inner join
					Persona on Empleado.N_identidad=Persona.N_identidad) 
					on permisos.No_Empleado=Empleado.No_Empleado where permisos.estado='En espera' ");
                    while ($row = mysqli_fetch_array($pame)) {
                        ?>

                        <tr>
                            <td><?php echo $row['No_Empleado']; ?></td>
                            <td><?php echo $row['Primer_nombre']; ?></td>
                            <td><?php echo $row['Segundo_nombre']; ?></td>
                            <td><?php echo $row['Primer_apellido']; ?></td>
                            <td><?php echo $row['Segundo_apellido']; ?></td>
                            <td><?php echo $row['Fecha']; ?></td>

                            <td>
                        <center>
                            <form action="" method='GET' >
                                <button type="submit"  name="revisar" value= <?php echo $row['No_Empleado']; ?> > </button>                          
                                <i class="icon-edit">Revisar</i>
                            </form>
                        </center>
                        </td>
                        </tr>
                    <?php } ?>
            </div>
        </div>

    </body>

</html>




