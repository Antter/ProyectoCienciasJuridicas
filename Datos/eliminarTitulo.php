    <?php
    
       include '../Datos/funciones.php';
      include'../Datos/conexion.php';
    
        if (isset($_POST['titulo'])) {
            $id = $_POST['titulo'];
            
            if(mysql_query("DELETE FROM titulo WHERE id_titulo='$id'")){
            echo mensajes('Titulo"' . $id . '" Eliminado con Exito', 'verde');
            }else{
                
            echo mensajes('Titulo"' . $id . '" No se puede eliminar', 'rojo');
                
            }
        }
        
        
        include '../Datos/cargarTitulos.php';
        
    ?>