 <?php

    try{
        

        $addNroFolio= $_POST['NroFolio'];
        $addUsuario= $_POST['idEmisor'];
        $addTitulo = $_POST['Titulo'];
        $addMensaje= $_POST['Cuerpo'];
        $addFechaCreacion= $_POST['FechaCreacion'];
        $addUsuariosNotificado=$_POST['UsuariosNotificados'];
        

       
       if($addUsuariosNotificado== "" or $addUsuariosNotificado== NULL){
            $mensaje = "Por favor introduzca usuarios";
            $codMensaje = 0;
                
        }



         elseif($addTitulo == "" or $addTitulo == NULL){
            $mensaje = "Por favor introduzca el titulo de la notificacion";
            $codMensaje = 0;
           
        } elseif($addMensaje == "" or $addMensaje == NULL){
            $mensaje = "Por favor introduzca un mensaje";
            $codMensaje = 0;
        }

    



        else{

        require_once("../../conexion/config.inc.php");
	   $ubicacionemisor=2;
        $sql = "INSERT INTO notificaciones_folios Values(NULL,:addNroFolio,:addUsuario,:addTitulo,:addMensaje,:addFechaCreacion,:addUbicacion)";

        $query = $db->prepare($sql);

        $query ->bindParam(":addNroFolio",$addNroFolio);
        $query ->bindParam(":addUsuario",$addUsuario);
        $query ->bindParam(":addTitulo",$addTitulo);
        $query ->bindParam(":addMensaje",$addMensaje);
        $query ->bindParam(":addFechaCreacion",$addFechaCreacion);
        // 2 es la ubicacion de la notificacion que es enviada
        $query ->bindParam(":addUbicacion",$ubicacionemisor);
        $query->execute();

          //Consulta para traer el id de la notificacion que se envio :D  
        $sql3= "SELECT Id_Notificacion FROM `notificaciones_folios` Order By Id_Notificacion DESC LIMIT 1";
        $query3 = $db->prepare($sql3);
        $query3->execute();
        $fila= $query3->fetchAll();
         
            foreach( $fila as $row ){ 
     
            $id = $row['Id_Notificacion'];
            }


        //Se insertan todos los usuarios a los que se les envia notificacion 
        foreach ($_POST['UsuariosNotificados'] as $prereq ) {
                
        $ubicacion=3;//La ubicacion de la notificacion 3 es Recibida por el usuario notificado
        $sql1 = "INSERT INTO usuario_notificado Values(NULL,:id,:usuarionotif,:ubicacion,:addFechaCreacion)";
        $query1 = $db->prepare($sql1); 
        $query1 ->bindParam(":id",$id);   
        $query1 ->bindParam(":usuarionotif",$prereq); 
        $query1 ->bindParam(":ubicacion",$ubicacion);    
        $query1 ->bindParam(":addFechaCreacion",$addFechaCreacion);
        $query1->execute();}



        $mensaje = "Notificacion enviada correctamente";
        $codMensaje = 1;
        

        }

    }catch(PDOExecption $e){
        $mensaje = "Al tratar de enviar, por favor intente de nuevo";
        $codMensaje = 0;
    }