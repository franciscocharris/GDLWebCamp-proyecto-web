<?php 

function productos_json(&$boletos, &$camisas = 0, &$etiquetas = 0){
	$dias = array(
		0 => 'un_dia',
		1 => 'pase_completo',
		2 => 'pase_2dias'
	);

	//unset es un afuncion que eliminar una variable o posicion de un arreglo
	unset($boletos['un_dia']['precio']);
	unset($boletos['completo']['precio']);
	unset($boletos['2dias']['precio']);
	
	$total_boletos = array_combine($dias, $boletos);


	$camisas = (int) $camisas;
	$etiquetas = (int) $etiquetas;
	if($camisas > 0){
		$total_boletos['camisas'] = $camisas;
	}
	if($etiquetas > 0){
		$total_boletos['etiquetas'] = $etiquetas;
	}
	return json_encode($total_boletos);
}

function eventos_json(&$eventos){
	$eventos_json = array();
	foreach($eventos as $evento){
		$eventos_json['eventos'][] = $evento;
	}

	return json_encode($eventos_json);
}