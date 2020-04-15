<?php
include_once 'funciones/funciones.php';

if(isset($_POST['registro']) && $_POST['registro'] == 'nuevo'){
	$titulo = filter_var($_POST['titulo_evento'], FILTER_SANITIZE_STRING);
	$categoria_id = filter_var($_POST['categoria_evento'], FILTER_VALIDATE_INT);
	$invitado_id = filter_var($_POST['invitado'], FILTER_VALIDATE_INT);
	//obtener la fecha
	$fecha = $_POST['fecha_evento'];
	$fecha_formateada = date('Y-m-d', strtotime($fecha));
	$hora = $_POST['hora_evento'];
	$hora_formateada = date('H:i', strtotime($hora));

	try {
		$stmt = $conn->prepare(" INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES (?, ?, ?, ? ,? ) ");
		$stmt->bind_param("sssii", $titulo, $fecha_formateada, $hora_formateada, $categoria_id, $invitado_id);
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
			'respuesta' => $e->getMessage()
		);
	}
	echo json_encode($respuesta);
}

if(isset($_POST['registro']) && $_POST['registro'] == 'actualizar'){
	$titulo = filter_var($_POST['titulo_evento'], FILTER_SANITIZE_STRING);
	$categoria_id = filter_var($_POST['categoria_evento'], FILTER_VALIDATE_INT);
	$invitado_id = filter_var($_POST['invitado'], FILTER_VALIDATE_INT);
	//obtener la fecha
	$fecha = $_POST['fecha_evento'];
	$fecha_formateada = date('Y-m-d', strtotime($fecha));
	$hora = $_POST['hora_evento'];
	$hora_formateada = date('H:i', strtotime($hora));
	$id_registro = filter_var($_POST['id_registro'], FILTER_VALIDATE_INT);

	try {
		$stmt = $conn->prepare(" UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv = ?, editado = NOW()  WHERE evento_id = ? ");
		$stmt->bind_param("sssiii", $titulo, $fecha_formateada, $hora_formateada, $categoria_id, $invitado_id, $id_registro);
		$stmt->execute();
		if($stmt->affected_rows){
			$respuesta = array(
				'respuesta' => 'exito',
				'id_actualizado' => $id_registro
			);
		}else{
			$respuesta = array(
				'respuesta' => 'error' . $e->getMessage()
			);
		}
	} catch (Exception $e) {
		
	}
	echo json_encode($respuesta);
}

if(isset($_POST['registro']) && $_POST['registro'] == 'eliminar'){

	$id = $_POST['id'];
	try {
		$stmt = $conn->prepare(" DELETE FROM eventos WHERE evento_id = ? ");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		if($stmt->affected_rows){
			$respuesta = array(
				'respuesta' => 'exito',
				'id_eliminado' => $id
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