<?php
include_once 'funciones/funciones.php';
if(isset($_POST['registro']) && $_POST['registro'] == 'nuevo'){
		
	$nombre_categoria = filter_var($_POST['nombre_categoria'], FILTER_SANITIZE_STRING);
	$icono = filter_var($_POST['icono'], FILTER_SANITIZE_STRING);

	try {
		$stmt = $conn->prepare(" INSERT INTO categoria_evento (cat_evento, icono) VALUES (?, ?) ");
		$stmt->bind_param("ss", $nombre_categoria, $icono);
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
	} catch (Exception $e) {
		$respuesta  = array(
			'respuesta' => 'error' . $e->getMessage()
		);
	}	
	echo json_encode($respuesta);
}
if(isset($_POST['registro']) && $_POST['registro'] == 'actualizar'){
	$nombre_categoria = filter_var($_POST['nombre_categoria'], FILTER_SANITIZE_STRING);
	$icono = filter_var($_POST['icono'], FILTER_SANITIZE_STRING);
	$id_registro = $_POST['id_registro'];

	try {
		$stmt = $conn->prepare(" UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado = NOW() WHERE id_categoria = ? ");
		$stmt->bind_param("ssi", $nombre_categoria, $icono, $id_registro);
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
if(isset($_POST['registro']) && $_POST['registro'] == 'eliminar'){

	$id_borrar = $_POST['id'];

	try {
		$stmt = $conn->prepare(" DELETE FROM categoria_evento WHERE id_categoria = ? ");
		$stmt->bind_param("i", $id_borrar);
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
