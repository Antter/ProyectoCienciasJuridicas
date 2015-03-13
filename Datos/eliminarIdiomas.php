    <?php
    
       include '../Datos/funciones.php';
      include'../Datos/conexion.php';
    
        if (isset($_POST['ID_Idioma'])) {
            $id = $_POST['ID_Idioma'];
            
            if(mysql_query("DELETE FROM idioma WHERE ID_Idioma='$id'")){
            echo mensajes('Idioma"' . $id . '" Eliminado con Exito', 'verde');
            }else{
                
            echo mensajes('Idioma"' . $id . '" No se puede eliminar', 'rojo');
                
            }
        }
        
        
        include '../Datos/cargarIdiomas.php';
        
    ?>