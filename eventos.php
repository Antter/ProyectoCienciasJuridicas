<?php


$fechaActual= date("Y-m-d");

//echo $fechaActual;
$link=mysql_connect("localhost", "root", "");
mysql_select_db("sistema_ciencias_juridicas",$link) OR DIE ("Error: No es posible establecer la conexión");
mysql_set_charset('utf8');
 //Select * from t1 where not exists (select 1 from t2 where t2.id = t1.id)
$eventos=mysql_query("SELECT * FROM actividades where not exists (select 1 from actividades_terminadas where actividades.id_actividad = actividades_terminadas.id_Actividad)",$link);

//echo "[";
while($all = mysql_fetch_assoc($eventos)){
$e = array();
$e['id'] = $all['id_actividad'];
$e['start'] = $all['fecha_inicio'];
$e['end'] = $all['fecha_fin'];
$e['title'] = $all['descripcion'];
$fechaEntrada = $all['fecha_fin'];
//echo $fechaEntrada;
if($fechaEntrada<$fechaActual){
  $e['color']='red';  
    
}else{
    $e['color']='green'; 
    
}

//echo json_encode($e).",";
$result[] = $e;
}
//echo "]";
//echo json_encode(array('success' => 1, 'result' => $result));
echo json_encode($result)
 
?>

