<?php
    $query = $db->prepare("SELECT * FROM ( SELECT folios.NroFolio, folios.PersonaReferente, unidad_academica.NombreUnidadAcademica AS ENTIDAD, 
                         folios.FechaEntrada, folios.TipoFolio FROM folios INNER JOIN unidad_academica ON folios.UnidadAcademica = unidad_academica.Id_UnidadAcademica 
                         UNION SELECT folios.NroFolio, folios.PersonaReferente, organizacion.NombreOrganizacion AS ENTIDAD, 
                         folios.FechaEntrada ,folios.TipoFolio FROM folios INNER JOIN organizacion ON folios.Organizacion = organizacion.Id_Organizacion ) T1 
                        ORDER BY `T1`.`fechaEntrada` DESC");
    $query->execute();
    $rows = $query->fetchAll();
        if($rows){
            //$number_of_rows = $rows->rowCount();
            $folios = 1;
        }else{
            $number_of_rows = 0;
            $folios = 0;
        }
    $query = null;
    $db = null;
?>