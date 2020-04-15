<?php
include_once 'funciones/funciones.php';

if(isset($_POST['registro']) && $_POST['registro'] == 'nuevo'){
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	//boletos
	$boletos_adquiridos = $_POST['boletos'];
	//camisas y etiquetas
	$camisas = $_POST['pedido_extra']['camisas']['cantidad'];
	$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];


	$pedido = productos_json($boletos_adquiridos, $camisas, $etiquetas);

	$total = $_POST['total_pedido'];
	$regalo = $_POST['regalo'];

	$eventos = $_POST['registro_evento'];
	$registro_eventos = eventos_json($eventos);
	try {
		$stmt = $conn->prepare(" INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado, pagado) VALUES (?, ?, ?, NOW(), ?, ?, ?, ?, 1) ");
		$stmt->bind_param("sssssis", $nombre, $apellido, $email, $pedido, $registro_eventos, $regalo, $total);
		$stmt->execute();

		if($stmt->affected_rows){
			$respuesta = array(
				'respuesta' => 'exito',
				'id_insertado' => $stmt->insert_id
			);
		}else{
			$respuesta = array(
				'respuesta' => 'error'
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		$respuesta = array(
			'respuesta' => 'error' . $e->getMessage()
		);
	}
	echo json_encode($respuesta);
}

if(isset($_POST['registro']) && $_POST['registro'] == 'actualizar'){
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	//boletos
	$boletos_adquiridos = $_POST['boletos'];
	//camisas y etiquetas
	$camisas = $_POST['pedido_extra']['camisas']['cantidad'];
	$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];


	$pedido = productos_json($boletos_adquiridos, $camisas, $etiquetas);

	$total = $_POST['total_pedido'];
	$regalo = $_POST['regalo'];

	$eventos = $_POST['registro_evento'];
	$registro_eventos = eventos_json($eventos);
	$id_registro = $_POST['id_registro'];
	$fecha_registro = $_POST['fecha_registro'];
	
	try {
		$stmt = $conn->prepare(" UPDATE registrados SET  nombre_registrado = ?, apellido_registrado = ?, email_registrado = ?, fecha_registro = ?, pases_articulos = ?, talleres_registrados = ?, regalo = ?, total_pagado = ?, pagado = 1 WHERE ID_Registrado = ? ");
		$stmt->bind_param("ssssssisi", $nombre, $apellido, $email, $fecha_registro, $pedido, $registro_eventos, $regalo, $total, $id_registro);
		$stmt->execute();
		if($stmt->affected_rows){
			$respuesta = array(
				'respuesta' => 'exito',
				'id_actualizado' => $stmt->insert_id
			);
		}else{
			$respuesta =  array(
				'respuesta' => 'error'
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		$respuesta =  array(
			'respuesta' => 'error' . $e->getMessage()
		);
	}

	echo json_encode($respuesta);
}
if(isset($_POST['registro']) && $_POST['registro'] == 'eliminar'){
	$id_registro = $_POST['id'];
	try {
		$stmt = $conn->prepare("DELETE FROM registrados WHERE ID_Registrado = ? ");
		$stmt->bind_param("i", $id_registro);
		$stmt->execute();
		if($stmt->affected_rows){
			$respuesta = array(
				'respuesta' => 'exito',
				'id_insertado' => $stmt->insert_id
			);
		}else{
			$respuesta  = array(
				'respuesta' => 'error'
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		$respuesta  = array(
			'respuesta' => 'error' . $e->getMessage()
		);
	}
	echo json_encode($respuesta);
}