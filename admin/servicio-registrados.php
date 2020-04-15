<?php 
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
//se hace una consulta que traiga la fecha y el numero de usuarios o registros que se hallan hecho en ese dia y agruparlos por fecha
$sql = " SELECT fecha_registro, COUNT(*) AS resultado FROM registrados GROUP BY DATE(fecha_registro) ORDER BY fecha_registro ";
$resultado = $conn->query($sql);

$arreglo_registros = array();
while ($registro_dia = $resultado->fetch_assoc()) {
	//esta variable va a tener las fechas
	$fecha = $registro_dia['fecha_registro'];
	//como trae ademas de año mes y dia tambien trae hora mes y segunod por lo que se formatea
	$registro['fecha'] = date('Y-m-d', strtotime($fecha));
	//tambien se hace otro campo del arreglo para que traiga el nuemro de registros  que tengan una fecha
	$registro['cantidad'] = $registro_dia['resultado'];
	//el arreglo registro se hace se guarda en la iteracion del arreglo arreglo_registros
	$arreglo_registros[] = $registro;

}

//se manda en json los datos
echo json_encode($arreglo_registros);
